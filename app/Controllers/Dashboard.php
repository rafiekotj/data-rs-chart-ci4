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
      $listProvinsi = $this->cache->get('listProvinsi') ?? $this->dashboardModel->getListProvinsi();
      $this->cache->save('listProvinsi', $listProvinsi, 3600);

      $listKabupatenKota = $this->cache->get('listKabupatenKota') ?? $this->dashboardModel->getListKabupatenKota();
      $this->cache->save('listKabupatenKota', $listKabupatenKota, 3600);

      $listTahun = $this->cache->get('listTahun') ?? $this->dashboardModel->getListTahun();
      $this->cache->save('listTahun', $listTahun, 3600);

      $tahunArray = array_column($listTahun, 'tahun');
      $minTahun = !empty($tahunArray) ? min($tahunArray) : date('Y');
      $maxTahun = !empty($tahunArray) ? max($tahunArray) : date('Y');

      return view('templates/header') .
        view('dashboard/dashboard', [
          'listProvinsi' => $listProvinsi,
          'listKabupatenKota' => $listKabupatenKota,
          'listTahun' => $listTahun,
          'selectedProvinsi' => '',
          'selectedKabupatenKota' => '',
          'selectedTahun' => $maxTahun,
          'minTahun' => $minTahun,
          'maxTahun' => $maxTahun,
        ]) .
        view('templates/footer');
    } catch (\Throwable $e) {
      log_message('error', 'Dashboard index error: ' . $e->getMessage());
      return view('templates/header') .
        view('errors/html/error_general', ['message' => 'Terjadi kesalahan saat memuat dashboard.']) .
        view('templates/footer');
    }
  }

  public function getBarData($tipe)
  {
    $tahun = trim($this->request->getGet('tahun') ?? '');
    $provinsi = trim($this->request->getGet('provinsi') ?? '');
    $kabupaten = trim($this->request->getGet('kabupaten') ?? '');
    $kategori = trim($this->request->getGet('kategori') ?? '');
    $kolom = $this->getKolomByTipe($tipe);
    if (!$kolom) {
      return $this->response->setStatusCode(400)->setJSON(['error' => 'Tipe tidak valid']);
    }

    try {
      if ($tahun === '') {
        $listTahun = $this->cache->get('listTahun') ?? $this->dashboardModel->getListTahun();
        $tahun = !empty($listTahun) ? max(array_column($listTahun, 'tahun')) : date('Y');
      }

      $data = $this->dashboardModel->getBarData($kolom, $tahun, $provinsi, $kabupaten);

      if (!empty($kategori)) {
        $kategoriList = array_map('strtolower', array_map('trim', explode(',', $kategori)));
        $data = array_filter($data, function ($row) use ($kategoriList) {
          $nama = strtolower(trim($row['nama'] ?? ''));
          return in_array($nama, $kategoriList, true);
        });
      }

      $total_semua = array_sum(array_column($data, 'total'));
      return $this->response->setJSON([
        'status' => 'success',
        'total_semua' => $total_semua,
        'data' => array_values($data),
      ]);
    } catch (\Throwable $e) {
      log_message('error', 'getBarData error: ' . $e->getMessage());
      return $this->response->setStatusCode(500)->setJSON(['error' => 'Gagal mengambil data grafik.']);
    }
  }

  public function getLineData($tipe)
  {
    $tahunAwal = (int) ($this->request->getGet('tahunAwal') ?? date('Y') - 4);
    $tahunAkhir = (int) ($this->request->getGet('tahunAkhir') ?? date('Y'));
    $provinsi = trim($this->request->getGet('provinsi') ?? '');
    $kabupaten = trim($this->request->getGet('kabupaten') ?? '');
    $kategori = trim($this->request->getGet('kategori') ?? '');
    $kolom = $this->getKolomByTipe($tipe);
    if (!$kolom) {
      return $this->response->setStatusCode(400)->setJSON([
        'status' => 'error',
        'message' => 'Tipe tidak valid',
      ]);
    }

    try {
      $hasil = $this->dashboardModel->getLineData($kolom, $tahunAwal, $tahunAkhir, $provinsi, $kabupaten);
      if (empty($hasil)) {
        return $this->response->setJSON([
          'status' => 'success',
          'labels' => [],
          'datasets' => [],
        ]);
      }

      if (!empty($kategori)) {
        $kategoriList = array_map('strtolower', array_map('trim', explode(',', $kategori)));
        foreach ($hasil as &$tahunData) {
          $tahunData['data'] = array_filter($tahunData['data'], function ($row) use ($kategoriList) {
            $nama = strtolower(trim($row['nama'] ?? ''));
            return in_array($nama, $kategoriList, true);
          });
        }
        unset($tahunData);
      }

      $labelsTahun = array_column($hasil, 'tahun');
      $semuaNama = [];
      foreach ($hasil as $tahunItem) {
        foreach ($tahunItem['data'] as $row) {
          $nama = trim($row['nama'] ?? '');
          if ($nama !== '') {
            $semuaNama[$nama] = true;
          }
        }
      }

      $datasets = [];
      foreach (array_keys($semuaNama) as $label) {
        $dataPerTahun = array_map(function ($tahunItem) use ($label) {
          $found = array_filter($tahunItem['data'], fn($r) => $r['nama'] === $label);
          return !empty($found) ? (int) array_values($found)[0]['total'] : 0;
        }, $hasil);
        $datasets[] = [
          'label' => $label,
          'data' => $dataPerTahun,
          'borderWidth' => 2,
          'tension' => 0.3,
          'fill' => false,
        ];
      }

      return $this->response->setJSON([
        'status' => 'success',
        'labels' => $labelsTahun,
        'datasets' => $datasets,
      ]);
    } catch (\Throwable $e) {
      log_message('error', 'getLineData error: ' . $e->getMessage());
      return $this->response->setStatusCode(500)->setJSON([
        'status' => 'error',
        'message' => 'Gagal mengambil data tren.',
      ]);
    }
  }

  public function getKabupatenByProvinsi()
  {
    $provinsi = trim($this->request->getGet('provinsi') ?? '');
    try {
      $kabupaten =
        $provinsi === '' || strtolower($provinsi) === 'semua'
          ? $this->dashboardModel->getListKabupatenKota()
          : $this->dashboardModel->getKabupatenByProvinsi($provinsi);
      return $this->response->setJSON($kabupaten ?: []);
    } catch (\Throwable $e) {
      log_message('error', 'getKabupatenByProvinsi error: ' . $e->getMessage());
      return $this->response->setJSON([]);
    }
  }

  public function getDropdownList(string $tipe)
  {
    try {
      $cacheKey = "dropdown_{$tipe}";
      $list = $this->cache->get($cacheKey);
      if (!is_array($list) || empty($list)) {
        $list = match ($tipe) {
          'jenis' => $this->dashboardModel->getListJenisRS(),
          'kelas' => $this->dashboardModel->getListKelasRS(),
          'penyelenggara' => $this->dashboardModel->getListPenyelenggaraRS(),
          default => [],
        };
        $this->cache->save($cacheKey, $list, 3600);
      }
      return $this->response->setJSON($list);
    } catch (\Throwable $e) {
      log_message('error', 'getDropdownList error: ' . $e->getMessage());
      return $this->response->setStatusCode(500)->setJSON(['error' => 'Gagal mengambil daftar dropdown.']);
    }
  }

  public function getTableData()
  {
    $tipe = trim($this->request->getGet('tipe') ?? '');
    $provinsi = trim($this->request->getGet('provinsi') ?? '');
    $kabupaten = trim($this->request->getGet('kabupaten') ?? '');
    $kategori = trim($this->request->getGet('kategori') ?? '');
    $tahun = trim($this->request->getGet('tahun') ?? '');
    $kolom = $this->getKolomByTipe($tipe);

    if (!$kolom) {
      return $this->response->setStatusCode(400)->setJSON(['error' => 'Tipe tidak valid']);
    }

    try {
      $data = $this->dashboardModel->getFilteredTableData($kolom, $tahun, $provinsi, $kabupaten, $kategori);
      log_message(
        'debug',
        "getTableData request: tipe=$tipe, tahun=$tahun, prov=$provinsi, kab=$kabupaten, kategori=$kategori",
      );
      return $this->response->setJSON(['status' => 'success', 'data' => $data]);
    } catch (\Throwable $e) {
      log_message('error', 'getTableData error: ' . $e->getMessage());
      return $this->response->setStatusCode(500)->setJSON(['error' => 'Gagal mengambil data tabel.']);
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