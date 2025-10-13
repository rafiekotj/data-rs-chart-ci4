<?php

namespace Config;

use CodeIgniter\Database\Config;

/**
 * Database Configuration
 * ---------------------------------------
 * Karena kita menggunakan Supabase REST API (bukan koneksi database langsung),
 * maka konfigurasi koneksi database ini hanya bersifat dummy (tidak aktif).
 *
 * Semua query akan di-handle melalui Model khusus yang memanggil Supabase
 * menggunakan HTTP request (curl).
 */
class Database extends Config
{
  /**
   * The directory that holds the Migrations and Seeds directories.
   */
  public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

  /**
   * Default group name
   */
  public string $defaultGroup = 'default';

  /**
   * Dummy database configuration.
   * Tidak digunakan karena data diambil dari Supabase API.
   */
  public array $default = [
    'DSN'          => '',
    'hostname'     => '',
    'username'     => '',
    'password'     => '',
    'database'     => '',
    'DBDriver'     => 'MySQLi', // placeholder
    'DBPrefix'     => '',
    'pConnect'     => false,
    'DBDebug'      => (ENVIRONMENT !== 'production'),
    'charset'      => 'utf8',
    'DBCollat'     => 'utf8_general_ci',
    'swapPre'      => '',
    'encrypt'      => false,
    'compress'     => false,
    'strictOn'     => false,
    'failover'     => [],
    'port'         => 3306,
    'numberNative' => false,
    'foundRows'    => false,
    'dateFormat'   => [
      'date'     => 'Y-m-d',
      'datetime' => 'Y-m-d H:i:s',
      'time'     => 'H:i:s',
    ],
  ];

  /**
   * Unit testing database configuration (juga dummy)
   */
  public array $tests = [
    'DSN'         => '',
    'hostname'    => '127.0.0.1',
    'username'    => '',
    'password'    => '',
    'database'    => ':memory:',
    'DBDriver'    => 'SQLite3',
    'DBPrefix'    => 'db_',
    'pConnect'    => false,
    'DBDebug'     => true,
    'charset'     => 'utf8',
    'DBCollat'    => '',
    'swapPre'     => '',
    'encrypt'     => false,
    'compress'    => false,
    'strictOn'    => false,
    'failover'    => [],
    'port'        => 3306,
    'foreignKeys' => true,
    'busyTimeout' => 1000,
    'dateFormat'  => [
      'date'     => 'Y-m-d',
      'datetime' => 'Y-m-d H:i:s',
      'time'     => 'H:i:s',
    ],
  ];

  public function __construct()
  {
    parent::__construct();

    // Saat mode testing, gunakan konfigurasi tests
    if (ENVIRONMENT === 'testing') {
      $this->defaultGroup = 'tests';
    }
  }
}