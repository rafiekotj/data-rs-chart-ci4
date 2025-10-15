<?php

namespace Config;

use CodeIgniter\Database\Config;

/**
 * --------------------------------------------------------------------
 * Database Configuration
 * --------------------------------------------------------------------
 * 
 * This project retrieves data via Supabase REST API instead of
 * direct database connections. The configuration structure below
 * follows CodeIgniter’s standard format.
 */
class Database extends Config
{
  /**
   * Path to Migrations and Seeds directories.
   */
  public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

  /**
   * Default database connection group.
   */
  public string $defaultGroup = 'default';

  /**
   * Default database settings.
   */
  public array $default = [
    'DSN'          => '',
    'hostname'     => '',
    'username'     => '',
    'password'     => '',
    'database'     => '',
    'DBDriver'     => 'MySQLi',
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
   * Database configuration for testing environment.
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

  /**
   * Switch to the testing configuration group when
   * the application is running in testing mode.
   */
  public function __construct()
  {
    parent::__construct();

    if (ENVIRONMENT === 'testing') {
      $this->defaultGroup = 'tests';
    }
  }
}
