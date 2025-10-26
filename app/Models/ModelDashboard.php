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
    $this->rpcUrl = rtrim(getenv('SUPABASE_URL'), '/') . '/rest/v1/rpc';
    $this->supabaseKey = getenv('SUPABASE_KEY');
  }

  /**
   * 🔹 Helper: Memanggil fungsi RPC Supabase
   */
  private function callRPC(string $function, array $payload = []): array
  {
    try {
      $url = "{$this->rpcUrl}/{$function}";
      $cacheKey = "rpc_{$function}_" . md5(json_encode($payload));
      $cache = cache();

      if ($result = $cache->get($cacheKey)) {
        return is_array($result) ? $result : [];
      }

      $ch = curl_init($url);
      curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_HTTPHEADER => [
          "apikey: {$this->supabaseKey}",
          "Authorization: Bearer {$this->supabaseKey}",
          'Content-Type: application/json',
        ],
        CURLOPT_TIMEOUT => 20,
      ]);

      $response = curl_exec($ch);
      $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      curl_close($ch);

      if ($response === false || $status !== 200) {
        return [];
      }

      $data = json_decode($response, true);
      if (!is_array($data)) {
        return [];
      }

      $cache->save($cacheKey, $data, 1800);
      return $data;
    } catch (\Throwable $e) {
      log_message('error', 'callRPC error: ' . $e->getMessage());
      return [];
    }
  }

  // ===================== 🔸 LIST DROPDOWN =====================

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
    $unique = array_unique(array_map(fn($d) => (int) ($d['tahun'] ?? 0), $data));
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
    foreach ($data as $row) {
      $val = trim($row[$field] ?? '');
      if ($val && !in_array(strtolower($val), array_map('strtolower', $unique))) {
        $unique[] = $val;
      }
    }
    sort($unique);
    return array_map(fn($v) => [$field => $v], $unique);
  }

  // ===================== 🔸 BAR CHART =====================

  public function getBarData(string $kolom, string $tahun, ?string $provinsi = null, ?string $kabupaten = null): array
  {
    $payload = [
      'kolom' => $kolom,
      'tahun_filter' => (int) $tahun,
      'prov_filter' => $provinsi ?: null,
      'kab_filter' => $kabupaten ?: null,
    ];

    $data = $this->callRPC('get_rs_summary', $payload);
    if (empty($data)) {
      return [];
    }

    return array_map(
      fn($row) => [
        'nama' => $row['nama'] ?? ($row[$kolom] ?? 'Tidak Diketahui'),
        'total' => (int) ($row['total'] ?? 0),
        'total_semua' => (int) ($row['total_semua'] ?? 0),
      ],
      $data,
    );
  }

  // ===================== 🔸 LINE CHART (TREN) =====================

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
        'prov_filter' => $provinsi ?: null,
        'kab_filter' => $kabupaten ?: null,
      ];

      $data = $this->callRPC('get_rs_summary', $payload);
      if (empty($data)) {
        // tetap masukkan tahun dengan data kosong agar line chart tetap sejajar
        $hasil[] = ['tahun' => $tahun, 'data' => []];
        continue;
      }

      // masukkan semua data, walau total = 0
      $filtered = array_map(
        fn($r) => [
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

    log_message('debug', json_encode($hasil));
    return $hasil;
  }

  // ===================== 🔸 DROPDOWN KATEGORI =====================

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
      if ($val && !in_array(strtolower($val), array_map('strtolower', $unique))) {
        $unique[] = $val;
      }
    }
    sort($unique);
    return array_map(fn($v) => ['nama' => $v], $unique);
  }
}