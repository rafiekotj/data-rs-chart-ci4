<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2025-11-02 01:25:27 --> ErrorException: Undefined variable $listJenis
[Method: GET, Route: /]
in APPPATH\Views\dashboard\dashboard.php on line 20.
 1 APPPATH\Views\dashboard\dashboard.php(20): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Undefined variable $listJenis', 'C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php', 20)
 2 SYSTEMPATH\View\View.php(226): include('C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php')
 3 SYSTEMPATH\View\View.php(229): CodeIgniter\View\View->CodeIgniter\View\{closure}()
 4 SYSTEMPATH\Common.php(1167): CodeIgniter\View\View->render('dashboard/dashboard', [], true)
 5 APPPATH\Controllers\Dashboard.php(40): view('dashboard/dashboard', [...])
 6 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Dashboard->index()
 7 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
 8 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 9 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
10 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
11 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
12 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-11-02 05:32:20 --> CodeIgniter\Database\Exceptions\DatabaseException: You must set the database table to be used with your query.
[Method: GET, Route: dashboard/getBarData]
in SYSTEMPATH\Database\BaseConnection.php on line 944.
 1 SYSTEMPATH\Model.php(713): CodeIgniter\Database\BaseConnection->table(null)
 2 SYSTEMPATH\Model.php(917): CodeIgniter\Model->builder()
 3 APPPATH\Controllers\Dashboard.php(73): CodeIgniter\Model->__call('getBarDataDefault', [])
 4 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Dashboard->getBarData()
 5 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
 6 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 7 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
 8 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 9 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
10 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-11-02 05:33:26 --> CodeIgniter\Exceptions\BadMethodCallException: Call to undefined method App\Models\ModelDashboard::getBarDataDefault
[Method: GET, Route: dashboard/getBarData]
in SYSTEMPATH\Model.php on line 927.
 1 APPPATH\Controllers\Dashboard.php(73): CodeIgniter\Model->__call('getBarDataDefault', [])
 2 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Dashboard->getBarData()
 3 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
 4 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 5 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
 6 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 7 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
 8 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-11-02 05:33:27 --> CodeIgniter\Exceptions\BadMethodCallException: Call to undefined method App\Models\ModelDashboard::getBarDataDefault
[Method: GET, Route: dashboard/getBarData]
in SYSTEMPATH\Model.php on line 927.
 1 APPPATH\Controllers\Dashboard.php(73): CodeIgniter\Model->__call('getBarDataDefault', [])
 2 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Dashboard->getBarData()
 3 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
 4 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 5 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
 6 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 7 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
 8 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-11-02 05:33:28 --> CodeIgniter\Exceptions\BadMethodCallException: Call to undefined method App\Models\ModelDashboard::getLineDataDefault
[Method: GET, Route: dashboard/getLineData]
in SYSTEMPATH\Model.php on line 927.
 1 APPPATH\Controllers\Dashboard.php(86): CodeIgniter\Model->__call('getLineDataDefault', [])
 2 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Dashboard->getLineData()
 3 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
 4 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 5 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
 6 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 7 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
 8 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-11-02 05:33:29 --> CodeIgniter\Exceptions\BadMethodCallException: Call to undefined method App\Models\ModelDashboard::getBarDataDefault
[Method: GET, Route: dashboard/getBarData]
in SYSTEMPATH\Model.php on line 927.
 1 APPPATH\Controllers\Dashboard.php(73): CodeIgniter\Model->__call('getBarDataDefault', [])
 2 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Dashboard->getBarData()
 3 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
 4 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 5 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
 6 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 7 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
 8 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-11-02 05:37:58 --> ErrorException: Undefined property: App\Controllers\Dashboard::$model
[Method: GET, Route: dashboard/getBarData]
in APPPATH\Controllers\Dashboard.php on line 74.
 1 APPPATH\Controllers\Dashboard.php(74): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Undefined property: App\\Controllers\\Dashboard::$model', 'C:\\xampp\\htdocs\\rschartsapi\\app\\Controllers\\Dashboard.php', 74)
 2 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Dashboard->getBarData()
 3 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
 4 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 5 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
 6 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 7 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
 8 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-11-02 05:39:54 --> Error: Typed property App\Controllers\Dashboard::$modelDashboard must not be accessed before initialization
[Method: GET, Route: dashboard/getBarData/jenis_rs]
in APPPATH\Controllers\Dashboard.php on line 74.
 1 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Dashboard->getBarData('jenis_rs')
 2 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
 3 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 4 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
 5 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 6 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
 7 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-11-02 11:23:53 --> ErrorException: Undefined array key "jenis_rs"
[Method: GET, Route: /]
in APPPATH\Views\dashboard\dashboard.php on line 23.
 1 APPPATH\Views\dashboard\dashboard.php(23): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Undefined array key "jenis_rs"', 'C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php', 23)
 2 SYSTEMPATH\View\View.php(226): include('C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php')
 3 SYSTEMPATH\View\View.php(229): CodeIgniter\View\View->CodeIgniter\View\{closure}()
 4 SYSTEMPATH\Common.php(1167): CodeIgniter\View\View->render('dashboard/dashboard', [], true)
 5 APPPATH\Controllers\Dashboard.php(50): view('dashboard/dashboard', [...])
 6 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Dashboard->index()
 7 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
 8 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 9 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
10 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
11 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
12 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-11-02 11:24:23 --> ErrorException: Undefined array key "jenis_rs"
[Method: GET, Route: /]
in APPPATH\Views\dashboard\dashboard.php on line 23.
 1 APPPATH\Views\dashboard\dashboard.php(23): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Undefined array key "jenis_rs"', 'C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php', 23)
 2 SYSTEMPATH\View\View.php(226): include('C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php')
 3 SYSTEMPATH\View\View.php(229): CodeIgniter\View\View->CodeIgniter\View\{closure}()
 4 SYSTEMPATH\Common.php(1167): CodeIgniter\View\View->render('dashboard/dashboard', [], true)
 5 APPPATH\Controllers\Dashboard.php(50): view('dashboard/dashboard', [...])
 6 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Dashboard->index()
 7 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
 8 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 9 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
10 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
11 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
12 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-11-02 11:29:49 --> ErrorException: Undefined array key "jenis_rs"
[Method: GET, Route: /]
in APPPATH\Views\dashboard\dashboard.php on line 23.
 1 APPPATH\Views\dashboard\dashboard.php(23): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Undefined array key "jenis_rs"', 'C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php', 23)
 2 SYSTEMPATH\View\View.php(226): include('C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php')
 3 SYSTEMPATH\View\View.php(229): CodeIgniter\View\View->CodeIgniter\View\{closure}()
 4 SYSTEMPATH\Common.php(1167): CodeIgniter\View\View->render('dashboard/dashboard', [], true)
 5 APPPATH\Controllers\Dashboard.php(50): view('dashboard/dashboard', [...])
 6 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Dashboard->index()
 7 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
 8 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 9 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
10 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
11 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
12 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-11-02 11:38:09 --> ErrorException: Undefined array key "jenis_rs"
[Method: GET, Route: /]
in APPPATH\Views\dashboard\dashboard.php on line 23.
 1 APPPATH\Views\dashboard\dashboard.php(23): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Undefined array key "jenis_rs"', 'C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php', 23)
 2 SYSTEMPATH\View\View.php(226): include('C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php')
 3 SYSTEMPATH\View\View.php(229): CodeIgniter\View\View->CodeIgniter\View\{closure}()
 4 SYSTEMPATH\Common.php(1167): CodeIgniter\View\View->render('dashboard/dashboard', [], true)
 5 APPPATH\Controllers\Dashboard.php(50): view('dashboard/dashboard', [...])
 6 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Dashboard->index()
 7 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
 8 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 9 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
10 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
11 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
12 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-11-02 11:38:15 --> ErrorException: Undefined array key "jenis_rs"
[Method: GET, Route: /]
in APPPATH\Views\dashboard\dashboard.php on line 23.
 1 APPPATH\Views\dashboard\dashboard.php(23): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Undefined array key "jenis_rs"', 'C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php', 23)
 2 SYSTEMPATH\View\View.php(226): include('C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\dashboard\\dashboard.php')
 3 SYSTEMPATH\View\View.php(229): CodeIgniter\View\View->CodeIgniter\View\{closure}()
 4 SYSTEMPATH\Common.php(1167): CodeIgniter\View\View->render('dashboard/dashboard', [], true)
 5 APPPATH\Controllers\Dashboard.php(50): view('dashboard/dashboard', [...])
 6 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Dashboard->index()
 7 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Dashboard))
 8 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 9 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
10 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
11 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
12 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
DEBUG - 2025-11-02 12:19:01 --> DEBUG getBarData row 0: keys = nama, total, total_semua
DEBUG - 2025-11-02 12:19:01 --> DEBUG getBarData row 1: keys = nama, total, total_semua
DEBUG - 2025-11-02 12:19:01 --> DEBUG getBarData row 2: keys = nama, total, total_semua
DEBUG - 2025-11-02 12:19:01 --> DEBUG getBarData row 3: keys = nama, total, total_semua
DEBUG - 2025-11-02 12:19:01 --> DEBUG getBarData row 4: keys = nama, total, total_semua
DEBUG - 2025-11-02 12:19:01 --> DEBUG getBarData row 5: keys = nama, total, total_semua
DEBUG - 2025-11-02 12:19:01 --> DEBUG getBarData row 6: keys = nama, total, total_semua
DEBUG - 2025-11-02 12:19:01 --> DEBUG getBarData row 7: keys = nama, total, total_semua
DEBUG - 2025-11-02 12:19:01 --> DEBUG getBarData row 8: keys = nama, total, total_semua
DEBUG - 2025-11-02 12:19:01 --> DEBUG getBarData row 9: keys = nama, total, total_semua
DEBUG - 2025-11-02 12:19:01 --> DEBUG getBarData row 10: keys = nama, total, total_semua
DEBUG - 2025-11-02 12:19:01 --> DEBUG getBarData row 11: keys = nama, total, total_semua
DEBUG - 2025-11-02 12:19:01 --> DEBUG getBarData row 12: keys = nama, total, total_semua
DEBUG - 2025-11-02 12:19:01 --> DEBUG getBarData row 13: keys = nama, total, total_semua
DEBUG - 2025-11-02 12:19:01 --> DEBUG getBarData row 14: keys = nama, total, total_semua
DEBUG - 2025-11-02 12:19:01 --> DEBUG getBarData row 15: keys = nama, total, total_semua
DEBUG - 2025-11-02 12:22:48 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => RS Bergerak
            [total] => 2
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => RSIA
            [total] => 320
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => RSK Bedah
            [total] => 31
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => RSK Ginjal
            [total] => 2
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => RSK GM
            [total] => 36
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => RSK Infeksi
            [total] => 2
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => RSK Jantung
            [total] => 13
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => RSK Jiwa
            [total] => 42
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => RSK Kanker
            [total] => 4
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => RSK Mata
            [total] => 40
            [total_semua] => 3266
        )

    [10] => Array
        (
            [nama] => RSK Orthopedi
            [total] => 7
            [total_semua] => 3266
        )

    [11] => Array
        (
            [nama] => RSK Otak
            [total] => 2
            [total_semua] => 3266
        )

    [12] => Array
        (
            [nama] => RSK Paru
            [total] => 9
            [total_semua] => 3266
        )

    [13] => Array
        (
            [nama] => RSK THT-KL
            [total] => 4
            [total_semua] => 3266
        )

    [14] => Array
        (
            [nama] => RSKO
            [total] => 1
            [total_semua] => 3266
        )

    [15] => Array
        (
            [nama] => RSU
            [total] => 2751
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 12:23:04 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => RS Bergerak
            [total] => 2
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => RSIA
            [total] => 320
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => RSK Bedah
            [total] => 31
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => RSK Ginjal
            [total] => 2
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => RSK GM
            [total] => 36
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => RSK Infeksi
            [total] => 2
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => RSK Jantung
            [total] => 13
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => RSK Jiwa
            [total] => 42
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => RSK Kanker
            [total] => 4
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => RSK Mata
            [total] => 40
            [total_semua] => 3266
        )

    [10] => Array
        (
            [nama] => RSK Orthopedi
            [total] => 7
            [total_semua] => 3266
        )

    [11] => Array
        (
            [nama] => RSK Otak
            [total] => 2
            [total_semua] => 3266
        )

    [12] => Array
        (
            [nama] => RSK Paru
            [total] => 9
            [total_semua] => 3266
        )

    [13] => Array
        (
            [nama] => RSK THT-KL
            [total] => 4
            [total_semua] => 3266
        )

    [14] => Array
        (
            [nama] => RSKO
            [total] => 1
            [total_semua] => 3266
        )

    [15] => Array
        (
            [nama] => RSU
            [total] => 2751
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 12:23:12 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => A
            [total] => 83
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => B
            [total] => 452
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Belum Ditetapkan
            [total] => 3
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => C
            [total] => 1781
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => D
            [total] => 870
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => D PRATAMA
            [total] => 77
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 12:23:17 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => BUMN
            [total] => 31
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => Kementerian Lain
            [total] => 50
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Kemkes
            [total] => 42
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => Pemkab
            [total] => 678
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => Pemkot
            [total] => 121
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => Pemprop
            [total] => 153
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => POLRI
            [total] => 56
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => Swasta
            [total] => 1524
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => Swasta Non Profit
            [total] => 491
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => TNI
            [total] => 120
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 12:27:28 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => RS Bergerak
            [total] => 2
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => RSIA
            [total] => 320
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => RSK Bedah
            [total] => 31
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => RSK Ginjal
            [total] => 2
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => RSK GM
            [total] => 36
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => RSK Infeksi
            [total] => 2
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => RSK Jantung
            [total] => 13
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => RSK Jiwa
            [total] => 42
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => RSK Kanker
            [total] => 4
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => RSK Mata
            [total] => 40
            [total_semua] => 3266
        )

    [10] => Array
        (
            [nama] => RSK Orthopedi
            [total] => 7
            [total_semua] => 3266
        )

    [11] => Array
        (
            [nama] => RSK Otak
            [total] => 2
            [total_semua] => 3266
        )

    [12] => Array
        (
            [nama] => RSK Paru
            [total] => 9
            [total_semua] => 3266
        )

    [13] => Array
        (
            [nama] => RSK THT-KL
            [total] => 4
            [total_semua] => 3266
        )

    [14] => Array
        (
            [nama] => RSKO
            [total] => 1
            [total_semua] => 3266
        )

    [15] => Array
        (
            [nama] => RSU
            [total] => 2751
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 12:27:29 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => A
            [total] => 83
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => B
            [total] => 452
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Belum Ditetapkan
            [total] => 3
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => C
            [total] => 1781
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => D
            [total] => 870
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => D PRATAMA
            [total] => 77
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 12:27:30 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => BUMN
            [total] => 31
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => Kementerian Lain
            [total] => 50
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Kemkes
            [total] => 42
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => Pemkab
            [total] => 678
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => Pemkot
            [total] => 121
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => Pemprop
            [total] => 153
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => POLRI
            [total] => 56
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => Swasta
            [total] => 1524
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => Swasta Non Profit
            [total] => 491
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => TNI
            [total] => 120
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 12:29:48 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => RS Bergerak
            [total] => 2
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => RSIA
            [total] => 320
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => RSK Bedah
            [total] => 31
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => RSK Ginjal
            [total] => 2
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => RSK GM
            [total] => 36
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => RSK Infeksi
            [total] => 2
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => RSK Jantung
            [total] => 13
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => RSK Jiwa
            [total] => 42
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => RSK Kanker
            [total] => 4
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => RSK Mata
            [total] => 40
            [total_semua] => 3266
        )

    [10] => Array
        (
            [nama] => RSK Orthopedi
            [total] => 7
            [total_semua] => 3266
        )

    [11] => Array
        (
            [nama] => RSK Otak
            [total] => 2
            [total_semua] => 3266
        )

    [12] => Array
        (
            [nama] => RSK Paru
            [total] => 9
            [total_semua] => 3266
        )

    [13] => Array
        (
            [nama] => RSK THT-KL
            [total] => 4
            [total_semua] => 3266
        )

    [14] => Array
        (
            [nama] => RSKO
            [total] => 1
            [total_semua] => 3266
        )

    [15] => Array
        (
            [nama] => RSU
            [total] => 2751
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 12:29:50 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => A
            [total] => 83
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => B
            [total] => 452
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Belum Ditetapkan
            [total] => 3
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => C
            [total] => 1781
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => D
            [total] => 870
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => D PRATAMA
            [total] => 77
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 12:29:52 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => BUMN
            [total] => 31
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => Kementerian Lain
            [total] => 50
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Kemkes
            [total] => 42
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => Pemkab
            [total] => 678
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => Pemkot
            [total] => 121
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => Pemprop
            [total] => 153
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => POLRI
            [total] => 56
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => Swasta
            [total] => 1524
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => Swasta Non Profit
            [total] => 491
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => TNI
            [total] => 120
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 12:30:11 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => RS Bergerak
            [total] => 2
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => RSIA
            [total] => 320
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => RSK Bedah
            [total] => 31
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => RSK Ginjal
            [total] => 2
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => RSK GM
            [total] => 36
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => RSK Infeksi
            [total] => 2
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => RSK Jantung
            [total] => 13
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => RSK Jiwa
            [total] => 42
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => RSK Kanker
            [total] => 4
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => RSK Mata
            [total] => 40
            [total_semua] => 3266
        )

    [10] => Array
        (
            [nama] => RSK Orthopedi
            [total] => 7
            [total_semua] => 3266
        )

    [11] => Array
        (
            [nama] => RSK Otak
            [total] => 2
            [total_semua] => 3266
        )

    [12] => Array
        (
            [nama] => RSK Paru
            [total] => 9
            [total_semua] => 3266
        )

    [13] => Array
        (
            [nama] => RSK THT-KL
            [total] => 4
            [total_semua] => 3266
        )

    [14] => Array
        (
            [nama] => RSKO
            [total] => 1
            [total_semua] => 3266
        )

    [15] => Array
        (
            [nama] => RSU
            [total] => 2751
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 12:38:34 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => A
            [total] => 83
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => B
            [total] => 452
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Belum Ditetapkan
            [total] => 3
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => C
            [total] => 1781
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => D
            [total] => 870
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => D PRATAMA
            [total] => 77
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 12:38:36 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => RS Bergerak
            [total] => 2
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => RSIA
            [total] => 320
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => RSK Bedah
            [total] => 31
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => RSK Ginjal
            [total] => 2
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => RSK GM
            [total] => 36
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => RSK Infeksi
            [total] => 2
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => RSK Jantung
            [total] => 13
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => RSK Jiwa
            [total] => 42
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => RSK Kanker
            [total] => 4
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => RSK Mata
            [total] => 40
            [total_semua] => 3266
        )

    [10] => Array
        (
            [nama] => RSK Orthopedi
            [total] => 7
            [total_semua] => 3266
        )

    [11] => Array
        (
            [nama] => RSK Otak
            [total] => 2
            [total_semua] => 3266
        )

    [12] => Array
        (
            [nama] => RSK Paru
            [total] => 9
            [total_semua] => 3266
        )

    [13] => Array
        (
            [nama] => RSK THT-KL
            [total] => 4
            [total_semua] => 3266
        )

    [14] => Array
        (
            [nama] => RSKO
            [total] => 1
            [total_semua] => 3266
        )

    [15] => Array
        (
            [nama] => RSU
            [total] => 2751
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 12:38:37 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => BUMN
            [total] => 31
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => Kementerian Lain
            [total] => 50
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Kemkes
            [total] => 42
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => Pemkab
            [total] => 678
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => Pemkot
            [total] => 121
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => Pemprop
            [total] => 153
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => POLRI
            [total] => 56
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => Swasta
            [total] => 1524
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => Swasta Non Profit
            [total] => 491
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => TNI
            [total] => 120
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 12:40:46 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => RS Bergerak
            [total] => 2
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => RSIA
            [total] => 320
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => RSK Bedah
            [total] => 31
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => RSK Ginjal
            [total] => 2
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => RSK GM
            [total] => 36
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => RSK Infeksi
            [total] => 2
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => RSK Jantung
            [total] => 13
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => RSK Jiwa
            [total] => 42
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => RSK Kanker
            [total] => 4
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => RSK Mata
            [total] => 40
            [total_semua] => 3266
        )

    [10] => Array
        (
            [nama] => RSK Orthopedi
            [total] => 7
            [total_semua] => 3266
        )

    [11] => Array
        (
            [nama] => RSK Otak
            [total] => 2
            [total_semua] => 3266
        )

    [12] => Array
        (
            [nama] => RSK Paru
            [total] => 9
            [total_semua] => 3266
        )

    [13] => Array
        (
            [nama] => RSK THT-KL
            [total] => 4
            [total_semua] => 3266
        )

    [14] => Array
        (
            [nama] => RSKO
            [total] => 1
            [total_semua] => 3266
        )

    [15] => Array
        (
            [nama] => RSU
            [total] => 2751
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 12:40:48 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => BUMN
            [total] => 31
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => Kementerian Lain
            [total] => 50
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Kemkes
            [total] => 42
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => Pemkab
            [total] => 678
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => Pemkot
            [total] => 121
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => Pemprop
            [total] => 153
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => POLRI
            [total] => 56
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => Swasta
            [total] => 1524
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => Swasta Non Profit
            [total] => 491
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => TNI
            [total] => 120
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 12:40:49 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => A
            [total] => 83
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => B
            [total] => 452
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Belum Ditetapkan
            [total] => 3
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => C
            [total] => 1781
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => D
            [total] => 870
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => D PRATAMA
            [total] => 77
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 12:42:16 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => RS Bergerak
            [total] => 2
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => RSIA
            [total] => 320
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => RSK Bedah
            [total] => 31
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => RSK Ginjal
            [total] => 2
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => RSK GM
            [total] => 36
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => RSK Infeksi
            [total] => 2
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => RSK Jantung
            [total] => 13
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => RSK Jiwa
            [total] => 42
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => RSK Kanker
            [total] => 4
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => RSK Mata
            [total] => 40
            [total_semua] => 3266
        )

    [10] => Array
        (
            [nama] => RSK Orthopedi
            [total] => 7
            [total_semua] => 3266
        )

    [11] => Array
        (
            [nama] => RSK Otak
            [total] => 2
            [total_semua] => 3266
        )

    [12] => Array
        (
            [nama] => RSK Paru
            [total] => 9
            [total_semua] => 3266
        )

    [13] => Array
        (
            [nama] => RSK THT-KL
            [total] => 4
            [total_semua] => 3266
        )

    [14] => Array
        (
            [nama] => RSKO
            [total] => 1
            [total_semua] => 3266
        )

    [15] => Array
        (
            [nama] => RSU
            [total] => 2751
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 12:42:19 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => A
            [total] => 83
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => B
            [total] => 452
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Belum Ditetapkan
            [total] => 3
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => C
            [total] => 1781
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => D
            [total] => 870
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => D PRATAMA
            [total] => 77
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 12:42:20 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => BUMN
            [total] => 31
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => Kementerian Lain
            [total] => 50
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Kemkes
            [total] => 42
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => Pemkab
            [total] => 678
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => Pemkot
            [total] => 121
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => Pemprop
            [total] => 153
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => POLRI
            [total] => 56
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => Swasta
            [total] => 1524
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => Swasta Non Profit
            [total] => 491
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => TNI
            [total] => 120
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 12:55:43 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => RS Bergerak
            [total] => 2
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => RSIA
            [total] => 320
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => RSK Bedah
            [total] => 31
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => RSK Ginjal
            [total] => 2
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => RSK GM
            [total] => 36
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => RSK Infeksi
            [total] => 2
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => RSK Jantung
            [total] => 13
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => RSK Jiwa
            [total] => 42
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => RSK Kanker
            [total] => 4
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => RSK Mata
            [total] => 40
            [total_semua] => 3266
        )

    [10] => Array
        (
            [nama] => RSK Orthopedi
            [total] => 7
            [total_semua] => 3266
        )

    [11] => Array
        (
            [nama] => RSK Otak
            [total] => 2
            [total_semua] => 3266
        )

    [12] => Array
        (
            [nama] => RSK Paru
            [total] => 9
            [total_semua] => 3266
        )

    [13] => Array
        (
            [nama] => RSK THT-KL
            [total] => 4
            [total_semua] => 3266
        )

    [14] => Array
        (
            [nama] => RSKO
            [total] => 1
            [total_semua] => 3266
        )

    [15] => Array
        (
            [nama] => RSU
            [total] => 2751
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 12:55:52 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => A
            [total] => 83
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => B
            [total] => 452
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Belum Ditetapkan
            [total] => 3
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => C
            [total] => 1781
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => D
            [total] => 870
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => D PRATAMA
            [total] => 77
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 12:55:57 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => BUMN
            [total] => 31
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => Kementerian Lain
            [total] => 50
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Kemkes
            [total] => 42
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => Pemkab
            [total] => 678
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => Pemkot
            [total] => 121
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => Pemprop
            [total] => 153
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => POLRI
            [total] => 56
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => Swasta
            [total] => 1524
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => Swasta Non Profit
            [total] => 491
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => TNI
            [total] => 120
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:07:43 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => RS Bergerak
            [total] => 2
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => RSIA
            [total] => 320
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => RSK Bedah
            [total] => 31
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => RSK Ginjal
            [total] => 2
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => RSK GM
            [total] => 36
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => RSK Infeksi
            [total] => 2
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => RSK Jantung
            [total] => 13
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => RSK Jiwa
            [total] => 42
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => RSK Kanker
            [total] => 4
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => RSK Mata
            [total] => 40
            [total_semua] => 3266
        )

    [10] => Array
        (
            [nama] => RSK Orthopedi
            [total] => 7
            [total_semua] => 3266
        )

    [11] => Array
        (
            [nama] => RSK Otak
            [total] => 2
            [total_semua] => 3266
        )

    [12] => Array
        (
            [nama] => RSK Paru
            [total] => 9
            [total_semua] => 3266
        )

    [13] => Array
        (
            [nama] => RSK THT-KL
            [total] => 4
            [total_semua] => 3266
        )

    [14] => Array
        (
            [nama] => RSKO
            [total] => 1
            [total_semua] => 3266
        )

    [15] => Array
        (
            [nama] => RSU
            [total] => 2751
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:07:44 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => RS Bergerak
            [total] => 2
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => RSIA
            [total] => 320
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => RSK Bedah
            [total] => 31
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => RSK Ginjal
            [total] => 2
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => RSK GM
            [total] => 36
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => RSK Infeksi
            [total] => 2
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => RSK Jantung
            [total] => 13
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => RSK Jiwa
            [total] => 42
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => RSK Kanker
            [total] => 4
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => RSK Mata
            [total] => 40
            [total_semua] => 3266
        )

    [10] => Array
        (
            [nama] => RSK Orthopedi
            [total] => 7
            [total_semua] => 3266
        )

    [11] => Array
        (
            [nama] => RSK Otak
            [total] => 2
            [total_semua] => 3266
        )

    [12] => Array
        (
            [nama] => RSK Paru
            [total] => 9
            [total_semua] => 3266
        )

    [13] => Array
        (
            [nama] => RSK THT-KL
            [total] => 4
            [total_semua] => 3266
        )

    [14] => Array
        (
            [nama] => RSKO
            [total] => 1
            [total_semua] => 3266
        )

    [15] => Array
        (
            [nama] => RSU
            [total] => 2751
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:07:46 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => BUMN
            [total] => 31
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => Kementerian Lain
            [total] => 50
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Kemkes
            [total] => 42
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => Pemkab
            [total] => 678
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => Pemkot
            [total] => 121
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => Pemprop
            [total] => 153
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => POLRI
            [total] => 56
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => Swasta
            [total] => 1524
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => Swasta Non Profit
            [total] => 491
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => TNI
            [total] => 120
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:07:47 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => A
            [total] => 83
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => B
            [total] => 452
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Belum Ditetapkan
            [total] => 3
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => C
            [total] => 1781
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => D
            [total] => 870
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => D PRATAMA
            [total] => 77
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:08:36 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => RS Bergerak
            [total] => 2
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => RSIA
            [total] => 320
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => RSK Bedah
            [total] => 31
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => RSK Ginjal
            [total] => 2
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => RSK GM
            [total] => 36
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => RSK Infeksi
            [total] => 2
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => RSK Jantung
            [total] => 13
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => RSK Jiwa
            [total] => 42
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => RSK Kanker
            [total] => 4
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => RSK Mata
            [total] => 40
            [total_semua] => 3266
        )

    [10] => Array
        (
            [nama] => RSK Orthopedi
            [total] => 7
            [total_semua] => 3266
        )

    [11] => Array
        (
            [nama] => RSK Otak
            [total] => 2
            [total_semua] => 3266
        )

    [12] => Array
        (
            [nama] => RSK Paru
            [total] => 9
            [total_semua] => 3266
        )

    [13] => Array
        (
            [nama] => RSK THT-KL
            [total] => 4
            [total_semua] => 3266
        )

    [14] => Array
        (
            [nama] => RSKO
            [total] => 1
            [total_semua] => 3266
        )

    [15] => Array
        (
            [nama] => RSU
            [total] => 2751
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:10:21 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => RS Bergerak
            [total] => 2
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => RSIA
            [total] => 320
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => RSK Bedah
            [total] => 31
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => RSK Ginjal
            [total] => 2
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => RSK GM
            [total] => 36
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => RSK Infeksi
            [total] => 2
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => RSK Jantung
            [total] => 13
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => RSK Jiwa
            [total] => 42
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => RSK Kanker
            [total] => 4
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => RSK Mata
            [total] => 40
            [total_semua] => 3266
        )

    [10] => Array
        (
            [nama] => RSK Orthopedi
            [total] => 7
            [total_semua] => 3266
        )

    [11] => Array
        (
            [nama] => RSK Otak
            [total] => 2
            [total_semua] => 3266
        )

    [12] => Array
        (
            [nama] => RSK Paru
            [total] => 9
            [total_semua] => 3266
        )

    [13] => Array
        (
            [nama] => RSK THT-KL
            [total] => 4
            [total_semua] => 3266
        )

    [14] => Array
        (
            [nama] => RSKO
            [total] => 1
            [total_semua] => 3266
        )

    [15] => Array
        (
            [nama] => RSU
            [total] => 2751
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:10:23 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => RS Bergerak
            [total] => 2
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => RSIA
            [total] => 320
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => RSK Bedah
            [total] => 31
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => RSK Ginjal
            [total] => 2
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => RSK GM
            [total] => 36
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => RSK Infeksi
            [total] => 2
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => RSK Jantung
            [total] => 13
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => RSK Jiwa
            [total] => 42
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => RSK Kanker
            [total] => 4
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => RSK Mata
            [total] => 40
            [total_semua] => 3266
        )

    [10] => Array
        (
            [nama] => RSK Orthopedi
            [total] => 7
            [total_semua] => 3266
        )

    [11] => Array
        (
            [nama] => RSK Otak
            [total] => 2
            [total_semua] => 3266
        )

    [12] => Array
        (
            [nama] => RSK Paru
            [total] => 9
            [total_semua] => 3266
        )

    [13] => Array
        (
            [nama] => RSK THT-KL
            [total] => 4
            [total_semua] => 3266
        )

    [14] => Array
        (
            [nama] => RSKO
            [total] => 1
            [total_semua] => 3266
        )

    [15] => Array
        (
            [nama] => RSU
            [total] => 2751
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:10:25 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => A
            [total] => 83
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => B
            [total] => 452
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Belum Ditetapkan
            [total] => 3
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => C
            [total] => 1781
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => D
            [total] => 870
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => D PRATAMA
            [total] => 77
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:10:27 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => BUMN
            [total] => 31
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => Kementerian Lain
            [total] => 50
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Kemkes
            [total] => 42
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => Pemkab
            [total] => 678
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => Pemkot
            [total] => 121
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => Pemprop
            [total] => 153
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => POLRI
            [total] => 56
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => Swasta
            [total] => 1524
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => Swasta Non Profit
            [total] => 491
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => TNI
            [total] => 120
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:10:51 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => RS Bergerak
            [total] => 2
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => RSIA
            [total] => 320
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => RSK Bedah
            [total] => 31
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => RSK Ginjal
            [total] => 2
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => RSK GM
            [total] => 36
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => RSK Infeksi
            [total] => 2
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => RSK Jantung
            [total] => 13
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => RSK Jiwa
            [total] => 42
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => RSK Kanker
            [total] => 4
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => RSK Mata
            [total] => 40
            [total_semua] => 3266
        )

    [10] => Array
        (
            [nama] => RSK Orthopedi
            [total] => 7
            [total_semua] => 3266
        )

    [11] => Array
        (
            [nama] => RSK Otak
            [total] => 2
            [total_semua] => 3266
        )

    [12] => Array
        (
            [nama] => RSK Paru
            [total] => 9
            [total_semua] => 3266
        )

    [13] => Array
        (
            [nama] => RSK THT-KL
            [total] => 4
            [total_semua] => 3266
        )

    [14] => Array
        (
            [nama] => RSKO
            [total] => 1
            [total_semua] => 3266
        )

    [15] => Array
        (
            [nama] => RSU
            [total] => 2751
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:10:53 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => RS Bergerak
            [total] => 2
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => RSIA
            [total] => 320
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => RSK Bedah
            [total] => 31
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => RSK Ginjal
            [total] => 2
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => RSK GM
            [total] => 36
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => RSK Infeksi
            [total] => 2
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => RSK Jantung
            [total] => 13
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => RSK Jiwa
            [total] => 42
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => RSK Kanker
            [total] => 4
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => RSK Mata
            [total] => 40
            [total_semua] => 3266
        )

    [10] => Array
        (
            [nama] => RSK Orthopedi
            [total] => 7
            [total_semua] => 3266
        )

    [11] => Array
        (
            [nama] => RSK Otak
            [total] => 2
            [total_semua] => 3266
        )

    [12] => Array
        (
            [nama] => RSK Paru
            [total] => 9
            [total_semua] => 3266
        )

    [13] => Array
        (
            [nama] => RSK THT-KL
            [total] => 4
            [total_semua] => 3266
        )

    [14] => Array
        (
            [nama] => RSKO
            [total] => 1
            [total_semua] => 3266
        )

    [15] => Array
        (
            [nama] => RSU
            [total] => 2751
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:10:54 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => A
            [total] => 83
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => B
            [total] => 452
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Belum Ditetapkan
            [total] => 3
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => C
            [total] => 1781
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => D
            [total] => 870
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => D PRATAMA
            [total] => 77
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:10:55 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => BUMN
            [total] => 31
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => Kementerian Lain
            [total] => 50
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Kemkes
            [total] => 42
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => Pemkab
            [total] => 678
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => Pemkot
            [total] => 121
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => Pemprop
            [total] => 153
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => POLRI
            [total] => 56
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => Swasta
            [total] => 1524
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => Swasta Non Profit
            [total] => 491
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => TNI
            [total] => 120
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:11:02 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => A
            [total] => 83
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => B
            [total] => 452
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Belum Ditetapkan
            [total] => 3
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => C
            [total] => 1781
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => D
            [total] => 870
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => D PRATAMA
            [total] => 77
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:11:18 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => BUMN
            [total] => 31
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => Kementerian Lain
            [total] => 50
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Kemkes
            [total] => 42
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => Pemkab
            [total] => 678
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => Pemkot
            [total] => 121
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => Pemprop
            [total] => 153
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => POLRI
            [total] => 56
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => Swasta
            [total] => 1524
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => Swasta Non Profit
            [total] => 491
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => TNI
            [total] => 120
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:11:53 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => RS Bergerak
            [total] => 2
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => RSIA
            [total] => 320
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => RSK Bedah
            [total] => 31
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => RSK Ginjal
            [total] => 2
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => RSK GM
            [total] => 36
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => RSK Infeksi
            [total] => 2
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => RSK Jantung
            [total] => 13
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => RSK Jiwa
            [total] => 42
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => RSK Kanker
            [total] => 4
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => RSK Mata
            [total] => 40
            [total_semua] => 3266
        )

    [10] => Array
        (
            [nama] => RSK Orthopedi
            [total] => 7
            [total_semua] => 3266
        )

    [11] => Array
        (
            [nama] => RSK Otak
            [total] => 2
            [total_semua] => 3266
        )

    [12] => Array
        (
            [nama] => RSK Paru
            [total] => 9
            [total_semua] => 3266
        )

    [13] => Array
        (
            [nama] => RSK THT-KL
            [total] => 4
            [total_semua] => 3266
        )

    [14] => Array
        (
            [nama] => RSKO
            [total] => 1
            [total_semua] => 3266
        )

    [15] => Array
        (
            [nama] => RSU
            [total] => 2751
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:11:54 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => A
            [total] => 83
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => B
            [total] => 452
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Belum Ditetapkan
            [total] => 3
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => C
            [total] => 1781
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => D
            [total] => 870
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => D PRATAMA
            [total] => 77
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:11:54 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => BUMN
            [total] => 31
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => Kementerian Lain
            [total] => 50
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Kemkes
            [total] => 42
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => Pemkab
            [total] => 678
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => Pemkot
            [total] => 121
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => Pemprop
            [total] => 153
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => POLRI
            [total] => 56
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => Swasta
            [total] => 1524
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => Swasta Non Profit
            [total] => 491
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => TNI
            [total] => 120
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:11:55 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => RS Bergerak
            [total] => 2
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => RSIA
            [total] => 320
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => RSK Bedah
            [total] => 31
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => RSK Ginjal
            [total] => 2
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => RSK GM
            [total] => 36
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => RSK Infeksi
            [total] => 2
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => RSK Jantung
            [total] => 13
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => RSK Jiwa
            [total] => 42
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => RSK Kanker
            [total] => 4
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => RSK Mata
            [total] => 40
            [total_semua] => 3266
        )

    [10] => Array
        (
            [nama] => RSK Orthopedi
            [total] => 7
            [total_semua] => 3266
        )

    [11] => Array
        (
            [nama] => RSK Otak
            [total] => 2
            [total_semua] => 3266
        )

    [12] => Array
        (
            [nama] => RSK Paru
            [total] => 9
            [total_semua] => 3266
        )

    [13] => Array
        (
            [nama] => RSK THT-KL
            [total] => 4
            [total_semua] => 3266
        )

    [14] => Array
        (
            [nama] => RSKO
            [total] => 1
            [total_semua] => 3266
        )

    [15] => Array
        (
            [nama] => RSU
            [total] => 2751
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:11:57 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => A
            [total] => 83
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => B
            [total] => 452
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Belum Ditetapkan
            [total] => 3
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => C
            [total] => 1781
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => D
            [total] => 870
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => D PRATAMA
            [total] => 77
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:11:58 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => BUMN
            [total] => 31
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => Kementerian Lain
            [total] => 50
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Kemkes
            [total] => 42
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => Pemkab
            [total] => 678
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => Pemkot
            [total] => 121
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => Pemprop
            [total] => 153
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => POLRI
            [total] => 56
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => Swasta
            [total] => 1524
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => Swasta Non Profit
            [total] => 491
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => TNI
            [total] => 120
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:12:52 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => A
            [total] => 83
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => B
            [total] => 452
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Belum Ditetapkan
            [total] => 3
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => C
            [total] => 1781
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => D
            [total] => 870
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => D PRATAMA
            [total] => 77
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:14:43 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => RS Bergerak
            [total] => 2
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => RSIA
            [total] => 320
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => RSK Bedah
            [total] => 31
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => RSK Ginjal
            [total] => 2
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => RSK GM
            [total] => 36
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => RSK Infeksi
            [total] => 2
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => RSK Jantung
            [total] => 13
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => RSK Jiwa
            [total] => 42
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => RSK Kanker
            [total] => 4
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => RSK Mata
            [total] => 40
            [total_semua] => 3266
        )

    [10] => Array
        (
            [nama] => RSK Orthopedi
            [total] => 7
            [total_semua] => 3266
        )

    [11] => Array
        (
            [nama] => RSK Otak
            [total] => 2
            [total_semua] => 3266
        )

    [12] => Array
        (
            [nama] => RSK Paru
            [total] => 9
            [total_semua] => 3266
        )

    [13] => Array
        (
            [nama] => RSK THT-KL
            [total] => 4
            [total_semua] => 3266
        )

    [14] => Array
        (
            [nama] => RSKO
            [total] => 1
            [total_semua] => 3266
        )

    [15] => Array
        (
            [nama] => RSU
            [total] => 2751
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:14:43 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => A
            [total] => 83
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => B
            [total] => 452
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Belum Ditetapkan
            [total] => 3
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => C
            [total] => 1781
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => D
            [total] => 870
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => D PRATAMA
            [total] => 77
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:14:44 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => BUMN
            [total] => 31
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => Kementerian Lain
            [total] => 50
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Kemkes
            [total] => 42
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => Pemkab
            [total] => 678
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => Pemkot
            [total] => 121
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => Pemprop
            [total] => 153
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => POLRI
            [total] => 56
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => Swasta
            [total] => 1524
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => Swasta Non Profit
            [total] => 491
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => TNI
            [total] => 120
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:14:45 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => RS Bergerak
            [total] => 2
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => RSIA
            [total] => 320
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => RSK Bedah
            [total] => 31
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => RSK Ginjal
            [total] => 2
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => RSK GM
            [total] => 36
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => RSK Infeksi
            [total] => 2
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => RSK Jantung
            [total] => 13
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => RSK Jiwa
            [total] => 42
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => RSK Kanker
            [total] => 4
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => RSK Mata
            [total] => 40
            [total_semua] => 3266
        )

    [10] => Array
        (
            [nama] => RSK Orthopedi
            [total] => 7
            [total_semua] => 3266
        )

    [11] => Array
        (
            [nama] => RSK Otak
            [total] => 2
            [total_semua] => 3266
        )

    [12] => Array
        (
            [nama] => RSK Paru
            [total] => 9
            [total_semua] => 3266
        )

    [13] => Array
        (
            [nama] => RSK THT-KL
            [total] => 4
            [total_semua] => 3266
        )

    [14] => Array
        (
            [nama] => RSKO
            [total] => 1
            [total_semua] => 3266
        )

    [15] => Array
        (
            [nama] => RSU
            [total] => 2751
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:14:47 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => A
            [total] => 83
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => B
            [total] => 452
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Belum Ditetapkan
            [total] => 3
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => C
            [total] => 1781
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => D
            [total] => 870
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => D PRATAMA
            [total] => 77
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:14:48 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => BUMN
            [total] => 31
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => Kementerian Lain
            [total] => 50
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Kemkes
            [total] => 42
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => Pemkab
            [total] => 678
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => Pemkot
            [total] => 121
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => Pemprop
            [total] => 153
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => POLRI
            [total] => 56
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => Swasta
            [total] => 1524
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => Swasta Non Profit
            [total] => 491
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => TNI
            [total] => 120
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:14:54 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => A
            [total] => 83
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => B
            [total] => 452
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Belum Ditetapkan
            [total] => 3
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => C
            [total] => 1781
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => D
            [total] => 870
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => D PRATAMA
            [total] => 77
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:14:54 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => RS Bergerak
            [total] => 2
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => RSIA
            [total] => 320
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => RSK Bedah
            [total] => 31
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => RSK Ginjal
            [total] => 2
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => RSK GM
            [total] => 36
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => RSK Infeksi
            [total] => 2
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => RSK Jantung
            [total] => 13
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => RSK Jiwa
            [total] => 42
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => RSK Kanker
            [total] => 4
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => RSK Mata
            [total] => 40
            [total_semua] => 3266
        )

    [10] => Array
        (
            [nama] => RSK Orthopedi
            [total] => 7
            [total_semua] => 3266
        )

    [11] => Array
        (
            [nama] => RSK Otak
            [total] => 2
            [total_semua] => 3266
        )

    [12] => Array
        (
            [nama] => RSK Paru
            [total] => 9
            [total_semua] => 3266
        )

    [13] => Array
        (
            [nama] => RSK THT-KL
            [total] => 4
            [total_semua] => 3266
        )

    [14] => Array
        (
            [nama] => RSKO
            [total] => 1
            [total_semua] => 3266
        )

    [15] => Array
        (
            [nama] => RSU
            [total] => 2751
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:14:55 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => BUMN
            [total] => 31
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => Kementerian Lain
            [total] => 50
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Kemkes
            [total] => 42
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => Pemkab
            [total] => 678
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => Pemkot
            [total] => 121
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => Pemprop
            [total] => 153
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => POLRI
            [total] => 56
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => Swasta
            [total] => 1524
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => Swasta Non Profit
            [total] => 491
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => TNI
            [total] => 120
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:14:56 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => RS Bergerak
            [total] => 2
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => RSIA
            [total] => 320
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => RSK Bedah
            [total] => 31
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => RSK Ginjal
            [total] => 2
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => RSK GM
            [total] => 36
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => RSK Infeksi
            [total] => 2
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => RSK Jantung
            [total] => 13
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => RSK Jiwa
            [total] => 42
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => RSK Kanker
            [total] => 4
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => RSK Mata
            [total] => 40
            [total_semua] => 3266
        )

    [10] => Array
        (
            [nama] => RSK Orthopedi
            [total] => 7
            [total_semua] => 3266
        )

    [11] => Array
        (
            [nama] => RSK Otak
            [total] => 2
            [total_semua] => 3266
        )

    [12] => Array
        (
            [nama] => RSK Paru
            [total] => 9
            [total_semua] => 3266
        )

    [13] => Array
        (
            [nama] => RSK THT-KL
            [total] => 4
            [total_semua] => 3266
        )

    [14] => Array
        (
            [nama] => RSKO
            [total] => 1
            [total_semua] => 3266
        )

    [15] => Array
        (
            [nama] => RSU
            [total] => 2751
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:14:57 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => A
            [total] => 83
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => B
            [total] => 452
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Belum Ditetapkan
            [total] => 3
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => C
            [total] => 1781
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => D
            [total] => 870
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => D PRATAMA
            [total] => 77
            [total_semua] => 3266
        )

)

DEBUG - 2025-11-02 13:14:58 --> getBarData raw data: Array
(
    [0] => Array
        (
            [nama] => BUMN
            [total] => 31
            [total_semua] => 3266
        )

    [1] => Array
        (
            [nama] => Kementerian Lain
            [total] => 50
            [total_semua] => 3266
        )

    [2] => Array
        (
            [nama] => Kemkes
            [total] => 42
            [total_semua] => 3266
        )

    [3] => Array
        (
            [nama] => Pemkab
            [total] => 678
            [total_semua] => 3266
        )

    [4] => Array
        (
            [nama] => Pemkot
            [total] => 121
            [total_semua] => 3266
        )

    [5] => Array
        (
            [nama] => Pemprop
            [total] => 153
            [total_semua] => 3266
        )

    [6] => Array
        (
            [nama] => POLRI
            [total] => 56
            [total_semua] => 3266
        )

    [7] => Array
        (
            [nama] => Swasta
            [total] => 1524
            [total_semua] => 3266
        )

    [8] => Array
        (
            [nama] => Swasta Non Profit
            [total] => 491
            [total_semua] => 3266
        )

    [9] => Array
        (
            [nama] => TNI
            [total] => 120
            [total_semua] => 3266
        )

)

