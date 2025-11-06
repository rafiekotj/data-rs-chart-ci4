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
        CURLOPT_TIMEOUT => 30,
      ]);

      $response = curl_exec($ch);
      $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      curl_close($ch);

      if ($status !== 200 || !$response) {
        return [];
      }

      $data = json_decode($response, true);
      if (!is_array($data)) {
        return [];
      }

      $cache->save($cacheKey, $data, 1800);
      return $data;
    } catch (\Throwable) {
      return [];
    }
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

    if ($field === 'kelas_rs') {
      $order = ['A', 'B', 'C', 'D', 'D Pratama', 'Belum Ditetapkan'];

      usort($unique, function ($a, $b) use ($order) {
        $indexA = array_search(ucwords(strtolower($a)), $order);
        $indexB = array_search(ucwords(strtolower($b)), $order);

        $indexA = $indexA === false ? PHP_INT_MAX : $indexA;
        $indexB = $indexB === false ? PHP_INT_MAX : $indexB;

        return $indexA <=> $indexB;
      });
    }

    return array_map(fn($v) => [$field => $v], $unique);
  }

  public function getListProvinsi(): array
  {
    $data = $this->callRPC('get_unique_provinsi');
    return $this->mapUnique($data, 'provinsi');
  }

  public function getListKabupatenKota(): array
  {
    $cache = cache();
    $cacheKey = 'kabupaten_semua_provinsi';

    $cached = $cache->get($cacheKey);
    if (is_array($cached)) {
      return $cached;
    }

    $data = $this->callRPC('get_kabupaten_by_provinsi', ['selected_provinsi' => 'semua']);
    $mapped = $this->mapUnique($data, 'kabupaten_kota');

    $cache->save($cacheKey, $mapped, 604800);
    return $mapped;
  }

  public function getListTahun(): array
  {
    $data = $this->callRPC('get_unique_tahun');
    $unique = array_filter(array_unique(array_map(fn($d) => (int) ($d['tahun'] ?? 0), $data)));
    rsort($unique);
    return array_map(fn($t) => ['tahun' => $t], $unique);
  }

  public function getListJenisRS()
  {
    $data = $this->callRPC('get_unique_jenis_rs');
    return $this->mapUnique($data, 'jenis_rs');
  }

  public function getListKelasRS()
  {
    $data = $this->callRPC('get_unique_kelas_rs');
    return $this->mapUnique($data, 'kelas_rs');
  }

  public function getListPenyelenggaraRS()
  {
    $data = $this->callRPC('get_unique_penyelenggara_rs');
    return $this->mapUnique($data, 'penyelenggara_grup');
  }

  public function getKabupatenByProvinsi(string $provinsi): array
  {
    log_message('debug', 'Query kabupaten untuk provinsi: ' . $provinsi);

    $cache = cache();
    $cacheKey = 'kabupaten_by_provinsi_' . md5($provinsi);

    $cached = $cache->get($cacheKey);
    if (is_array($cached)) {
      log_message('debug', "Cache hit untuk provinsi: {$provinsi}");
      return $cached;
    }

    $data = $this->callRPC('get_kabupaten_by_provinsi', ['selected_provinsi' => $provinsi]);
    $mapped = $this->mapUnique($data, 'kabupaten_kota');

    $cache->save($cacheKey, $mapped, 604800);

    return $mapped;
  }

  public function getBarData(string $kolom, array $filters = [], ?string $subkolom = null): array
  {
    $payload = [
      'kolom' => $kolom,
      'subkolom' => $subkolom,
      'tahun_filter' => $filters['tahun'] ?? null,
      'prov_filter' => $filters['provinsi'] ?? null,
      'kab_filter' => $filters['kabupaten_kota'] ?? null,
      'jenis_list' => !empty($filters['jenis_rs']) ? $filters['jenis_rs'] : null,
      'kelas_list' => !empty($filters['kelas_rs']) ? $filters['kelas_rs'] : null,
      'penyelenggara_list' => !empty($filters['penyelenggara_grup']) ? $filters['penyelenggara_grup'] : null,
      'kategori_list' => !empty($filters['penyelenggara_kategori']) ? $filters['penyelenggara_kategori'] : null,
    ];

    return $this->callRPC('get_rs_summary', $payload);
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
          'nama' => $r[$kolom] ?? 'Tidak Diketahui',
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

  private function getGenericList(string $rpcName): array
  {
    $data = $this->callRPC($rpcName);
    if (empty($data)) {
      return [];
    }

    $unique = [];
    foreach ($data as $row) {
      $val = '';
      $keyName = '';

      match ($rpcName) {
        'get_unique_jenis' => ($keyName = 'jenis_rs') && ($val = trim($row['jenis_rs'] ?? '')),
        'get_unique_kelas' => ($keyName = 'kelas_rs') && ($val = trim($row['kelas_rs'] ?? '')),
        'get_unique_penyelenggara' => ($keyName = 'penyelenggara_grup') &&
          ($val = trim($row['penyelenggara_grup'] ?? '')),
        default => ($keyName = 'nama') && ($val = trim($row['nama'] ?? '')),
      };

      if ($val !== '') {
        $unique[strtolower($val)] = [$keyName => $val];
      }
    }

    uasort($unique, fn($a, $b) => strcmp(reset($a), reset($b)));

    return array_values($unique);
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