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
      throw new \RuntimeException('Missing Supabase configuration.');
    }

    $this->rpcUrl = "{$supabaseUrl}/rest/v1/rpc";
    $this->supabaseKey = $supabaseKey;
  }

  private function callRPC(string $function, array $payload = [], bool $useCache = true): array
  {
    $url = "{$this->rpcUrl}/{$function}";
    $cacheKey = 'rpc_' . $function . '_' . md5(json_encode($payload));
    $cache = cache();

    if ($useCache) {
      $cached = $cache->get($cacheKey);
      if (is_array($cached)) {
        return $cached;
      }
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
        ],
        CURLOPT_TIMEOUT => 90,
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

      if ($useCache) {
        $cache->save($cacheKey, $data, 1800);
      }

      return $data;
    } catch (\Throwable $e) {
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
    $cache = cache();
    $cacheKey = 'kabupaten_by_provinsi_' . md5($provinsi);

    $cached = $cache->get($cacheKey);
    if (is_array($cached)) {
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
      'prov_filter' => !empty($filters['provinsi']) ? (array) $filters['provinsi'] : null,
      'kab_filter' => !empty($filters['kabupaten_kota']) ? (array) $filters['kabupaten_kota'] : null,
      'jenis_list' => !empty($filters['jenis_rs']) ? (array) $filters['jenis_rs'] : null,
      'kelas_list' => !empty($filters['kelas_rs']) ? (array) $filters['kelas_rs'] : null,
      'penyelenggara_list' => !empty($filters['penyelenggara_grup']) ? (array) $filters['penyelenggara_grup'] : null,
      'kategori_list' => !empty($filters['penyelenggara_kategori']) ? (array) $filters['penyelenggara_kategori'] : null,
    ];

    return $this->callRPC('get_rs_summary', $payload);
  }

  public function getLineData($kolom, array $filters = [])
  {
    $tahunAwal = $filters['tahun_awal'] ?? null;
    $tahunAkhir = $filters['tahun_akhir'] ?? null;

    if (!$tahunAwal || !$tahunAkhir) {
      return [];
    }

    $allData = [];

    for ($tahun = $tahunAwal; $tahun <= $tahunAkhir; $tahun++) {
      $payload = [
        'kolom' => $kolom,
        'subkolom' => null,
        'tahun_filter' => $tahun,
        'prov_filter' => !empty($filters['provinsi']) ? (array) $filters['provinsi'] : null,
        'kab_filter' => !empty($filters['kabupaten_kota']) ? (array) $filters['kabupaten_kota'] : null,
        'jenis_list' => !empty($filters['jenis_rs']) ? (array) $filters['jenis_rs'] : null,
        'kelas_list' => !empty($filters['kelas_rs']) ? (array) $filters['kelas_rs'] : null,
        'penyelenggara_list' => !empty($filters['penyelenggara_grup']) ? (array) $filters['penyelenggara_grup'] : null,
        'kategori_list' => !empty($filters['penyelenggara_kategori'])
          ? (array) $filters['penyelenggara_kategori']
          : null,
      ];

      $response = $this->callRPC('get_rs_summary', $payload);

      if (!$response || !is_array($response)) {
        continue;
      }

      foreach ($response as $row) {
        $row['tahun'] = $tahun;
        $allData[] = $row;
      }
    }

    $grouped = [];
    foreach ($allData as $row) {
      $nama = $row['nama'] ?? '-';
      $tahun = $row['tahun'] ?? 0;
      $key = "{$nama}_{$tahun}";

      if (!isset($grouped[$key])) {
        $grouped[$key] = [
          'nama' => $nama,
          'tahun' => $tahun,
          'total' => (int) ($row['total'] ?? 0),
        ];
      } else {
        $grouped[$key]['total'] += (int) ($row['total'] ?? 0);
      }
    }

    return array_values($grouped);
  }

  public function getFilteredTable(
    string $kolom,
    array $filters = [],
    ?string $subkolom = null,
    ?int $limit = 500,
    ?int $offset = 0,
    bool $fetchAll = false,
  ): array {
    $payloadBase = [
      'kolom' => $kolom,
      'subkolom' => $subkolom,
      'tahun_filter' => $filters['tahun'] ?? null,
      'prov_filter' => !empty($filters['provinsi']) ? (array) $filters['provinsi'] : null,
      'kab_filter' => !empty($filters['kabupaten_kota']) ? (array) $filters['kabupaten_kota'] : null,
      'jenis_list' => !empty($filters['jenis_rs']) ? (array) $filters['jenis_rs'] : null,
      'kelas_list' => !empty($filters['kelas_rs']) ? (array) $filters['kelas_rs'] : null,
      'penyelenggara_list' => !empty($filters['penyelenggara_grup']) ? (array) $filters['penyelenggara_grup'] : null,
      'kategori_list' => !empty($filters['penyelenggara_kategori']) ? (array) $filters['penyelenggara_kategori'] : null,
    ];

    if ($fetchAll) {
      $allData = [];
      $offset = 0;

      while (true) {
        $payload = $payloadBase;

        if (!empty($limit)) {
          $payload['limit_rows'] = $limit;
          $payload['offset_rows'] = $offset;
        }

        $batch = $this->callRPC('get_rs_filtered', $payload);
        if (!is_array($batch) || count($batch) === 0) {
          break;
        }

        $allData = array_merge($allData, $batch);

        if (count($batch) < $limit) {
          break;
        }

        $offset += $limit;
      }

      return [
        'data' => $allData,
        'total' => count($allData),
        'limited' => false,
      ];
    }

    $payload = array_merge($payloadBase, [
      'limit_rows' => $limit,
      'offset_rows' => $offset,
    ]);

    $data = $this->callRPC('get_rs_filtered', $payload);

    if (!is_array($data)) {
      return ['data' => [], 'total' => 0, 'limited' => false];
    }

    $total = count($data);
    $limited = $total > $limit;

    return [
      'data' => array_slice($data, 0, $limit),
      'total' => $total,
      'limited' => $limited,
    ];
  }
}