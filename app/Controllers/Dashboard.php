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
    $this->cache->clean();

    $cacheKeys = [
      'listProvinsi' => fn() => $this->dashboardModel->getListProvinsi(),
      'listKabupatenKota' => fn() => $this->dashboardModel->getListKabupatenKota(),
      'listTahun' => fn() => $this->dashboardModel->getListTahun(),
      'listJenisRS' => fn() => $this->dashboardModel->getListJenisRS(),
      'listKelasRS' => fn() => $this->dashboardModel->getListKelasRS(),
      'listPenyelenggaraRS' => fn() => $this->dashboardModel->getListPenyelenggaraRS(),
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
        'listJenisRS' => $dataCache['listJenisRS'],
        'listKelasRS' => $dataCache['listKelasRS'],
        'listPenyelenggaraRS' => $dataCache['listPenyelenggaraRS'],
        'selectedProvinsi' => '',
        'selectedKabupatenKota' => '',
        'selectedTahun' => $maxTahun,
        'minTahun' => $minTahun,
        'maxTahun' => $maxTahun,
      ]) .
      view('templates/footer');
  }

  public function getBarData($kolom = null)
  {
    if (!$kolom) {
      return $this->response->setJSON(['error' => 'Kolom harus diisi']);
    }

    $subkolom = $this->request->getGet('subkolom') ?: null;

    $filters = [
      'tahun' => $this->request->getGet('tahun') ?: null,
      'provinsi' => $this->request->getGet('provinsi') ?: null,
      'kabupaten_kota' => $this->request->getGet('kabupaten') ?: null,
      'jenis_rs' => $this->parseList($this->request->getGet('jenis_rs')),
      'kelas_rs' => $this->parseList($this->request->getGet('kelas_rs')),
      'penyelenggara_grup' => $this->parseList($this->request->getGet('penyelenggara_grup')),
      'penyelenggara_kategori' => $this->parseList($this->request->getGet('kategori_rs')),
    ];

    $payload = [
      'kolom' => $kolom,
      'subkolom' => $subkolom,
      'filters' => $filters,
    ];

    log_message('debug', '[Dashboard::getBarData] Payload: ' . json_encode($payload));

    $data = $this->dashboardModel->getBarData($kolom, $filters, $subkolom);

    if ($this->request->getGet('debug') === '1') {
      return $this->response->setJSON([
        'payload_dikirim' => $payload,
        'hasil_sql' => $data,
      ]);
    }

    return $this->response->setJSON($data);
  }

  private function parseList($param)
  {
    if (empty($param)) {
      return null;
    }
    if (is_array($param)) {
      return $param;
    }
    return array_map('trim', explode(',', $param));
  }

  public function getLineData($kolom)
  {
    $filters = [
      'tahun_awal' => (int) $this->request->getGet('tahun_awal') ?: null,
      'tahun_akhir' => (int) $this->request->getGet('tahun_akhir') ?: null,
      'provinsi' => $this->request->getGet('provinsi') ?: null,
      'kabupaten_kota' => $this->request->getGet('kabupaten_kota') ?: null,
      'jenis_rs' => $this->request->getGet('jenis_rs') ? explode(',', $this->request->getGet('jenis_rs')) : null,
      'kelas_rs' => $this->request->getGet('kelas_rs') ? explode(',', $this->request->getGet('kelas_rs')) : null,
      'penyelenggara_grup' => $this->request->getGet('penyelenggara_grup')
        ? explode(',', $this->request->getGet('penyelenggara_grup'))
        : null,
    ];

    $data = $this->dashboardModel->getLineData($kolom, $filters);

    if (empty($data)) {
      return $this->response->setJSON(['message' => 'Tidak ada data tren ditemukan']);
    }

    return $this->response->setJSON($data);
  }

  public function getKabupatenByProvinsi()
  {
    helper('text');
    $provinsiParam = trim($this->request->getGet('provinsi') ?? '');
    $kabupaten = [];

    try {
      if ($provinsiParam === '' || strtolower($provinsiParam) === 'semua') {
        $kabupaten = $this->dashboardModel->getListKabupatenKota();
      } else {
        $provinsiList = array_map('trim', explode(',', $provinsiParam));

        foreach ($provinsiList as $prov) {
          try {
            $result = $this->dashboardModel->getKabupatenByProvinsi($prov);

            if (!is_array($result)) {
              log_message('error', "⚠️ getKabupatenByProvinsi('$prov') tidak mengembalikan array");
              continue;
            }

            usort($result, fn($a, $b) => strcmp($a['kabupaten_kota'] ?? '', $b['kabupaten_kota'] ?? ''));

            foreach ($result as $row) {
              if (!empty($row['kabupaten_kota'])) {
                $kabupaten[] = [
                  'provinsi' => $prov,
                  'kabupaten_kota' => trim($row['kabupaten_kota']),
                ];
              }
            }
          } catch (\Throwable $innerErr) {
            log_message('error', "❌ Error getKabupaten($prov): " . $innerErr->getMessage());
          }
        }
      }

      return $this->response->setJSON($kabupaten ?: []);
    } catch (\Throwable $e) {
      log_message('error', '❌ getKabupatenByProvinsi global error: ' . $e->getMessage());
      return $this->response->setJSON([
        'error' => true,
        'message' => $e->getMessage(),
      ]);
    }
  }

  public function getTableData()
  {
    $tipe = trim($this->request->getGet('tipe') ?? '');
    $provinsi = trim($this->request->getGet('provinsi') ?? '');
    $kabupaten = trim($this->request->getGet('kabupaten') ?? '');
    $kategori = trim($this->request->getGet('kategori') ?? '');
    $tahun = trim($this->request->getGet('tahun') ?? '');
    $limit = (int) ($this->request->getGet('limit') ?? 200);
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

      ob_start();

      echo chr(0xef) . chr(0xbb) . chr(0xbf);

      $output = fopen('php://output', 'w');

      fputcsv($output, array_keys($data[0]), ';');

      foreach ($data as $row) {
        $cleanRow = array_map(function ($val) {
          return is_null($val) ? '' : trim(preg_replace('/\s+/', ' ', (string) $val));
        }, $row);
        fputcsv($output, $cleanRow, ';');
      }

      fclose($output);

      $csvContent = ob_get_clean();

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
    $startTime = microtime(true);

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
      array_unshift($rows, $headers);

      $sheet->fromArray($rows, null, 'A1');

      $filename = 'data_rs_full_' . $tipe . '_' . date('Ymd_His') . '.xlsx';

      if (ob_get_length() > 0) {
        ob_end_clean();
      }

      while (ob_get_level()) {
        ob_end_clean();
      }

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