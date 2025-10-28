<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDashboard extends Model
{
  private string $rpcUrl;
  private string $supabaseKey;

  public function __construct()
  {
    parent::__construct();

    $supabaseUrl = rtrim(env('SUPABASE_URL'), '/');
    $supabaseKey = env('SUPABASE_KEY');

    if (empty($supabaseUrl) || empty($supabaseKey)) {
      log_message('error', 'Supabase credentials are missing in .env file.');
      throw new \RuntimeException('Missing Supabase configuration.');
    }

    $this->rpcUrl = "{$supabaseUrl}/rest/v1/rpc";
    $this->supabaseKey = $supabaseKey;
  }

  private function callRPC(string $function, array $payload = []): array
  {
    $url = "{$this->rpcUrl}/{$function}";
    $cacheKey = 'rpc_' . $function . '_' . md5(json_encode($payload));
    $cache = cache();

    // Ambil dari cache lebih dulu
    $cached = $cache->get($cacheKey);
    if (is_array($cached)) {
      return $cached;
    }

    try {
      $ch = curl_init($url);
      curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_HTTPHEADER => [
          "apikey: {$this->supabaseKey}",
          "Authorization: Bearer {$this->supabaseKey}",
          'Content-Type: application/json',
          'Accept: application/json',
          'Range-Unit: items',
          'Range: 0-999999',
        ],
        CURLOPT_TIMEOUT => 30, // timeout dikurangi agar lebih responsif
      ]);

      $response = curl_exec($ch);
      $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      curl_close($ch);

      // Validasi cepat
      if ($status !== 200 || !$response) {
        return [];
      }

      $data = json_decode($response, true);
      if (!is_array($data)) {
        return [];
      }

      $cache->save($cacheKey, $data, 1800); // cache 30 menit
      return $data;
    } catch (\Throwable) {
      return [];
    }
  }

  public function getListProvinsi(): array
  {
    $data = $this->callRPC('get_unique_provinsi');
    return $this->mapUnique($data, 'provinsi');
  }

  public function getListKabupatenKota(): array
  {
    $data = $this->callRPC('get_kabupaten_by_provinsi', ['selected_provinsi' => 'semua']);
    return $this->mapUnique($data, 'kabupaten_kota');
  }

  public function getListTahun(): array
  {
    $data = $this->callRPC('get_unique_tahun');
    $unique = array_filter(array_unique(array_map(fn($d) => (int) ($d['tahun'] ?? 0), $data)));
    rsort($unique);
    return array_map(fn($t) => ['tahun' => $t], $unique);
  }

  public function getKabupatenByProvinsi(string $provinsi): array
  {
    $data = $this->callRPC('get_kabupaten_by_provinsi', ['selected_provinsi' => $provinsi]);
    return $this->mapUnique($data, 'kabupaten_kota');
  }

  private function mapUnique(array $data, string $field): array
  {
    if (empty($data)) {
      return [];
    }

    $unique = [];
    $seen = [];

    foreach ($data as $row) {
      $val = trim($row[$field] ?? '');
      $lower = strtolower($val);

      if ($val !== '' && !isset($seen[$lower])) {
        $unique[] = $val;
        $seen[$lower] = true;
      }
    }

    sort($unique);
    return array_map(fn($v) => [$field => $v], $unique);
  }

  public function getBarData(string $kolom, string $tahun, ?string $provinsi = null, ?string $kabupaten = null): array
  {
    $payload = [
      'kolom' => $kolom,
      'tahun_filter' => (int) $tahun,
      'prov_filter' => $provinsi ? trim($provinsi) : null,
      'kab_filter' => $kabupaten ? trim($kabupaten) : null,
    ];

    $data = $this->callRPC('get_rs_summary', $payload);
    if (empty($data)) {
      return [];
    }

    return array_map(
      static fn($row) => [
        'nama' => $row['nama'] ?? ($row[$kolom] ?? 'Tidak Diketahui'),
        'total' => (int) ($row['total'] ?? 0),
        'total_semua' => (int) ($row['total_semua'] ?? 0),
      ],
      $data,
    );
  }

  public function getLineData(
    string $kolom,
    int $tahunAwal,
    int $tahunAkhir,
    ?string $provinsi = null,
    ?string $kabupaten = null,
  ): array {
    $hasil = [];

    for ($tahun = $tahunAwal; $tahun <= $tahunAkhir; $tahun++) {
      $payload = [
        'kolom' => $kolom,
        'tahun_filter' => $tahun,
        'prov_filter' => $provinsi ? trim($provinsi) : null,
        'kab_filter' => $kabupaten ? trim($kabupaten) : null,
      ];

      $data = $this->callRPC('get_rs_summary', $payload);
      if (empty($data)) {
        $hasil[] = ['tahun' => $tahun, 'data' => []];
        continue;
      }

      $filtered = array_map(
        static fn($r) => [
          'nama' => $r['nama'] ?? ($r[$kolom] ?? 'Tidak Diketahui'),
          'total' => (int) ($r['total'] ?? 0),
        ],
        $data,
      );

      $hasil[] = [
        'tahun' => $tahun,
        'data' => $filtered,
      ];
    }

    return $hasil;
  }

  public function getListJenisRS(): array
  {
    return $this->getGenericList('get_unique_jenis');
  }

  public function getListKelasRS(): array
  {
    return $this->getGenericList('get_unique_kelas');
  }

  public function getListPenyelenggaraRS(): array
  {
    return $this->getGenericList('get_unique_penyelenggara');
  }

  private function getGenericList(string $rpcName): array
  {
    $data = $this->callRPC($rpcName);
    if (empty($data)) {
      return [];
    }

    $unique = [];
    foreach ($data as $row) {
      $val = trim($row['nama'] ?? ($row['penyelenggara_grup'] ?? ''));
      if ($val) {
        $unique[strtolower($val)] = $val;
      }
    }

    sort($unique);
    return array_map(fn($v) => ['nama' => $v], $unique);
  }

  public function getAllFilteredForExport(
    string $kolom,
    ?string $tahun = null,
    ?string $provinsi = null,
    ?string $kabupaten = null,
    ?string $kategori = null,
  ): array {
    $allData = [];
    $offset = 0;
    $batchSize = 1000;

    do {
      $payload = [
        'kolom' => (string) $kolom,
        'tahun_filter' => is_numeric($tahun) && $tahun !== '' ? (int) $tahun : null,
        'prov_filter' => $provinsi === 'semua' || $provinsi === '' ? null : trim((string) $provinsi),
        'kab_filter' => $kabupaten === 'semua' || $kabupaten === '' ? null : trim((string) $kabupaten),
        'kategori' => $kategori === 'semua' || $kategori === '' ? null : trim((string) $kategori),
        'limit_val' => $batchSize,
        'offset_val' => $offset,
      ];

      $data = $this->callRPC('get_rs_filtered', $payload);

      if (empty($data)) {
        break;
      }

      foreach ($data as $row) {
        $allData[] = [
          'rumah_sakit' => trim($row['rumah_sakit'] ?? ''),
          'alamat' => trim($row['alamat'] ?? ''),
          'kelas_rs' => trim($row['kelas_rs'] ?? ''),
          'jenis_rs' => trim($row['jenis_rs'] ?? ''),
          'kabupaten_kota' => trim($row['kabupaten_kota'] ?? ''),
          'provinsi' => trim($row['provinsi'] ?? ''),
          'penyelenggara_grup' => trim($row['penyelenggara_grup'] ?? ''),
          'penyelenggara_kategori' => trim($row['penyelenggara_kategori'] ?? ''),
          'tahun' => (int) ($row['tahun'] ?? 0),
        ];
      }

      $offset += $batchSize;
    } while (count($data) === $batchSize);

    return $allData;
  }
}