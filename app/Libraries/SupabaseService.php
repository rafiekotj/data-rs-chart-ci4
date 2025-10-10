<?php

namespace App\Libraries;

class SupabaseService
{
    protected $url;
    protected $key;

    public function __construct()
    {
        $this->url = rtrim(getenv('SUPABASE_URL'), '/');
        $this->key = getenv('SUPABASE_KEY');
    }

    private function request($endpoint, $query = '')
    {
        $url = "{$this->url}/rest/v1/{$endpoint}" . ($query ? "?{$query}" : '');
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "apikey: {$this->key}",
                "Authorization: Bearer {$this->key}",
                "Content-Type: application/json",
            ],
        ]);
        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }

    public function getAll($table, $query = '')
    {
        return $this->request($table, $query);
    }
}
