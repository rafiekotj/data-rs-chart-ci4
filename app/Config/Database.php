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

        // ✅ Pindahkan semua panggilan env() ke sini
        $this->default = [
            'DSN'          => env('database.default.DSN'),
            'hostname'     => env('database.default.hostname', 'db.sxlhygcxwwujmdpmzaob.supabase.co'),
            'username'     => env('database.default.username', 'postgres'),
            'password'     => env('database.default.password', 'Rafie*1987'),
            'database'     => env('database.default.database', 'postgres'),
            'DBDriver'     => env('database.default.DBDriver', 'Postgre'),
            'DBPrefix'     => '',
            'pConnect'     => false,
            'DBDebug'      => (ENVIRONMENT !== 'production'),
            'charset'      => env('database.default.charset', 'utf8'),
            'DBCollat'     => env('database.default.DBCollat', 'utf8_general_ci'),
            'swapPre'      => '',
            'encrypt'      => env('database.default.encrypt', true),
            'sslmode'      => 'require',
            'compress'     => false,
            'strictOn'     => false,
            'failover'     => [],
            'port'         => env('database.default.port', 5432),
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