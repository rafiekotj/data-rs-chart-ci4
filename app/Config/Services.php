<?php

namespace Config;

use CodeIgniter\Config\BaseService;

class Services extends BaseService
{
    /**
     * Service untuk koneksi ke Supabase API
     * Gunakan dengan: $supabase = service('supabase');
     */
    public static function supabase($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('supabase');
        }

        return new \App\Libraries\SupabaseService();
    }
}
