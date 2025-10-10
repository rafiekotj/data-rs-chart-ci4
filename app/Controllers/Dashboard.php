<?php

namespace App\Controllers;

use App\Models\ModelDashboard;

class Dashboard extends BaseController
{
  protected $dashboardModel;

  public function __construct()
  {
    $this->dashboardModel = new ModelDashboard();
  }

  // === Halaman utama dashboard ===
  public function index()
  {
    $cache = cache();

    // === Cache Provinsi ===
    $listProvinsi = $cache->get('listProvinsi');
    if (!$listProvinsi) {
      $listProvinsi = $this->dashboardModel->getListProvinsi();
      $cache->save('listProvinsi', $listProvinsi, 3600); // cache 1 jam
    }

    // === Cache Kabupaten/Kota ===
    $listKabupatenKota = $cache->get('listKabupatenKota');
    if (!$listKabupatenKota) {
      $listKabupatenKota = $this->dashboardModel->getListKabupatenKota();
      $cache->save('listKabupatenKota', $listKabupatenKota, 3600);
    }

    // === Cache Tahun ===
    $listTahun = $cache->get('listTahun');
    if (!$listTahun) {
      $listTahun = $this->dashboardModel->getListTahun();
      $cache->save('listTahun', $listTahun, 3600);
    }

    // === Hitung min & max tahun ===
    if (!empty($listTahun) && count($listTahun) > 0) {
      $tahunArray = array_column($listTahun, 'tahun');
      $minTahun = min($tahunArray);
      $maxTahun = max($tahunArray);
    } else {
      // fallback default jika tidak ada data
      $minTahun = $maxTahun = date('Y');
    }

    // === Data dikirim ke view ===
    $data = [
      'listProvinsi' => $listProvinsi,
      'listKabupatenKota' => $listKabupatenKota,
      'listTahun' => $listTahun,
      'selectedProvinsi' => '',
      'selectedKabupatenKota' => '',
      'selectedTahun' => '',
      'minTahun' => $minTahun,
      'maxTahun' => $maxTahun,
    ];

    return view('templates/header')
      . view('dashboard/dashboard', $data)
      . view('templates/footer');
  }

  // === API: Bar Chart ===
  public function getBarData($tipe)
  {
    $tahun = $this->request->getGet('tahun');
    $prov = $this->request->getGet('provinsi') ?? '';
    $kab = $this->request->getGet('kabupaten') ?? '';

    $kolom = $this->getKolomByTipe($tipe);
    if (!$kolom) {
      return $this->response->setStatusCode(400)->setJSON(['error' => 'Tipe tidak valid']);
    }

    $data = $this->dashboardModel->getBarData($kolom, $tahun, $prov, $kab);
    return $this->response->setJSON($data);
  }

  // === API: Line Chart ===
  public function getLineData($tipe)
  {
    $tahunAwal = $this->request->getGet('tahunAwal');
    $tahunAkhir = $this->request->getGet('tahunAkhir');
    $prov = $this->request->getGet('provinsi') ?? '';
    $kab = $this->request->getGet('kabupaten') ?? '';

    $kolom = $this->getKolomByTipe($tipe);
    if (!$kolom) {
      return $this->response->setStatusCode(400)->setJSON(['error' => 'Tipe tidak valid']);
    }

    $data = $this->dashboardModel->getLineData($kolom, $tahunAwal, $tahunAkhir, $prov, $kab);
    return $this->response->setJSON($data);
  }

  // === API: Kabupaten berdasarkan provinsi ===
  public function getKabupatenByProvinsi()
  {
    $provinsi = $this->request->getGet('provinsi');
    if (!$provinsi) {
      return $this->response->setJSON([]);
    }

    $kabupaten = $this->dashboardModel->getKabupatenByProvinsi($provinsi);
    return $this->response->setJSON($kabupaten);
  }

  // === Helper internal untuk menentukan kolom database ===
  private function getKolomByTipe($tipe)
  {
    return match ($tipe) {
      'jenis' => 'jenis_rs',
      'kelas' => 'kelas_rs',
      'penyelenggara' => 'penyelenggara_grup',
      default => null,
    };
  }
}
