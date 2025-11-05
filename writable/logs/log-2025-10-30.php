<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

DEBUG - 2025-10-30 01:35:27 --> ⏳ Export XLS untuk tipe 'jenis' selesai disiapkan dalam 7.266 detik.
DEBUG - 2025-10-30 01:35:33 --> ✅ File XLS 'data_rs_full_jenis_20251030_013527.xlsx' dikirim ke browser dalam total 13.34 detik.
DEBUG - 2025-10-30 01:35:44 --> ⏳ Export XLS untuk tipe 'jenis' selesai disiapkan dalam 9.166 detik.
DEBUG - 2025-10-30 01:35:51 --> ✅ File XLS 'data_rs_full_jenis_20251030_013544.xlsx' dikirim ke browser dalam total 16.797 detik.
DEBUG - 2025-10-30 01:36:04 --> ⏳ Export XLS untuk tipe 'jenis' selesai disiapkan dalam 10.317 detik.
DEBUG - 2025-10-30 01:36:11 --> ✅ File XLS 'data_rs_full_jenis_20251030_013604.xlsx' dikirim ke browser dalam total 17.452 detik.
DEBUG - 2025-10-30 01:36:50 --> ⏳ Export XLS untuk tipe 'jenis' selesai disiapkan dalam 7.712 detik.
DEBUG - 2025-10-30 01:36:55 --> ✅ File XLS 'data_rs_full_jenis_20251030_013650.xlsx' dikirim ke browser dalam total 12.195 detik.
CRITICAL - 2025-10-30 11:24:34 --> Error: Class "Locale" not found
[Method: GET, Route: /]
in SYSTEMPATH\CodeIgniter.php on line 189.
 1 SYSTEMPATH\Boot.php(350): CodeIgniter\CodeIgniter->initialize()
 2 SYSTEMPATH\Boot.php(130): CodeIgniter\Boot::initializeCodeIgniter()
 3 ROOTPATH\spark(87): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
CRITICAL - 2025-10-30 11:24:34 --> ErrorException: Uncaught Error: Class "Locale" not found in C:\xampp\htdocs\rschartsapi\system\I18n\TimeTrait.php:76
Stack trace:
#0 C:\xampp\htdocs\rschartsapi\system\I18n\TimeTrait.php(117): CodeIgniter\I18n\Time->__construct(NULL, NULL, NULL)
#1 C:\xampp\htdocs\rschartsapi\system\HTTP\ResponseTrait.php(398): CodeIgniter\I18n\Time::now()
#2 C:\xampp\htdocs\rschartsapi\system\HTTP\ResponseTrait.php(376): CodeIgniter\HTTP\Response->sendHeaders()
#3 C:\xampp\htdocs\rschartsapi\system\Debug\ExceptionHandler.php(85): CodeIgniter\HTTP\Response->send()
#4 C:\xampp\htdocs\rschartsapi\system\Debug\Exceptions.php(162): CodeIgniter\Debug\ExceptionHandler->handle(Object(Error), Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), 500, 1)
#5 [internal function]: CodeIgniter\Debug\Exceptions->exceptionHandler(Object(Error))
#6 {main}
  thrown
【Previous Exception】
Error
Class "Locale" not found
#0 C:\xampp\htdocs\rschartsapi\system\Boot.php(350): CodeIgniter\CodeIgniter->initialize()
#1 C:\xampp\htdocs\rschartsapi\system\Boot.php(130): CodeIgniter\Boot::initializeCodeIgniter()
#2 C:\xampp\htdocs\rschartsapi\spark(87): CodeIgniter\Boot::bootSpark(Object(Config\Paths))
#3 {main}
[Method: GET, Route: /]
in SYSTEMPATH\I18n\TimeTrait.php on line 76.
 1 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
