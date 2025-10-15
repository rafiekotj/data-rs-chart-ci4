<?php

namespace App\Controllers;

use App\Models\ModelDatars;

class Datars extends BaseController
{
  protected $model;

  public function __construct()
  {
    $this->model = new ModelDatars();
  }

  public function index()
  {
    $page = max(1, (int)($this->request->getGet('page') ?? 1));
    $perPage = (int)($this->request->getGet('per_page') ?? 100); // default 100

    // Ambil data per halaman
    $rs = $this->model->getUniqueLatestPage($page, $perPage);

    // Ambil total data
    $totalData = $this->model->getUniqueLatestTotal();
    $totalPage = $perPage > 0 ? ceil($totalData / $perPage) : 1;

    // Hitung halaman sebelumnya dan berikutnya
    $nextPage = ($page < $totalPage) ? $page + 1 : null;
    $prevPage = ($page > 1) ? $page - 1 : null;

    $data = [
      'rs' => $rs,
      'page' => $page,
      'perPage' => $perPage,
      'totalPage' => $totalPage,
      'totalData' => $totalData,
      'nextPage' => $nextPage,
      'prevPage' => $prevPage,
    ];

    log_message('debug', 'PAGE: ' . $page . ', PER PAGE: ' . $perPage);
    log_message('debug', 'DATA COUNT: ' . count($rs));

    return view('templates/header')
      . view('data/datars', $data)
      . view('templates/footer');
  }
}