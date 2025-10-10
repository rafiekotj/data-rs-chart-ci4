<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function dbtest()
    {
        try {
            $db = \Config\Database::connect();
            if ($db->connID) {
                echo "✅ Koneksi ke Supabase berhasil!";
            } else {
                echo "❌ Gagal konek ke database.<br>";

                // Tambahkan debug detail
                $lastError = error_get_last();
                echo "<pre>";
                print_r($lastError);
                echo "</pre>";
            }
        } catch (\Throwable $e) {
            echo "⚠️ Error: " . $e->getMessage();
        }
    }
}