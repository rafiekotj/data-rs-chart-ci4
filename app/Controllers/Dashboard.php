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
    $cacheKeys = [
      'listProvinsi' => fn() => $this->dashboardModel->getListProvinsi(),
      'listKabupatenKota' => fn() => $this->dashboardModel->getListKabupatenKota(),
      'listTahun' => fn() => $this->dashboardModel->getListTahun(),
    ];

    $dataCache = [];
    foreach ($cacheKeys as $key => $callback) {
      $dataCache[$key] = $this->cache->get($key) ?? $callback();
      $this->cache->save($key, $dataCache[$key], 3600);
    }

    $tahunArray = array_column($dataCache['listTahun'], 'tahun');
    $minTahun = !empty($tahunArray) ? min($tahunArray) : date('Y');
    $maxTahun = !empty($tahunArray) ? max($tahunArray) : date('Y');

    return view('templates/header') .
      view('dashboard/dashboard', [
        'listProvinsi' => $dataCache['listProvinsi'],
        'listKabupatenKota' => $dataCache['listKabupatenKota'],
        'listTahun' => $dataCache['listTahun'],
        'selectedProvinsi' => '',
        'selectedKabupatenKota' => '',
        'selectedTahun' => $maxTahun,
        'minTahun' => $minTahun,
        'maxTahun' => $maxTahun,
      ]) .
      view('templates/footer');
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

    if ($tahun === '') {
      $listTahun = $this->cache->get('listTahun') ?? $this->dashboardModel->getListTahun();
      $tahun = !empty($listTahun) ? max(array_column($listTahun, 'tahun')) : date('Y');
      $this->cache->save('listTahun', $listTahun, 3600);
    }

    $data = $this->dashboardModel->getBarData($kolom, $tahun, $provinsi, $kabupaten);

    if (!empty($kategori)) {
      $kategoriList = array_map('strtolower', array_map('trim', explode(',', $kategori)));
      $data = array_values(
        array_filter($data, fn($row) => in_array(strtolower(trim($row['nama'] ?? '')), $kategoriList, true)),
      );
    }

    $total_semua = array_sum(array_column($data, 'total'));

    return $this->response->setJSON([
      'status' => 'success',
      'total_semua' => $total_semua,
      'data' => $data,
    ]);
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
        $tahunData['data'] = array_values(
          array_filter(
            $tahunData['data'],
            fn($row) => in_array(strtolower(trim($row['nama'] ?? '')), $kategoriList, true),
          ),
        );
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
      $dataPerTahun = array_map(
        fn($tahunItem) => (int) ($tahunItem['data'][array_search($label, array_column($tahunItem['data'], 'nama'))][
          'total'
        ] ?? 0),
        $hasil,
      );
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
  }

  public function getKabupatenByProvinsi()
  {
    $provinsi = trim($this->request->getGet('provinsi') ?? '');
    $kabupaten =
      $provinsi === '' || strtolower($provinsi) === 'semua'
        ? $this->dashboardModel->getListKabupatenKota()
        : $this->dashboardModel->getKabupatenByProvinsi($provinsi);

    return $this->response->setJSON($kabupaten ?: []);
  }

  public function getDropdownList(string $tipe)
  {
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
  }

  public function getTableData()
  {
    $tipe = trim($this->request->getGet('tipe') ?? '');
    $provinsi = trim($this->request->getGet('provinsi') ?? '');
    $kabupaten = trim($this->request->getGet('kabupaten') ?? '');
    $kategori = trim($this->request->getGet('kategori') ?? '');
    $tahun = trim($this->request->getGet('tahun') ?? '');
    $limit = (int) ($this->request->getGet('limit') ?? 200); // default 200
    $kolom = $this->getKolomByTipe($tipe);

    if (!$kolom) {
      return $this->response->setStatusCode(400)->setJSON(['error' => 'Tipe tidak valid']);
    }

    $data = $this->dashboardModel->getAllFilteredForExport($kolom, $tahun, $provinsi, $kabupaten, $kategori);

    if ($limit > 0 && count($data) > $limit) {
      $data = array_slice($data, 0, $limit);
    }

    return $this->response->setJSON([
      'status' => 'success',
      'data' => $data,
      'count' => count($data),
    ]);
  }

  private function getKolomByTipe(string $tipe): ?string
  {
    $map = [
      'jenis' => 'jenis_rs',
      'kelas' => 'kelas_rs',
      'penyelenggara' => 'penyelenggara_grup',
    ];
    return $map[$tipe] ?? null;
  }

  public function exportCSV()
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

    $data = $this->dashboardModel->getAllFilteredForExport($kolom, $tahun, $provinsi, $kabupaten, $kategori);

    if (empty($data)) {
      return $this->response->setJSON([
        'status' => 'empty',
        'message' => 'Tidak ada data yang bisa diekspor.',
        'data' => [],
      ]);
    }

    return $this->response->setJSON([
      'status' => 'success',
      'count' => count($data),
      'data' => $data,
    ]);
  }

  public function exportXLS()
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
      $data = $this->dashboardModel->getAllFilteredForExport($kolom, $tahun, $provinsi, $kabupaten, $kategori);

      if (empty($data)) {
        return $this->response->setJSON([
          'status' => 'empty',
          'message' => 'Tidak ada data yang bisa diekspor.',
          'data' => [],
        ]);
      }

      $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();

      $headers = array_keys($data[0]);
      $col = 'A';
      foreach ($headers as $h) {
        $sheet->setCellValue($col . '1', $h);
        $col++;
      }

      $rowNum = 2;
      foreach ($data as $row) {
        $col = 'A';
        foreach ($headers as $h) {
          $sheet->setCellValueExplicit(
            $col . $rowNum,
            $row[$h] ?? '',
            \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING,
          );
          $col++;
        }
        $rowNum++;
      }

      $filename = 'data_rs_full_' . $tipe . '_' . date('Ymd_His') . '.xlsx';

      $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
      $response = service('response');

      $response
        ->setHeader('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
        ->setHeader('Content-Disposition', 'attachment; filename="' . $filename . '"')
        ->setHeader('Cache-Control', 'max-age=0');

      $writer->save('php://output');
      exit();
    } catch (\Throwable $e) {
      return $this->response->setStatusCode(500)->setJSON(['error' => 'Gagal mengekspor data XLS.']);
    }
  }
}