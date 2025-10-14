<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Cors implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    // Tambahkan header CORS
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
    header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

    // Tangani preflight (OPTIONS)
    if (strtoupper($request->getMethod()) === 'OPTIONS') {
      $response = service('response');
      $response->setStatusCode(200);
      $response->setBody('OK');
      $response->send();
      exit;
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    return $response;
  }
}
