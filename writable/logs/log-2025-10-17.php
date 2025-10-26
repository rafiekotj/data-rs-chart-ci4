<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

ERROR - 2025-10-17 02:00:59 --> RPC get_rs_unique_latest_page failed (0): 
ERROR - 2025-10-17 02:00:59 --> RPC get_rs_unique_latest_count failed (0): 
ERROR - 2025-10-17 02:05:41 --> RPC get_rs_unique_latest_count failed (0): 
ERROR - 2025-10-17 02:08:29 --> RPC get_rs_unique_latest_page failed (0): 
ERROR - 2025-10-17 02:08:29 --> RPC get_rs_unique_latest_count failed (0): 
ERROR - 2025-10-17 02:08:32 --> RPC get_rs_unique_latest_page failed (0): 
ERROR - 2025-10-17 02:08:32 --> RPC get_rs_unique_latest_count failed (0): 
ERROR - 2025-10-17 02:11:02 --> RPC get_rs_unique_latest_page failed (0): 
ERROR - 2025-10-17 02:11:02 --> RPC get_rs_unique_latest_count failed (0): 
ERROR - 2025-10-17 02:11:06 --> RPC get_rs_unique_latest_page failed (0): 
ERROR - 2025-10-17 02:11:06 --> RPC get_rs_unique_latest_count failed (0): 
ERROR - 2025-10-17 02:19:58 --> RPC get_rs_unique_latest_page failed (0): 
ERROR - 2025-10-17 02:19:58 --> RPC get_rs_unique_latest_count failed (0): 
ERROR - 2025-10-17 02:20:02 --> RPC get_rs_unique_latest_page failed (0): 
ERROR - 2025-10-17 02:20:02 --> RPC get_rs_unique_latest_count failed (0): 
CRITICAL - 2025-10-17 02:34:23 --> ErrorException: Undefined property: CodeIgniter\Router\RouteCollection::$response
[Method: GET, Route: healthz]
in APPPATH\Config\Routes.php on line 17.
 1 APPPATH\Config\Routes.php(17): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Undefined property: CodeIgniter\\Router\\RouteCollection::$response', 'C:\\xampp\\htdocs\\rschartsapi\\app\\Config\\Routes.php', 17)
 2 SYSTEMPATH\CodeIgniter.php(875): CodeIgniter\Router\RouteCollection->{closure}()
 3 SYSTEMPATH\CodeIgniter.php(494): CodeIgniter\CodeIgniter->startController()
 4 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 5 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
 6 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 7 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
 8 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
CRITICAL - 2025-10-17 02:34:28 --> ErrorException: Undefined property: CodeIgniter\Router\RouteCollection::$response
[Method: GET, Route: healthz]
in APPPATH\Config\Routes.php on line 17.
 1 APPPATH\Config\Routes.php(17): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Undefined property: CodeIgniter\\Router\\RouteCollection::$response', 'C:\\xampp\\htdocs\\rschartsapi\\app\\Config\\Routes.php', 17)
 2 SYSTEMPATH\CodeIgniter.php(875): CodeIgniter\Router\RouteCollection->{closure}()
 3 SYSTEMPATH\CodeIgniter.php(494): CodeIgniter\CodeIgniter->startController()
 4 SYSTEMPATH\CodeIgniter.php(354): CodeIgniter\CodeIgniter->handleRequest(null, Object(Config\Cache), false)
 5 SYSTEMPATH\Boot.php(363): CodeIgniter\CodeIgniter->run()
 6 SYSTEMPATH\Boot.php(68): CodeIgniter\Boot::runCodeIgniter(Object(CodeIgniter\CodeIgniter))
 7 FCPATH\index.php(59): CodeIgniter\Boot::bootWeb(Object(Config\Paths))
 8 SYSTEMPATH\rewrite.php(44): require_once('C:\\xampp\\htdocs\\rschartsapi\\public\\index.php')
