<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

ERROR - 2025-10-14 02:29:52 --> Error connecting to the database: mysqli_sql_exception: No connection could be made because the target machine actively refused it in C:\xampp\htdocs\rschartsapi\system\Database\MySQLi\Connection.php:201
Stack trace:
#0 C:\xampp\htdocs\rschartsapi\system\Database\MySQLi\Connection.php(201): mysqli->real_connect('localhost', 'root', Object(SensitiveParameterValue), 'ci4', 3306, '', 0)
#1 C:\xampp\htdocs\rschartsapi\system\Database\BaseConnection.php(419): CodeIgniter\Database\MySQLi\Connection->connect(false)
#2 C:\xampp\htdocs\rschartsapi\system\Database\BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
#3 C:\xampp\htdocs\rschartsapi\app\Models\ModelDataRS.php(34): CodeIgniter\Database\BaseConnection->query('\r\n            S...')
#4 C:\xampp\htdocs\rschartsapi\app\Controllers\DataRS.php(21): App\Models\ModelDataRS->getLatestRS()
#5 C:\xampp\htdocs\rschartsapi\system\CodeIgniter.php(933): App\Controllers\DataRS->index()
#6 C:\xampp\htdocs\rschartsapi\system\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\DataRS))
#7 C:\xampp\htdocs\rschartsapi\system\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 C:\xampp\htdocs\rschartsapi\system\Boot.php(363): CodeIgniter\CodeIgniter->run()
#9 C:\xampp\htdocs\rschartsapi\system\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
#10 C:\xampp\htdocs\rschartsapi\public\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
#11 C:\xampp\htdocs\rschartsapi\system\rewrite.php(44): require_once('C:\\xampp\\htdocs...')
#12 {main}

Next CodeIgniter\Database\Exceptions\DatabaseException: No connection could be made because the target machine actively refused it in C:\xampp\htdocs\rschartsapi\system\Database\MySQLi\Connection.php:246
Stack trace:
#0 C:\xampp\htdocs\rschartsapi\system\Database\BaseConnection.php(419): CodeIgniter\Database\MySQLi\Connection->connect(false)
#1 C:\xampp\htdocs\rschartsapi\system\Database\BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
#2 C:\xampp\htdocs\rschartsapi\app\Models\ModelDataRS.php(34): CodeIgniter\Database\BaseConnection->query('\r\n            S...')
#3 C:\xampp\htdocs\rschartsapi\app\Controllers\DataRS.php(21): App\Models\ModelDataRS->getLatestRS()
#4 C:\xampp\htdocs\rschartsapi\system\CodeIgniter.php(933): App\Controllers\DataRS->index()
#5 C:\xampp\htdocs\rschartsapi\system\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\DataRS))
#6 C:\xampp\htdocs\rschartsapi\system\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 C:\xampp\htdocs\rschartsapi\system\Boot.php(363): CodeIgniter\CodeIgniter->run()
#8 C:\xampp\htdocs\rschartsapi\system\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
#9 C:\xampp\htdocs\rschartsapi\public\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
#10 C:\xampp\htdocs\rschartsapi\system\rewrite.php(44): require_once('C:\\xampp\\htdocs...')
#11 {main}
CRITICAL - 2025-10-14 02:29:52 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: No connection could be made because the target machine actively refused it
[Method: GET, Route: datars]
in SYSTEMPATH\Database\BaseConnection.php on line 465.
 1 SYSTEMPATH\Database\BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 APPPATH\Models\ModelDataRS.php(34): CodeIgniter\Database\BaseConnection->query('
            SELECT DISTINCT ON (rumah_sakit, kabupaten_kota)
                id, rumah_sakit, kabupaten_kota, provinsi, tahun, jenis, kelas, kepemilikan, created_at
            FROM data_rs
            WHERE (
                rumah_sakit = \'RS Umum Surya Husadha\'
                OR (rumah_sakit, kabupaten_kota, tahun) IN (
                    SELECT rumah_sakit, kabupaten_kota, MAX(tahun)
                    FROM data_rs
                    WHERE rumah_sakit <> \'RS Umum Surya Husadha\'
                    GROUP BY rumah_sakit, kabupaten_kota
                )
            )
            ORDER BY rumah_sakit, kabupaten_kota, tahun DESC;
        ')
 3 APPPATH\Controllers\DataRS.php(21): App\Models\ModelDataRS->getLatestRS()
 4 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\DataRS->index()
 5 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\DataRS))
 6 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 7 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
 8 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 9 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
10 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
ERROR - 2025-10-14 02:30:38 --> Error connecting to the database: mysqli_sql_exception: No connection could be made because the target machine actively refused it in C:\xampp\htdocs\rschartsapi\system\Database\MySQLi\Connection.php:201
Stack trace:
#0 C:\xampp\htdocs\rschartsapi\system\Database\MySQLi\Connection.php(201): mysqli->real_connect('localhost', 'root', Object(SensitiveParameterValue), 'ci4', 3306, '', 0)
#1 C:\xampp\htdocs\rschartsapi\system\Database\BaseConnection.php(419): CodeIgniter\Database\MySQLi\Connection->connect(false)
#2 C:\xampp\htdocs\rschartsapi\system\Database\BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
#3 C:\xampp\htdocs\rschartsapi\app\Models\ModelDataRS.php(34): CodeIgniter\Database\BaseConnection->query('\r\n            S...')
#4 C:\xampp\htdocs\rschartsapi\app\Controllers\DataRS.php(21): App\Models\ModelDataRS->getLatestRS()
#5 C:\xampp\htdocs\rschartsapi\system\CodeIgniter.php(933): App\Controllers\DataRS->index()
#6 C:\xampp\htdocs\rschartsapi\system\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\DataRS))
#7 C:\xampp\htdocs\rschartsapi\system\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 C:\xampp\htdocs\rschartsapi\system\Boot.php(363): CodeIgniter\CodeIgniter->run()
#9 C:\xampp\htdocs\rschartsapi\system\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
#10 C:\xampp\htdocs\rschartsapi\public\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
#11 C:\xampp\htdocs\rschartsapi\system\rewrite.php(44): require_once('C:\\xampp\\htdocs...')
#12 {main}

Next CodeIgniter\Database\Exceptions\DatabaseException: No connection could be made because the target machine actively refused it in C:\xampp\htdocs\rschartsapi\system\Database\MySQLi\Connection.php:246
Stack trace:
#0 C:\xampp\htdocs\rschartsapi\system\Database\BaseConnection.php(419): CodeIgniter\Database\MySQLi\Connection->connect(false)
#1 C:\xampp\htdocs\rschartsapi\system\Database\BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
#2 C:\xampp\htdocs\rschartsapi\app\Models\ModelDataRS.php(34): CodeIgniter\Database\BaseConnection->query('\r\n            S...')
#3 C:\xampp\htdocs\rschartsapi\app\Controllers\DataRS.php(21): App\Models\ModelDataRS->getLatestRS()
#4 C:\xampp\htdocs\rschartsapi\system\CodeIgniter.php(933): App\Controllers\DataRS->index()
#5 C:\xampp\htdocs\rschartsapi\system\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\DataRS))
#6 C:\xampp\htdocs\rschartsapi\system\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 C:\xampp\htdocs\rschartsapi\system\Boot.php(363): CodeIgniter\CodeIgniter->run()
#8 C:\xampp\htdocs\rschartsapi\system\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
#9 C:\xampp\htdocs\rschartsapi\public\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
#10 C:\xampp\htdocs\rschartsapi\system\rewrite.php(44): require_once('C:\\xampp\\htdocs...')
#11 {main}
CRITICAL - 2025-10-14 02:30:38 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: No connection could be made because the target machine actively refused it
[Method: GET, Route: datars]
in SYSTEMPATH\Database\BaseConnection.php on line 465.
 1 SYSTEMPATH\Database\BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 APPPATH\Models\ModelDataRS.php(34): CodeIgniter\Database\BaseConnection->query('
            SELECT DISTINCT ON (rumah_sakit, kabupaten_kota)
                id, rumah_sakit, kabupaten_kota, provinsi, tahun, jenis, kelas, kepemilikan, created_at
            FROM data_rs
            WHERE (
                rumah_sakit = \'RS Umum Surya Husadha\'
                OR (rumah_sakit, kabupaten_kota, tahun) IN (
                    SELECT rumah_sakit, kabupaten_kota, MAX(tahun)
                    FROM data_rs
                    WHERE rumah_sakit <> \'RS Umum Surya Husadha\'
                    GROUP BY rumah_sakit, kabupaten_kota
                )
            )
            ORDER BY rumah_sakit, kabupaten_kota, tahun DESC;
        ')
 3 APPPATH\Controllers\DataRS.php(21): App\Models\ModelDataRS->getLatestRS()
 4 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\DataRS->index()
 5 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\DataRS))
 6 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 7 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
 8 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 9 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
10 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-10-14 02:36:22 --> CodeIgniter\View\Exceptions\ViewException: Invalid file: "errors/html/error_general.php"
[Method: GET, Route: datars]
in SYSTEMPATH\Exceptions\FrameworkException.php on line 39.
 1 SYSTEMPATH\View\View.php(214): CodeIgniter\Exceptions\FrameworkException::forInvalidFile('errors/html/error_general.php')
 2 SYSTEMPATH\Common.php(1167): CodeIgniter\View\View->render('errors/html/error_general', [], true)
 3 APPPATH\Controllers\DataRS.php(34): view('errors/html/error_general', [...])
 4 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Datars->index()
 5 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Datars))
 6 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 7 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
 8 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 9 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
10 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-10-14 02:54:17 --> CodeIgniter\View\Exceptions\ViewException: Invalid file: "errors/html/error_general.php"
[Method: GET, Route: datars]
in SYSTEMPATH\Exceptions\FrameworkException.php on line 39.
 1 SYSTEMPATH\View\View.php(214): CodeIgniter\Exceptions\FrameworkException::forInvalidFile('errors/html/error_general.php')
 2 SYSTEMPATH\Common.php(1167): CodeIgniter\View\View->render('errors/html/error_general', [], true)
 3 APPPATH\Controllers\Datars.php(34): view('errors/html/error_general', [...])
 4 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Datars->index()
 5 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Datars))
 6 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 7 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
 8 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 9 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
10 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-10-14 02:54:26 --> CodeIgniter\View\Exceptions\ViewException: Invalid file: "errors/html/error_general.php"
[Method: GET, Route: datars]
in SYSTEMPATH\Exceptions\FrameworkException.php on line 39.
 1 SYSTEMPATH\View\View.php(214): CodeIgniter\Exceptions\FrameworkException::forInvalidFile('errors/html/error_general.php')
 2 SYSTEMPATH\Common.php(1167): CodeIgniter\View\View->render('errors/html/error_general', [], true)
 3 APPPATH\Controllers\Datars.php(34): view('errors/html/error_general', [...])
 4 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Datars->index()
 5 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Datars))
 6 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 7 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
 8 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 9 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
10 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-10-14 02:56:43 --> CodeIgniter\View\Exceptions\ViewException: Invalid file: "data/error_general.php"
[Method: GET, Route: datars]
in SYSTEMPATH\Exceptions\FrameworkException.php on line 39.
 1 SYSTEMPATH\View\View.php(214): CodeIgniter\Exceptions\FrameworkException::forInvalidFile('data/error_general.php')
 2 SYSTEMPATH\Common.php(1167): CodeIgniter\View\View->render('data/error_general', [], true)
 3 APPPATH\Controllers\Datars.php(34): view('data/error_general', [...])
 4 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Datars->index()
 5 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Datars))
 6 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 7 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
 8 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 9 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
10 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-10-14 03:16:47 --> ErrorException: Undefined array key "rumah_sakit"
[Method: GET, Route: datars]
in APPPATH\Views\data\datars.php on line 25.
 1 APPPATH\Views\data\datars.php(25): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Undefined array key "rumah_sakit"', 'C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\data\\datars.php', 25)
 2 SYSTEMPATH\View\View.php(226): include('C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\data\\datars.php')
 3 SYSTEMPATH\View\View.php(229): CodeIgniter\View\View->CodeIgniter\View\{closure}()
 4 SYSTEMPATH\Common.php(1167): CodeIgniter\View\View->render('data/datars', [], true)
 5 APPPATH\Controllers\Datars.php(46): view('data/datars', [...])
 6 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Datars->index()
 7 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Datars))
 8 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 9 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
10 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
11 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
12 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-10-14 06:00:47 --> CodeIgniter\View\Exceptions\ViewException: Invalid file: "errors/html/error_general.php"
[Method: GET, Route: datars]
in SYSTEMPATH\Exceptions\FrameworkException.php on line 39.
 1 SYSTEMPATH\View\View.php(214): CodeIgniter\Exceptions\FrameworkException::forInvalidFile('errors/html/error_general.php')
 2 SYSTEMPATH\Common.php(1167): CodeIgniter\View\View->render('errors/html/error_general', [], true)
 3 APPPATH\Controllers\Datars.php(32): view('errors/html/error_general', [...])
 4 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Datars->index()
 5 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Datars))
 6 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 7 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
 8 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 9 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
10 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
