<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDashboard extends Model
{
  private string $supabaseUrl = 'https://sxlhygcxwwujmdpmzaob.supabase.co/rest/v1';
  private string $rpcUrl = 'https://sxlhygcxwwujmdpmzaob.supabase.co/rest/v1/rpc';
  private string $supabaseKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InN4bGh5Z2N4d3d1am1kcG16YW9iIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NTc2NDYxODIsImV4cCI6MjA3MzIyMjE4Mn0.JzoPRL0POJn6JSqwbT7uFOH6JAIYqYzY_BmizjuIJrc';

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
        CURLOPT_POST => !empty($payload),
        CURLOPT_POSTFIELDS => !empty($payload) ? json_encode($payload) : null,
        CURLOPT_HTTPHEADER => [
          "apikey: {$this->supabaseKey}",
          "Authorization: Bearer {$this->supabaseKey}",
          "Content-Type: application/json",
        ],
        CURLOPT_TIMEOUT => 20,
      ]);

      $response = curl_exec($ch);
      $status   = curl_getinfo($ch, CURLINFO_HTTP_CODE);
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
      return [];
    }
  }

  public function getListProvinsi(): array
  {
    $data = $this->callRPC('get_unique_provinsi');
    if (empty($data)) return [];

    $unique = [];
    foreach ($data as $row) {
      $provinsi = trim($row['provinsi'] ?? '');
      if ($provinsi && !in_array(strtolower($provinsi), array_map('strtolower', $unique))) {
        $unique[] = $provinsi;
      }
    }

    sort($unique);
    return array_map(fn($p) => ['provinsi' => $p], $unique);
  }

  public function getListKabupatenKota(): array
  {
    $data = $this->callRPC('get_unique_kabupaten');
    if (empty($data)) return [];

    $unique = [];
    foreach ($data as $row) {
      $kab = trim($row['kabupaten_kota'] ?? '');
      if ($kab && !in_array(strtolower($kab), array_map('strtolower', $unique))) {
        $unique[] = $kab;
      }
    }

    sort($unique);
    return array_map(fn($k) => ['kabupaten_kota' => $k], $unique);
  }

  public function getListTahun(): array
  {
    $data = $this->callRPC('get_unique_tahun');
    if (empty($data)) return [];

    $unique = [];
    foreach ($data as $row) {
      $tahun = (int)($row['tahun'] ?? 0);
      if ($tahun && !in_array($tahun, $unique)) {
        $unique[] = $tahun;
      }
    }

    rsort($unique);
    return array_map(fn($t) => ['tahun' => $t], $unique);
  }

  public function getBarData(string $kolom, string $tahun, string $provinsi = '', string $kabupaten = ''): array
  {
    $tahun = (int)$tahun ?: date('Y');

    $payload = [
      'kolom' => $kolom,
      'tahun_filter' => $tahun,
      'prov_filter' => $provinsi ?: null,
      'kab_filter' => $kabupaten ?: null
    ];

    $data = $this->callRPC('get_rs_summary', $payload);
    if (empty($data) || !is_array($data)) {
      return [];
    }

    $mapped = array_map(fn($row) => [
      $kolom => $row['nama'] ?? $row[$kolom] ?? 'Tidak Diketahui',
      'total' => (int)($row['total'] ?? 0)
    ], $data);

    $hasValid = array_filter($mapped, fn($r) => $r['total'] > 0);
    if (empty($hasValid)) {
      return [];
    }

    return $mapped;
  }

  public function getKabupatenByProvinsi(string $provinsi): array
  {
    if (!$provinsi) return [];

    $data = $this->callRPC('get_kabupaten_by_provinsi', [
      'selected_provinsi' => $provinsi,
    ]);

    if (empty($data)) return [];

    $unique = [];
    foreach ($data as $row) {
      $kab = trim($row['kabupaten_kota'] ?? '');
      if ($kab && !in_array(strtolower($kab), array_map('strtolower', $unique))) {
        $unique[] = $kab;
      }
    }

    sort($unique);
    return array_map(fn($k) => ['kabupaten_kota' => $k], $unique);
  }

  public function getLineData(string $kolom, int $tahunAwal, int $tahunAkhir, string $provinsi = '', string $kabupaten = ''): array
  {
    $hasil = [];

    for ($tahun = $tahunAwal; $tahun <= $tahunAkhir; $tahun++) {
      $payload = [
        'kolom' => $kolom,
        'tahun_filter' => $tahun,
        'prov_filter' => $provinsi ?: null,
        'kab_filter' => $kabupaten ?: null
      ];

      $data = $this->callRPC('get_rs_summary', $payload);

      if (empty($data) || !is_array($data)) continue;

      $filtered = array_filter(
        $data,
        fn($row) =>
        !empty($row['total']) && $row['total'] > 0
      );

      if (empty($filtered)) continue;

      $hasil[] = [
        'tahun' => $tahun,
        'data' => array_map(fn($row) => [
          'nama' => $row['nama'] ?? $row[$kolom] ?? 'Tidak Diketahui',
          'total' => (int)($row['total'] ?? 0)
        ], $filtered)
      ];
    }

    return $hasil;
  }
}
