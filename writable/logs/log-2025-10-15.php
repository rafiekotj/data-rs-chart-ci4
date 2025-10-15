DEBUG - 2025-10-15 02:58:58 --> [Datars] total dari getUniqueLatestRS: 1000
DEBUG - 2025-10-15 02:58:58 --> [Datars] sample rows: [{"id":755,"tahun":2025,"rumah_sakit":"Altius Hospitals","jenis_rs":"RSU","kelas_rs":"C","alamat":"Jl. Harapan Indah Boulevard Sektor V Desa\/Kelurahan Pusaka Rakyat Kec. Tarumajaya","kabupaten_kota":"Bekasi","provinsi":"Jawa Barat","penyelenggara_grup":"Swasta","penyelenggara_kategori":"RS Privat"},{"id":4002,"tahun":2024,"rumah_sakit":"Altius Hospitals ","jenis_rs":"RSU","kelas_rs":"C","alamat":"Jl. Harapan Indah Boulevard Sektor V Desa\/Kelurahan Pusaka Rakyat Kec. Tarumajaya","kabupaten_kota":"Bekasi","provinsi":"Jawa Barat","penyelenggara_grup":"Kementerian Lain","penyelenggara_kategori":"RS Publik"},{"id":1418,"tahun":2025,"rumah_sakit":"At-Tin Hospital","jenis_rs":"RSU","kelas_rs":"C","alamat":"Jl. Slamet Riyadi No. 14 Tegalrejo, Bawen, Kab. Semarang","kabupaten_kota":"Semarang","provinsi":"Jawa Tengah","penyelenggara_grup":"Swasta","penyelenggara_kategori":"RS Privat"}]
ERROR - 2025-10-15 03:12:12 --> RPC get_rs_unique_latest_page failed (0): 
CRITICAL - 2025-10-15 03:18:16 --> CodeIgniter\Database\Exceptions\DatabaseException: You must set the database table to be used with your query.
[Method: GET, Route: datars]
in SYSTEMPATH\Database\BaseConnection.php on line 944.
 1 SYSTEMPATH\Model.php(713): CodeIgniter\Database\BaseConnection->table(null)
 2 SYSTEMPATH\Model.php(917): CodeIgniter\Model->builder()
 3 APPPATH\Controllers\Datars.php(22): CodeIgniter\Model->__call('getUniqueLatestPage', [...])
 4 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Datars->index()
 5 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Datars))
 6 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 7 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
 8 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 9 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
10 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-10-15 03:19:44 --> CodeIgniter\Database\Exceptions\DatabaseException: You must set the database table to be used with your query.
[Method: GET, Route: datars]
in SYSTEMPATH\Database\BaseConnection.php on line 944.
 1 SYSTEMPATH\Model.php(713): CodeIgniter\Database\BaseConnection->table(null)
 2 SYSTEMPATH\Model.php(917): CodeIgniter\Model->builder()
 3 APPPATH\Controllers\Datars.php(22): CodeIgniter\Model->__call('getUniqueLatestPage', [...])
 4 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Datars->index()
 5 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Datars))
 6 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 7 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
 8 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 9 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
10 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-10-15 03:19:46 --> CodeIgniter\Database\Exceptions\DatabaseException: You must set the database table to be used with your query.
[Method: GET, Route: datars]
in SYSTEMPATH\Database\BaseConnection.php on line 944.
 1 SYSTEMPATH\Model.php(713): CodeIgniter\Database\BaseConnection->table(null)
 2 SYSTEMPATH\Model.php(917): CodeIgniter\Model->builder()
 3 APPPATH\Controllers\Datars.php(22): CodeIgniter\Model->__call('getUniqueLatestPage', [...])
 4 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Datars->index()
 5 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Datars))
 6 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 7 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
 8 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 9 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
10 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-10-15 03:19:49 --> CodeIgniter\Database\Exceptions\DatabaseException: You must set the database table to be used with your query.
[Method: GET, Route: datars]
in SYSTEMPATH\Database\BaseConnection.php on line 944.
 1 SYSTEMPATH\Model.php(713): CodeIgniter\Database\BaseConnection->table(null)
 2 SYSTEMPATH\Model.php(917): CodeIgniter\Model->builder()
 3 APPPATH\Controllers\Datars.php(22): CodeIgniter\Model->__call('getUniqueLatestPage', [...])
 4 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Datars->index()
 5 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Datars))
 6 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 7 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
 8 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 9 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
10 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-10-15 03:20:22 --> CodeIgniter\Database\Exceptions\DatabaseException: You must set the database table to be used with your query.
[Method: GET, Route: datars]
in SYSTEMPATH\Database\BaseConnection.php on line 944.
 1 SYSTEMPATH\Model.php(713): CodeIgniter\Database\BaseConnection->table(null)
 2 SYSTEMPATH\Model.php(917): CodeIgniter\Model->builder()
 3 APPPATH\Controllers\Datars.php(22): CodeIgniter\Model->__call('getUniqueLatestPage', [...])
 4 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Datars->index()
 5 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Datars))
 6 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 7 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
 8 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 9 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
10 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-10-15 03:21:46 --> CodeIgniter\Database\Exceptions\DatabaseException: You must set the database table to be used with your query.
[Method: GET, Route: datars]
in SYSTEMPATH\Database\BaseConnection.php on line 944.
 1 SYSTEMPATH\Model.php(713): CodeIgniter\Database\BaseConnection->table(null)
 2 SYSTEMPATH\Model.php(917): CodeIgniter\Model->builder()
 3 APPPATH\Controllers\Datars.php(22): CodeIgniter\Model->__call('getUniqueLatestPage', [...])
 4 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Datars->index()
 5 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Datars))
 6 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 7 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
 8 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 9 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
10 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-10-15 03:21:50 --> CodeIgniter\Database\Exceptions\DatabaseException: You must set the database table to be used with your query.
[Method: GET, Route: datars]
in SYSTEMPATH\Database\BaseConnection.php on line 944.
 1 SYSTEMPATH\Model.php(713): CodeIgniter\Database\BaseConnection->table(null)
 2 SYSTEMPATH\Model.php(917): CodeIgniter\Model->builder()
 3 APPPATH\Controllers\Datars.php(22): CodeIgniter\Model->__call('getUniqueLatestPage', [...])
 4 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Datars->index()
 5 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Datars))
 6 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 7 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
 8 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 9 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
10 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
ERROR - 2025-10-15 03:24:00 --> RPC get_rs_unique_latest_page failed (0): 
ERROR - 2025-10-15 03:24:00 --> RPC get_rs_unique_latest_count failed (0): 
CRITICAL - 2025-10-15 03:27:44 --> ErrorException: Undefined variable $totalData
[Method: GET, Route: datars]
in APPPATH\Views\data\datars.php on line 60.
 1 APPPATH\Views\data\datars.php(60): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Undefined variable $totalData', 'C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\data\\datars.php', 60)
 2 SYSTEMPATH\View\View.php(226): include('C:\\xampp\\htdocs\\rschartsapi\\app\\Views\\data\\datars.php')
 3 SYSTEMPATH\View\View.php(229): CodeIgniter\View\View->CodeIgniter\View\{closure}()
 4 SYSTEMPATH\Common.php(1167): CodeIgniter\View\View->render('data/datars', [], true)
 5 APPPATH\Controllers\Datars.php(38): view('data/datars', [...])
 6 SYSTEMPATH\CodeIgniter.php(933): App\Controllers\Datars->index()
 7 SYSTEMPATH\CodeIgniter.php(507): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Datars))
 8 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 9 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
10 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
11 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
12 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
ERROR - 2025-10-15 03:40:17 --> RPC get_rs_unique_latest_page failed (0): 
ERROR - 2025-10-15 03:40:17 --> RPC get_rs_unique_latest_count failed (0): 
ERROR - 2025-10-15 03:40:33 --> RPC get_rs_unique_latest_page failed (0): 
ERROR - 2025-10-15 03:40:44 --> RPC get_rs_unique_latest_count failed (0): 
ERROR - 2025-10-15 03:40:44 --> RPC get_rs_unique_latest_page failed (0): 
ERROR - 2025-10-15 03:40:44 --> RPC get_rs_unique_latest_count failed (0): 
ERROR - 2025-10-15 03:40:56 --> RPC get_rs_unique_latest_page failed (0): 
ERROR - 2025-10-15 03:40:56 --> RPC get_rs_unique_latest_count failed (0): 
ERROR - 2025-10-15 03:43:02 --> RPC get_rs_unique_latest_page failed (0): 
ERROR - 2025-10-15 03:43:02 --> RPC get_rs_unique_latest_count failed (0): 
DEBUG - 2025-10-15 03:43:50 --> PAGE: 1, PER PAGE: 100
DEBUG - 2025-10-15 03:43:50 --> DATA COUNT: 100
DEBUG - 2025-10-15 03:44:05 --> PAGE: 1, PER PAGE: 500
DEBUG - 2025-10-15 03:44:05 --> DATA COUNT: 500
DEBUG - 2025-10-15 03:44:27 --> PAGE: 1, PER PAGE: 100
DEBUG - 2025-10-15 03:44:27 --> DATA COUNT: 100
DEBUG - 2025-10-15 03:49:53 --> PAGE: 1, PER PAGE: 100
DEBUG - 2025-10-15 03:49:53 --> DATA COUNT: 100
DEBUG - 2025-10-15 03:53:24 --> PAGE: 1, PER PAGE: 100
DEBUG - 2025-10-15 03:53:24 --> DATA COUNT: 100
DEBUG - 2025-10-15 03:53:53 --> PAGE: 1, PER PAGE: 100
DEBUG - 2025-10-15 03:53:53 --> DATA COUNT: 100
DEBUG - 2025-10-15 03:54:06 --> PAGE: 2, PER PAGE: 100
DEBUG - 2025-10-15 03:54:06 --> DATA COUNT: 100
DEBUG - 2025-10-15 03:56:30 --> PAGE: 2, PER PAGE: 100
DEBUG - 2025-10-15 03:56:30 --> DATA COUNT: 100
DEBUG - 2025-10-15 03:57:27 --> PAGE: 2, PER PAGE: 100
DEBUG - 2025-10-15 03:57:27 --> DATA COUNT: 100
DEBUG - 2025-10-15 03:58:28 --> PAGE: 2, PER PAGE: 100
DEBUG - 2025-10-15 03:58:28 --> DATA COUNT: 100
DEBUG - 2025-10-15 03:58:52 --> PAGE: 3, PER PAGE: 100
DEBUG - 2025-10-15 03:58:52 --> DATA COUNT: 100
ERROR - 2025-10-15 04:07:06 --> RPC get_rs_unique_latest_page failed (0): 
ERROR - 2025-10-15 04:07:06 --> RPC get_rs_unique_latest_count failed (0): 
DEBUG - 2025-10-15 04:07:06 --> PAGE: 1, PER PAGE: 100
DEBUG - 2025-10-15 04:07:06 --> DATA COUNT: 0
DEBUG - 2025-10-15 04:07:18 --> PAGE: 1, PER PAGE: 100
DEBUG - 2025-10-15 04:07:18 --> DATA COUNT: 100
DEBUG - 2025-10-15 04:07:48 --> PAGE: 1, PER PAGE: 100
DEBUG - 2025-10-15 04:07:48 --> DATA COUNT: 100
