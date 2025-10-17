<?php

namespace App\Controllers;

use App\Models\ModelDashboard;

class Dashboard extends BaseController
{
  protected $dashboardModel;
  protected $cache;

  public function __construct()
  {
    $this->dashboardModel = new ModelDashboard();
    $this->cache = cache();
  }

  public function index()
  {
    try {
      $listProvinsi = $this->cache->get('listProvinsi');
      if (!is_array($listProvinsi) || empty($listProvinsi)) {
        $listProvinsi = $this->dashboardModel->getListProvinsi();
        $this->cache->save('listProvinsi', $listProvinsi, 3600);
      }

      $listKabupatenKota = $this->cache->get('listKabupatenKota');
      if (!is_array($listKabupatenKota) || empty($listKabupatenKota)) {
        $listKabupatenKota = $this->dashboardModel->getListKabupatenKota();
        $this->cache->save('listKabupatenKota', $listKabupatenKota, 3600);
      }

      $listTahun = $this->cache->get('listTahun');
      if (!is_array($listTahun) || empty($listTahun)) {
        $listTahun = $this->dashboardModel->getListTahun();
        $this->cache->save('listTahun', $listTahun, 3600);
      }

      $tahunArray = array_filter(array_map(fn($t) => $t['tahun'] ?? null, $listTahun));
      $minTahun = !empty($tahunArray) ? min($tahunArray) : date('Y');
      $maxTahun = !empty($tahunArray) ? max($tahunArray) : date('Y');
      $selectedTahun = $maxTahun;

      $data = [
        'listProvinsi' => $listProvinsi ?? [],
        'listKabupatenKota' => $listKabupatenKota ?? [],
        'listTahun' => $listTahun ?? [],
        'selectedProvinsi' => '',
        'selectedKabupatenKota' => '',
        'selectedTahun' => $selectedTahun,
        'minTahun' => $minTahun,
        'maxTahun' => $maxTahun,
      ];

      return view('templates/header')
        . view('dashboard/dashboard', $data)
        . view('templates/footer');
    } catch (\Throwable $e) {
      return view('templates/header')
        . view('errors/html/error_general', ['message' => 'Terjadi kesalahan saat memuat dashboard.'])
        . view('templates/footer');
    }
  }

  public function getBarData($tipe)
  {
    $tahun = $this->request->getGet('tahun');
    $prov = $this->request->getGet('provinsi');
    $kab = $this->request->getGet('kabupaten');

    $kolom = $this->getKolomByTipe($tipe);
    if (!$kolom) {
      return $this->response->setStatusCode(400)->setJSON(['error' => 'Tipe tidak valid']);
    }

    if (!$tahun) {
      $listTahun = $this->dashboardModel->getListTahun();
      $tahun = !empty($listTahun) ? (int) ($listTahun[0]['tahun'] ?? date('Y')) : date('Y');
    }

    try {
      $data = $this->dashboardModel->getBarData($kolom, $tahun, $prov ?? '', $kab ?? '');
      $filtered = array_filter($data ?? [], function ($row) use ($kolom) {
        return !empty($row[$kolom]) && !empty($row['total']) && $row['total'] > 0;
      });

      if (empty($filtered)) {
        return $this->response->setJSON([]);
      }

      return $this->response->setJSON(array_values($filtered));
    } catch (\Throwable $e) {
      return $this->response->setStatusCode(500)->setJSON(['error' => 'Gagal mengambil data grafik.']);
    }
  }

  public function getLineData($tipe)
  {
    $tahunAwal = (int) ($this->request->getGet('tahunAwal') ?? date('Y') - 4);
    $tahunAkhir = (int) ($this->request->getGet('tahunAkhir') ?? date('Y'));
    $prov = $this->request->getGet('provinsi') ?? '';
    $kab = $this->request->getGet('kabupaten') ?? '';

    $kolom = $this->getKolomByTipe($tipe);
    if (!$kolom) {
      return $this->response->setStatusCode(400)->setJSON(['error' => 'Tipe tidak valid']);
    }

    try {
      $hasil = $this->dashboardModel->getLineData($kolom, $tahunAwal, $tahunAkhir, $prov, $kab);
      if (empty($hasil)) {
        return $this->response->setJSON([]);
      }

      $kategoriSet = [];
      foreach ($hasil as $tahunData) {
        foreach ($tahunData['data'] as $item) {
          $kategoriSet[$item['nama']] = true;
        }
      }
      $labels = array_keys($kategoriSet);

      $datasets = [];
      foreach ($labels as $label) {
        $datasets[] = [
          'label' => $label,
          'data' => array_map(function ($tahunData) use ($label) {
            $item = array_values(array_filter($tahunData['data'], fn($r) => $r['nama'] === $label));
            return count($item) ? (int) $item[0]['total'] : 0;
          }, $hasil),
          'borderWidth' => 2,
          'tension' => 0.3,
          'fill' => false,
        ];
      }

      return $this->response->setJSON([
        'labels' => array_map(fn($d) => $d['tahun'], $hasil),
        'datasets' => $datasets,
      ]);
    } catch (\Throwable $e) {
      return $this->response->setStatusCode(500)->setJSON(['error' => 'Gagal mengambil data tren.']);
    }
  }

  public function getKabupatenByProvinsi()
  {
    $provinsi = trim($this->request->getGet('provinsi') ?? '');

    try {
      if ($provinsi === '' || strtolower($provinsi) === 'semua') {
        $kabupaten = $this->dashboardModel->getListKabupatenKota();
      } else {
        $kabupaten = $this->dashboardModel->getKabupatenByProvinsi($provinsi);
      }

      return $this->response->setJSON($kabupaten ?: []);
    } catch (\Throwable $e) {
      return $this->response->setJSON([]);
    }
  }

  private function getKolomByTipe(string $tipe): ?string
  {
    return match ($tipe) {
      'jenis' => 'jenis_rs',
      'kelas' => 'kelas_rs',
      'penyelenggara' => 'penyelenggara_grup',
      default => null,
    };
  }
}