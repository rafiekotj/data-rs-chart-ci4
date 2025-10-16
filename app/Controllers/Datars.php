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
    $page     = max(1, (int)($this->request->getGet('page') ?? 1));
    $perPage  = (int)($this->request->getGet('per_page') ?? 100);
    $search   = trim($this->request->getGet('search') ?? '');

    $rs        = $this->model->getUniqueLatestPage($page, $perPage, $search);
    $totalData = $this->model->getUniqueLatestTotal($search);
    $totalPage = $perPage > 0 ? ceil($totalData / $perPage) : 1;

    $data = [
      'rs'         => $rs,
      'page'       => $page,
      'perPage'    => $perPage,
      'totalPage'  => $totalPage,
      'totalData'  => $totalData,
      'search'     => $search,
      'title'      => 'Data Rumah Sakit'
    ];

    return view('templates/header')
      . view('data/datars', $data)
      . view('templates/footer');
  }
}