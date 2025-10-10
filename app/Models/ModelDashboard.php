<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDashboard extends Model
{
  protected $supabase;

  public function __construct()
  {
    parent::__construct();
    $this->supabase = service('supabase');
  }

  // === Ambil daftar Provinsi ===
  public function getListProvinsi(): array
  {
    return $this->supabase->getAll('data_rs', 'select=provinsi&distinct=provinsi&order=provinsi.asc');
  }

  // === Ambil daftar Kabupaten/Kota ===
  public function getListKabupatenKota(): array
  {
    return $this->supabase->getAll('data_rs', 'select=kabupaten_kota&distinct=kabupaten_kota&order=kabupaten_kota.asc');
  }

  // === Ambil daftar Tahun ===
  public function getListTahun(): array
  {
    return $this->supabase->getAll('data_rs', 'select=tahun&distinct=tahun&order=tahun.desc');
  }

  // === Data untuk Bar Chart ===
  public function getBarData(string $kolom, string $tahun, string $provinsi = '', string $kabupaten = ''): array
  {
    $filter = "select={$kolom},count:id&tahun=eq.{$tahun}";
    if ($provinsi) $filter .= "&provinsi=eq.{$provinsi}";
    if ($kabupaten) $filter .= "&kabupaten_kota=eq.{$kabupaten}";
    $filter .= "&groupby={$kolom}";

    return $this->supabase->getAll('data_rs', $filter);
  }

  // === Data untuk Line Chart ===
  public function getLineData(string $kolom, string $tahunAwal, string $tahunAkhir, string $provinsi = '', string $kabupaten = ''): array
  {
    $filter = "select=tahun,{$kolom},count:id&tahun=gte.{$tahunAwal}&tahun=lte.{$tahunAkhir}";
    if ($provinsi) $filter .= "&provinsi=eq.{$provinsi}";
    if ($kabupaten) $filter .= "&kabupaten_kota=eq.{$kabupaten}";
    $filter .= "&order=tahun.asc,{$kolom}.asc";

    return $this->supabase->getAll('data_rs', $filter);
  }

  // === Ambil Kabupaten berdasarkan Provinsi ===
  public function getKabupatenByProvinsi(string $provinsi): array
  {
    return $this->supabase->getAll('data_rs', "select=kabupaten_kota&provinsi=eq.{$provinsi}&distinct=kabupaten_kota&order=kabupaten_kota.asc");
  }
}
