<?php

namespace Config;

use CodeIgniter\Database\Config;

/**
 * Database Configuration
 */
class Database extends Config
{
    /**
     * The directory that holds the Migrations and Seeds directories.
     */
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    /**
     * Lets you choose which connection group to use if no other is specified.
     */
    public string $defaultGroup = 'default';

    /**
     * The default database connection.
     *
     * @var array<string, mixed>
     */
    public array $default;

    /**
     * This database connection is used when running PHPUnit database tests.
     *
     * @var array<string, mixed>
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

        if (ENVIRONMENT === 'testing') {
            $this->defaultGroup = 'tests';
        }

        /**
         * Fallback helper — prioritizes `database.default.*` first, then checks `database_default_*`
         * (Render environment variables cannot use dots)
         */
        $env = static function (string $dotKey, string $underscoreKey, $default = null) {
            return env($dotKey, getenv($underscoreKey) ?: $default);
        };

        $this->default = [
            'DSN'          => $env(
                'database.default.DSN',
                'database_default_DSN',
                'pgsql:host=aws-1-ap-southeast-1.pooler.supabase.com;port=6543;dbname=postgres;user=postgres.sxlhygcxwwujmdpmzaob;password=Rafie*1987;sslmode=require'
            ),
            'hostname'     => $env('database.default.hostname', 'database_default_hostname', 'aws-1-ap-southeast-1.pooler.supabase.com'),
            'username'     => $env('database.default.username', 'database_default_username', 'postgres.sxlhygcxwwujmdpmzaob'),
            'password'     => $env('database.default.password', 'database_default_password', 'Rafie*1987'),
            'database'     => $env('database.default.database', 'database_default_database', 'postgres'),
            'DBDriver'     => $env('database.default.DBDriver', 'database_default_DBDriver', 'Postgre'),
            'DBPrefix'     => '',
            'pConnect'     => false,
            'DBDebug'      => (ENVIRONMENT !== 'production'),
            'charset'      => $env('database.default.charset', 'database_default_charset', 'utf8'),
            'DBCollat'     => $env('database.default.DBCollat', 'database_default_DBCollat', 'utf8_general_ci'),
            'swapPre'      => '',
            'encrypt'      => $env('database.default.encrypt', 'database_default_encrypt', true),
            'sslmode'      => 'require',
            'compress'     => false,
            'strictOn'     => false,
            'failover'     => [],
            'port'         => $env('database.default.port', 'database_default_port', 6543),
            'numberNative' => false,
            'foundRows'    => false,
            'dateFormat'   => [
                'date'     => 'Y-m-d',
                'datetime' => 'Y-m-d H:i:s',
                'time'     => 'H:i:s',
            ],
        ];
    }
}