<?php

namespace App\Controllers;

use App\Models\ModelDashboard;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

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

    try {
      $data = $this->dashboardModel->getAllFilteredForExport($kolom, $tahun, $provinsi, $kabupaten, $kategori);

      if (empty($data)) {
        return $this->response->setJSON([
          'status' => 'empty',
          'message' => 'Tidak ada data yang bisa diekspor.',
          'data' => [],
        ]);
      }

      $filename = 'data_rs_full_' . $tipe . '_' . date('Ymd_His') . '.csv';

      // Gunakan output buffering agar konten dikembalikan sebagai string
      ob_start();

      // Tambahkan BOM agar Excel mengenali UTF-8
      echo chr(0xef) . chr(0xbb) . chr(0xbf);

      $output = fopen('php://output', 'w');

      // Header kolom (gunakan semicolon)
      fputcsv($output, array_keys($data[0]), ';');

      // Data baris
      foreach ($data as $row) {
        $cleanRow = array_map(function ($val) {
          return is_null($val) ? '' : trim(preg_replace('/\s+/', ' ', (string) $val));
        }, $row);
        fputcsv($output, $cleanRow, ';');
      }

      fclose($output);

      $csvContent = ob_get_clean();

      // 💡 Kembalikan melalui response CodeIgniter (bukan echo langsung)
      return $this->response
        ->setHeader('Content-Type', 'text/csv; charset=utf-8')
        ->setHeader('Content-Disposition', 'attachment; filename="' . $filename . '"')
        ->setHeader('Pragma', 'no-cache')
        ->setHeader('Expires', '0')
        ->setBody($csvContent);
    } catch (\Throwable $e) {
      return $this->response->setStatusCode(500)->setJSON([
        'error' => 'Gagal mengekspor data CSV.',
        'message' => $e->getMessage(),
      ]);
    }
  }

  public function exportXLS()
  {
    $startTime = microtime(true); // ⏱️ Mulai hitung waktu

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
        return $this->response->setJSON(['status' => 'empty', 'message' => 'Tidak ada data.']);
      }

      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();

      $headers = array_keys($data[0]);
      $rows = array_map('array_values', $data);
      array_unshift($rows, $headers); // tambahkan header di awal

      $sheet->fromArray($rows, null, 'A1');

      $filename = 'data_rs_full_' . $tipe . '_' . date('Ymd_His') . '.xlsx';

      if (ob_get_length() > 0) {
        ob_end_clean();
      }

      while (ob_get_level()) {
        ob_end_clean();
      }

      // Hitung waktu sebelum output
      $elapsed = round(microtime(true) - $startTime, 3);
      log_message('debug', "⏳ Export XLS untuk tipe '{$tipe}' selesai disiapkan dalam {$elapsed} detik.");

      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment; filename="' . $filename . '"');
      header('Cache-Control: max-age=0');

      $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
      $writer->setPreCalculateFormulas(false);
      $writer->save('php://output');

      $totalTime = round(microtime(true) - $startTime, 3);
      log_message('debug', "✅ File XLS '{$filename}' dikirim ke browser dalam total {$totalTime} detik.");

      exit();
    } catch (\Throwable $e) {
      log_message('error', '❌ Export XLS gagal: ' . $e->getMessage());
      return $this->response->setStatusCode(500)->setJSON(['error' => 'Gagal ekspor XLS']);
    }
  }
}