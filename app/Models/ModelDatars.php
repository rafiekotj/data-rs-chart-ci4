<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDatars extends Model
{
  private string $rpcUrl = 'https://sxlhygcxwwujmdpmzaob.supabase.co/rest/v1/rpc';
  private string $supabaseKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InN4bGh5Z2N4d3d1am1kcG16YW9iIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NTc2NDYxODIsImV4cCI6MjA3MzIyMjE4Mn0.JzoPRL0POJn6JSqwbT7uFOH6JAIYqYzY_BmizjuIJrc';

  public function getUniqueLatestPage(int $page = 1, int $perPage = 100, string $search = ''): array
  {
    $url = "{$this->rpcUrl}/get_rs_unique_latest_page";
    $payload = [
      'page_num'  => $page,
      'per_page'  => $perPage,
      'search_term' => $search,
    ];

    $ch = curl_init($url);
    curl_setopt_array($ch, [
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => json_encode($payload),
      CURLOPT_HTTPHEADER => [
        "apikey: {$this->supabaseKey}",
        "Authorization: Bearer {$this->supabaseKey}",
        "Content-Type: application/json",
        "Accept: application/json",
        "Range-Unit: items",
        "Range: 0-999999"
      ],
      CURLOPT_TIMEOUT => 30,
    ]);

    $response = curl_exec($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($status !== 200 || !$response) {
      log_message('error', "RPC get_rs_unique_latest_page failed ({$status}): {$response}");
      return [];
    }

    $data = json_decode($response, true);
    return is_array($data) ? $data : [];
  }

  public function getUniqueLatestTotal(string $search = ''): int
  {
    $url = "{$this->rpcUrl}/get_rs_unique_latest_count";
    $payload = ['search_term' => $search];

    $ch = curl_init($url);
    curl_setopt_array($ch, [
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => json_encode($payload),
      CURLOPT_HTTPHEADER => [
        "apikey: {$this->supabaseKey}",
        "Authorization: Bearer {$this->supabaseKey}",
        "Content-Type: application/json",
        "Accept: application/json",
      ],
      CURLOPT_TIMEOUT => 30,
    ]);

    $response = curl_exec($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($status !== 200 || !$response) {
      log_message('error', "RPC get_rs_unique_latest_count failed ({$status}): {$response}");
      return 0;
    }

    $data = json_decode($response, true);
    return isset($data[0]['total']) ? (int)$data[0]['total'] : 0;
  }
}