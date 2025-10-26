<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

ERROR - 2025-10-23 03:52:48 --> RPC get_unique_kategori failed (404)
ERROR - 2025-10-23 03:54:18 --> RPC get_unique_kategori failed (404)
ERROR - 2025-10-23 03:54:47 --> RPC get_unique_kategori failed (404)
ERROR - 2025-10-23 03:56:23 --> RPC get_unique_kategori failed (404)
ERROR - 2025-10-23 04:01:17 --> RPC get_unique_kategori failed (404)
ERROR - 2025-10-23 04:12:44 --> RPC get_unique_kategori failed (404)
ERROR - 2025-10-23 07:48:51 --> Error connecting to the database: mysqli_sql_exception: No connection could be made because the target machine actively refused it in C:\xampp\htdocs\rschartsapi\system\Database\MySQLi\Connection.php:201
Stack trace:
#0 C:\xampp\htdocs\rschartsapi\system\Database\MySQLi\Connection.php(201): mysqli->real_connect('localhost', 'root', Object(SensitiveParameterValue), 'ci4', 3306, '', 0)
#1 C:\xampp\htdocs\rschartsapi\system\Database\BaseConnection.php(419): CodeIgniter\Database\MySQLi\Connection->connect(false)
#2 C:\xampp\htdocs\rschartsapi\system\Database\BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
#3 C:\xampp\htdocs\rschartsapi\system\Database\BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT DISTINCT...', Array, false)
#4 C:\xampp\htdocs\rschartsapi\app\Models\ModelDashboard.php(232): CodeIgniter\Database\BaseBuilder->get()
#5 C:\xampp\htdocs\rschartsapi\app\Controllers\Dashboard.php(174): App\Models\ModelDashboard->getDistinctValues('jenis_rs')
#6 C:\xampp\htdocs\rschartsapi\system\CodeIgniter.php(933): App\Controllers\Dashboard->getListJenis()
#7 C:\xampp\htdocs\rschartsapi\system\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
#8 C:\xampp\htdocs\rschartsapi\system\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#9 C:\xampp\htdocs\rschartsapi\system\Boot.php(363): CodeIgniter\CodeIgniter->run()
#10 C:\xampp\htdocs\rschartsapi\system\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
#11 C:\xampp\htdocs\rschartsapi\public\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
#12 C:\xampp\htdocs\rschartsapi\system\rewrite.php(44): require_once('C:\\xampp\\htdocs...')
#13 {main}

Next CodeIgniter\Database\Exceptions\DatabaseException: No connection could be made because the target machine actively refused it in C:\xampp\htdocs\rschartsapi\system\Database\MySQLi\Connection.php:246
Stack trace:
#0 C:\xampp\htdocs\rschartsapi\system\Database\BaseConnection.php(419): CodeIgniter\Database\MySQLi\Connection->connect(false)
#1 C:\xampp\htdocs\rschartsapi\system\Database\BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
#2 C:\xampp\htdocs\rschartsapi\system\Database\BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT DISTINCT...', Array, false)
#3 C:\xampp\htdocs\rschartsapi\app\Models\ModelDashboard.php(232): CodeIgniter\Database\BaseBuilder->get()
#4 C:\xampp\htdocs\rschartsapi\app\Controllers\Dashboard.php(174): App\Models\ModelDashboard->getDistinctValues('jenis_rs')
#5 C:\xampp\htdocs\rschartsapi\system\CodeIgniter.php(933): App\Controllers\Dashboard->getListJenis()
#6 C:\xampp\htdocs\rschartsapi\system\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
#7 C:\xampp\htdocs\rschartsapi\system\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 C:\xampp\htdocs\rschartsapi\system\Boot.php(363): CodeIgniter\CodeIgniter->run()
#9 C:\xampp\htdocs\rschartsapi\system\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
#10 C:\xampp\htdocs\rschartsapi\public\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
#11 C:\xampp\htdocs\rschartsapi\system\rewrite.php(44): require_once('C:\\xampp\\htdocs...')
#12 {main}
CRITICAL - 2025-10-23 07:48:51 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: No connection could be made because the target machine actively refused it
[Method: GET, Route: dashboard/getListJenis]
in SYSTEMPATH\Database\BaseConnection.php on line 465.
 1 SYSTEMPATH\Database\BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH\Database\BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT DISTINCT `jenis_rs` as `nama`
FROM `data_rs`
ORDER BY `jenis_rs` ASC', [], false)
 3 APPPATH\Models\ModelDashboard.php(232): CodeIgniter\Database\BaseBuilder->get()
 4 APPPATH\Controllers\Dashboard.php(174): App\Models\ModelDashboard->getDistinctValues('jenis_rs')
 5 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Dashboard->getListJenis()
 6 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
 7 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 8 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
 9 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
10 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
11 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
ERROR - 2025-10-23 07:49:12 --> Error connecting to the database: mysqli_sql_exception: No connection could be made because the target machine actively refused it in C:\xampp\htdocs\rschartsapi\system\Database\MySQLi\Connection.php:201
Stack trace:
#0 C:\xampp\htdocs\rschartsapi\system\Database\MySQLi\Connection.php(201): mysqli->real_connect('localhost', 'root', Object(SensitiveParameterValue), 'ci4', 3306, '', 0)
#1 C:\xampp\htdocs\rschartsapi\system\Database\BaseConnection.php(419): CodeIgniter\Database\MySQLi\Connection->connect(false)
#2 C:\xampp\htdocs\rschartsapi\system\Database\BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
#3 C:\xampp\htdocs\rschartsapi\system\Database\BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT DISTINCT...', Array, false)
#4 C:\xampp\htdocs\rschartsapi\app\Models\ModelDashboard.php(232): CodeIgniter\Database\BaseBuilder->get()
#5 C:\xampp\htdocs\rschartsapi\app\Controllers\Dashboard.php(174): App\Models\ModelDashboard->getDistinctValues('jenis_rs')
#6 C:\xampp\htdocs\rschartsapi\system\CodeIgniter.php(933): App\Controllers\Dashboard->getListJenis()
#7 C:\xampp\htdocs\rschartsapi\system\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
#8 C:\xampp\htdocs\rschartsapi\system\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#9 C:\xampp\htdocs\rschartsapi\system\Boot.php(363): CodeIgniter\CodeIgniter->run()
#10 C:\xampp\htdocs\rschartsapi\system\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
#11 C:\xampp\htdocs\rschartsapi\public\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
#12 C:\xampp\htdocs\rschartsapi\system\rewrite.php(44): require_once('C:\\xampp\\htdocs...')
#13 {main}

Next CodeIgniter\Database\Exceptions\DatabaseException: No connection could be made because the target machine actively refused it in C:\xampp\htdocs\rschartsapi\system\Database\MySQLi\Connection.php:246
Stack trace:
#0 C:\xampp\htdocs\rschartsapi\system\Database\BaseConnection.php(419): CodeIgniter\Database\MySQLi\Connection->connect(false)
#1 C:\xampp\htdocs\rschartsapi\system\Database\BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
#2 C:\xampp\htdocs\rschartsapi\system\Database\BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT DISTINCT...', Array, false)
#3 C:\xampp\htdocs\rschartsapi\app\Models\ModelDashboard.php(232): CodeIgniter\Database\BaseBuilder->get()
#4 C:\xampp\htdocs\rschartsapi\app\Controllers\Dashboard.php(174): App\Models\ModelDashboard->getDistinctValues('jenis_rs')
#5 C:\xampp\htdocs\rschartsapi\system\CodeIgniter.php(933): App\Controllers\Dashboard->getListJenis()
#6 C:\xampp\htdocs\rschartsapi\system\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
#7 C:\xampp\htdocs\rschartsapi\system\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 C:\xampp\htdocs\rschartsapi\system\Boot.php(363): CodeIgniter\CodeIgniter->run()
#9 C:\xampp\htdocs\rschartsapi\system\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
#10 C:\xampp\htdocs\rschartsapi\public\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
#11 C:\xampp\htdocs\rschartsapi\system\rewrite.php(44): require_once('C:\\xampp\\htdocs...')
#12 {main}
CRITICAL - 2025-10-23 07:49:12 --> CodeIgniter\Database\Exceptions\DatabaseException: Unable to connect to the database.
Main connection [MySQLi]: No connection could be made because the target machine actively refused it
[Method: GET, Route: dashboard/getListJenis]
in SYSTEMPATH\Database\BaseConnection.php on line 465.
 1 SYSTEMPATH\Database\BaseConnection.php(614): CodeIgniter\Database\BaseConnection->initialize()
 2 SYSTEMPATH\Database\BaseBuilder.php(1649): CodeIgniter\Database\BaseConnection->query('SELECT DISTINCT `jenis_rs` as `nama`
FROM `data_rs`
ORDER BY `jenis_rs` ASC', [], false)
 3 APPPATH\Models\ModelDashboard.php(232): CodeIgniter\Database\BaseBuilder->get()
 4 APPPATH\Controllers\Dashboard.php(174): App\Models\ModelDashboard->getDistinctValues('jenis_rs')
 5 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Dashboard->getListJenis()
 6 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
 7 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 8 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
 9 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
10 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
11 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-10-23 12:33:07 --> ErrorException: Undefined array key "provinsi"
[Method: GET, Route: /]
in APPPATH\Views\dashboard\dashboard.php on line 34.
 1 APPPATH\Views\dashboard\dashboard.php(34): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Undefined array key "provinsi"', 'C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php', 34)
 2 SYSTEMPATH\View\View.php(226): include('C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php')
 3 SYSTEMPATH\View\View.php(229): CodeIgniter\View\View->CodeIgniter\View\{closure}()
 4 SYSTEMPATH\Common.php(1167): CodeIgniter\View\View->render('dashboard/dashboard', [], true)
 5 APPPATH\Controllers\Dashboard.php(43): view('dashboard/dashboard', [...])
 6 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Dashboard->index()
 7 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
 8 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 9 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
10 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
11 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
12 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-10-23 12:34:38 --> ErrorException: Undefined array key "provinsi"
[Method: GET, Route: /]
in APPPATH\Views\dashboard\dashboard.php on line 34.
 1 APPPATH\Views\dashboard\dashboard.php(34): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Undefined array key "provinsi"', 'C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php', 34)
 2 SYSTEMPATH\View\View.php(226): include('C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php')
 3 SYSTEMPATH\View\View.php(229): CodeIgniter\View\View->CodeIgniter\View\{closure}()
 4 SYSTEMPATH\Common.php(1167): CodeIgniter\View\View->render('dashboard/dashboard', [], true)
 5 APPPATH\Controllers\Dashboard.php(43): view('dashboard/dashboard', [...])
 6 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Dashboard->index()
 7 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
 8 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 9 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
10 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
11 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
12 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-10-23 12:36:09 --> ErrorException: Undefined array key "provinsi"
[Method: GET, Route: /]
in APPPATH\Views\dashboard\dashboard.php on line 34.
 1 APPPATH\Views\dashboard\dashboard.php(34): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Undefined array key "provinsi"', 'C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php', 34)
 2 SYSTEMPATH\View\View.php(226): include('C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php')
 3 SYSTEMPATH\View\View.php(229): CodeIgniter\View\View->CodeIgniter\View\{closure}()
 4 SYSTEMPATH\Common.php(1167): CodeIgniter\View\View->render('dashboard/dashboard', [], true)
 5 APPPATH\Controllers\Dashboard.php(43): view('dashboard/dashboard', [...])
 6 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Dashboard->index()
 7 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
 8 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 9 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
10 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
11 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
12 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-10-23 12:38:59 --> ErrorException: Undefined array key "provinsi"
[Method: GET, Route: /]
in APPPATH\Views\dashboard\dashboard.php on line 34.
 1 APPPATH\Views\dashboard\dashboard.php(34): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Undefined array key "provinsi"', 'C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php', 34)
 2 SYSTEMPATH\View\View.php(226): include('C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php')
 3 SYSTEMPATH\View\View.php(229): CodeIgniter\View\View->CodeIgniter\View\{closure}()
 4 SYSTEMPATH\Common.php(1167): CodeIgniter\View\View->render('dashboard/dashboard', [], true)
 5 APPPATH\Controllers\Dashboard.php(43): view('dashboard/dashboard', [...])
 6 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Dashboard->index()
 7 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
 8 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 9 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
10 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
11 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
12 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-10-23 12:39:03 --> ErrorException: Undefined array key "provinsi"
[Method: GET, Route: /]
in APPPATH\Views\dashboard\dashboard.php on line 34.
 1 APPPATH\Views\dashboard\dashboard.php(34): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Undefined array key "provinsi"', 'C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php', 34)
 2 SYSTEMPATH\View\View.php(226): include('C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php')
 3 SYSTEMPATH\View\View.php(229): CodeIgniter\View\View->CodeIgniter\View\{closure}()
 4 SYSTEMPATH\Common.php(1167): CodeIgniter\View\View->render('dashboard/dashboard', [], true)
 5 APPPATH\Controllers\Dashboard.php(43): view('dashboard/dashboard', [...])
 6 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Dashboard->index()
 7 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
 8 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 9 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
10 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
11 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
12 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-10-23 12:47:24 --> ErrorException: Undefined array key "kabupaten_kota"
[Method: GET, Route: /]
in APPPATH\Views\dashboard\dashboard.php on line 47.
 1 APPPATH\Views\dashboard\dashboard.php(47): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Undefined array key "kabupaten_kota"', 'C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php', 47)
 2 SYSTEMPATH\View\View.php(226): include('C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php')
 3 SYSTEMPATH\View\View.php(229): CodeIgniter\View\View->CodeIgniter\View\{closure}()
 4 SYSTEMPATH\Common.php(1167): CodeIgniter\View\View->render('dashboard/dashboard', [], true)
 5 APPPATH\Controllers\Dashboard.php(43): view('dashboard/dashboard', [...])
 6 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Dashboard->index()
 7 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
 8 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 9 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
10 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
11 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
12 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-10-23 12:50:17 --> ErrorException: Undefined array key "kabupaten_kota"
[Method: GET, Route: /]
in APPPATH\Views\dashboard\dashboard.php on line 47.
 1 APPPATH\Views\dashboard\dashboard.php(47): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Undefined array key "kabupaten_kota"', 'C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php', 47)
 2 SYSTEMPATH\View\View.php(226): include('C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php')
 3 SYSTEMPATH\View\View.php(229): CodeIgniter\View\View->CodeIgniter\View\{closure}()
 4 SYSTEMPATH\Common.php(1167): CodeIgniter\View\View->render('dashboard/dashboard', [], true)
 5 APPPATH\Controllers\Dashboard.php(43): view('dashboard/dashboard', [...])
 6 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Dashboard->index()
 7 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
 8 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 9 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
10 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
11 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
12 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-10-23 12:53:13 --> ErrorException: Undefined array key "provinsi"
[Method: GET, Route: /]
in APPPATH\Views\dashboard\dashboard.php on line 34.
 1 APPPATH\Views\dashboard\dashboard.php(34): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Undefined array key "provinsi"', 'C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php', 34)
 2 SYSTEMPATH\View\View.php(226): include('C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php')
 3 SYSTEMPATH\View\View.php(229): CodeIgniter\View\View->CodeIgniter\View\{closure}()
 4 SYSTEMPATH\Common.php(1167): CodeIgniter\View\View->render('dashboard/dashboard', [], true)
 5 APPPATH\Controllers\Dashboard.php(43): view('dashboard/dashboard', [...])
 6 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Dashboard->index()
 7 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
 8 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 9 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
10 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
11 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
12 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-10-23 13:10:07 --> ErrorException: Undefined array key "provinsi"
[Method: GET, Route: /]
in APPPATH\Views\dashboard\dashboard.php on line 34.
 1 APPPATH\Views\dashboard\dashboard.php(34): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Undefined array key "provinsi"', 'C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php', 34)
 2 SYSTEMPATH\View\View.php(226): include('C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php')
 3 SYSTEMPATH\View\View.php(229): CodeIgniter\View\View->CodeIgniter\View\{closure}()
 4 SYSTEMPATH\Common.php(1167): CodeIgniter\View\View->render('dashboard/dashboard', [], true)
 5 APPPATH\Controllers\Dashboard.php(79): view('dashboard/dashboard', [...])
 6 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Dashboard->index()
 7 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
 8 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 9 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
10 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
11 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
12 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-10-23 13:15:29 --> ErrorException: Undefined array key "provinsi"
[Method: GET, Route: /]
in APPPATH\Views\dashboard\dashboard.php on line 34.
 1 APPPATH\Views\dashboard\dashboard.php(34): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Undefined array key "provinsi"', 'C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php', 34)
 2 SYSTEMPATH\View\View.php(226): include('C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php')
 3 SYSTEMPATH\View\View.php(229): CodeIgniter\View\View->CodeIgniter\View\{closure}()
 4 SYSTEMPATH\Common.php(1167): CodeIgniter\View\View->render('dashboard/dashboard', [], true)
 5 APPPATH\Controllers\Dashboard.php(43): view('dashboard/dashboard', [...])
 6 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Dashboard->index()
 7 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
 8 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 9 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
10 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
11 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
12 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-10-23 13:18:52 --> CodeIgniter\View\Exceptions\ViewException: Invalid file: "errors/html/error_general.php"
[Method: GET, Route: /]
in SYSTEMPATH\Exceptions\FrameworkException.php on line 39.
 1 SYSTEMPATH\View\View.php(214): CodeIgniter\Exceptions\FrameworkException::forInvalidFile('errors/html/error_general.php')
 2 SYSTEMPATH\Common.php(1167): CodeIgniter\View\View->render('errors/html/error_general', [], true)
 3 APPPATH\Controllers\Dashboard.php(60): view('errors/html/error_general', [...])
 4 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Dashboard->index()
 5 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
 6 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 7 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
 8 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 9 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
10 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-10-23 13:19:01 --> CodeIgniter\View\Exceptions\ViewException: Invalid file: "errors/html/error_general.php"
[Method: GET, Route: /]
in SYSTEMPATH\Exceptions\FrameworkException.php on line 39.
 1 SYSTEMPATH\View\View.php(214): CodeIgniter\Exceptions\FrameworkException::forInvalidFile('errors/html/error_general.php')
 2 SYSTEMPATH\Common.php(1167): CodeIgniter\View\View->render('errors/html/error_general', [], true)
 3 APPPATH\Controllers\Dashboard.php(60): view('errors/html/error_general', [...])
 4 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Dashboard->index()
 5 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
 6 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 7 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
 8 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 9 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
10 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
