<?php

namespace App\Controllers;

use App\Models\ModelDashboard;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

  public function getFilteredTable()
  {
    $kolom = $this->request->getGet('kolom') ?? 'kelas_rs';
    $subkolom = $this->request->getGet('subkolom') ?? 'jenis_rs';

    $filters = [
      'tahun' => $this->request->getGet('tahun'),
      'provinsi' => $this->request->getGet('provinsi'),
      'kabupaten_kota' => $this->request->getGet('kabupaten_kota'),
      'jenis_rs' => $this->parseList($this->request->getGet('jenis_rs')),
      'kelas_rs' => $this->parseList($this->request->getGet('kelas_rs')),
      'penyelenggara_grup' => $this->parseList($this->request->getGet('penyelenggara_grup')),
      'penyelenggara_kategori' => $this->parseList($this->request->getGet('penyelenggara_kategori')),
    ];

    $data = $this->dashboardModel->getFilteredTable($kolom, $filters, $subkolom);

    return $this->response->setJSON($data);
  }

  public function exportCsv()
  {
    $filters = [
      'tahun' => $this->request->getGet('tahun'),
      'provinsi' => $this->request->getGet('provinsi'),
      'kabupaten_kota' => $this->request->getGet('kabupaten_kota'),
      'jenis_rs' => $this->parseList($this->request->getGet('jenis_rs')),
      'kelas_rs' => $this->parseList($this->request->getGet('kelas_rs')),
      'penyelenggara_grup' => $this->parseList($this->request->getGet('penyelenggara_grup')),
      'penyelenggara_kategori' => $this->parseList($this->request->getGet('penyelenggara_kategori')),
    ];

    $data = $this->dashboardModel->getFilteredTable('kelas_rs', $filters, 'jenis_rs');
    $tahun = $filters['tahun'] ?? '-';
    $filename = "data_rs_{$tahun}_" . date('Ymd_His') . '.csv';

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    $output = fopen('php://output', 'w');

    fprintf($output, chr(0xef) . chr(0xbb) . chr(0xbf));

    fputcsv(
      $output,
      [
        'Tahun',
        'Rumah Sakit',
        'Jenis RS',
        'Kelas RS',
        'Alamat',
        'Kabupaten/Kota',
        'Provinsi',
        'Penyelenggara Grup',
        'Penyelenggara Kategori',
      ],
      ';',
    );

    foreach ($data as $row) {
      fputcsv(
        $output,
        [
          $tahun,
          $row['rumah_sakit'] ?? '',
          $row['jenis_rs'] ?? '',
          $row['kelas_rs'] ?? '',
          $row['alamat'] ?? '',
          $row['kabupaten_kota'] ?? '',
          $row['provinsi'] ?? '',
          $row['penyelenggara_grup'] ?? '',
          $row['penyelenggara_kategori'] ?? '',
        ],
        ';',
      );
    }

    fclose($output);
    exit();
  }

  public function exportXls()
  {
    $filters = [
      'tahun' => $this->request->getGet('tahun'),
      'provinsi' => $this->request->getGet('provinsi'),
      'kabupaten_kota' => $this->request->getGet('kabupaten_kota'),
      'jenis_rs' => $this->parseList($this->request->getGet('jenis_rs')),
      'kelas_rs' => $this->parseList($this->request->getGet('kelas_rs')),
      'penyelenggara_grup' => $this->parseList($this->request->getGet('penyelenggara_grup')),
      'penyelenggara_kategori' => $this->parseList($this->request->getGet('penyelenggara_kategori')),
    ];

    $data = $this->dashboardModel->getFilteredTable('kelas_rs', $filters, 'jenis_rs');
    $tahun = $filters['tahun'] ?? '-';

    $jenisOrder = [
      'RSU',
      'RSIA',
      'RSK Jiwa',
      'RSK Mata',
      'RSK GM',
      'RSK Bedah',
      'RSK Jantung',
      'RSK Paru',
      'RSK Orthopedi',
      'RSK Kanker',
      'RSK THT-KL',
      'RSK Infeksi',
      'RSK Ginjal',
      'RS Bergerak',
      'RSK Otak',
      'RSKO',
      'RSK Stroke',
    ];

    usort($data, function ($a, $b) use ($jenisOrder) {
      $idxA = array_search($a['jenis_rs'] ?? '', $jenisOrder);
      $idxB = array_search($b['jenis_rs'] ?? '', $jenisOrder);

      if ($idxA !== $idxB) {
        if ($idxA === false) {
          return 1;
        }
        if ($idxB === false) {
          return -1;
        }
        return $idxA - $idxB;
      }

      $provCompare = strcmp($a['provinsi'] ?? '', $b['provinsi'] ?? '');
      if ($provCompare !== 0) {
        return $provCompare;
      }

      return strcmp($a['kabupaten_kota'] ?? '', $b['kabupaten_kota'] ?? '');
    });

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $headers = [
      'Rumah Sakit',
      'Jenis RS',
      'Kelas RS',
      'Alamat',
      'Kabupaten/Kota',
      'Provinsi',
      'Penyelenggara Grup',
      'Penyelenggara Kategori',
      'Tahun',
    ];
    $sheet->fromArray($headers, null, 'A1');

    $rowIndex = 2;
    foreach ($data as $row) {
      $sheet->fromArray(
        [
          $row['rumah_sakit'] ?? '',
          $row['jenis_rs'] ?? '',
          $row['kelas_rs'] ?? '',
          $row['alamat'] ?? '',
          $row['kabupaten_kota'] ?? '',
          $row['provinsi'] ?? '',
          $row['penyelenggara_grup'] ?? '',
          $row['penyelenggara_kategori'] ?? '',
          $tahun,
        ],
        null,
        "A{$rowIndex}",
      );
      $rowIndex++;
    }

    $sheet->getStyle('A1:I1')->getFont()->setBold(true);
    $sheet->setTitle("Data RS {$tahun}");

    $filename = "data_rs_{$tahun}_" . date('Ymd_His') . '.xlsx';

    if (ob_get_length()) {
      ob_end_clean();
    }

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=\"{$filename}\"");
    header('Cache-Control: max-age=0');
    header('Pragma: public');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit();
  }
}