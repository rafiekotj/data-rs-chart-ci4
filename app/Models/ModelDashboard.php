<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDashboard extends Model
{
  protected $table = 'data_rs';
  protected $primaryKey = 'id';
  protected $allowedFields = [
    'tahun',
    'rumah_sakit',
    'jenis_rs',
    'kelas_rs',
    'alamat',
    'kabupaten_kota',
    'provinsi',
    'penyelenggara_grup',
    'penyelenggara_kategori'
  ];

  // === Ambil daftar Provinsi ===
  public function getListProvinsi(): array
  {
    return $this->select('provinsi')
      ->distinct()
      ->orderBy('provinsi', 'ASC')
      ->findAll();
  }

  // === Ambil daftar Kabupaten/Kota ===
  public function getListKabupatenKota(): array
  {
    return $this->select('kabupaten_kota')
      ->distinct()
      ->orderBy('kabupaten_kota', 'ASC')
      ->findAll();
  }

  // === Ambil daftar Tahun ===
  public function getListTahun(): array
  {
    return $this->select('tahun')
      ->distinct()
      ->orderBy('tahun', 'DESC')
      ->findAll();
  }

  // === Data untuk Bar Chart ===
  public function getBarData(string $kolom, string $tahun, string $provinsi = '', string $kabupaten = ''): array
  {
    $builder = $this->select("$kolom, COUNT(*) AS total")
      ->where('tahun', $tahun);

    if (!empty($provinsi)) {
      $builder->where('provinsi', $provinsi);
    }

    if (!empty($kabupaten)) {
      $builder->where('kabupaten_kota', $kabupaten);
    }

    return $builder->groupBy($kolom)
      ->orderBy($kolom, 'ASC')
      ->findAll();
  }

  // === Data untuk Line Chart ===
  public function getLineData(string $kolom, string $tahunAwal, string $tahunAkhir, string $provinsi = '', string $kabupaten = ''): array
  {
    $builder = $this->select("tahun, $kolom, COUNT(*) AS total")
      ->where('tahun >=', $tahunAwal)
      ->where('tahun <=', $tahunAkhir);

    if (!empty($provinsi)) {
      $builder->where('provinsi', $provinsi);
    }

    if (!empty($kabupaten)) {
      $builder->where('kabupaten_kota', $kabupaten);
    }

    return $builder->groupBy(['tahun', $kolom])
      ->orderBy('tahun', 'ASC')
      ->orderBy($kolom, 'ASC')
      ->findAll();
  }

  // === Ambil Kabupaten berdasarkan Provinsi ===
  public function getKabupatenByProvinsi(string $provinsi): array
  {
    return $this->db->table($this->table)
      ->distinct()
      ->select('kabupaten_kota')
      ->where('provinsi', $provinsi)
      ->orderBy('kabupaten_kota', 'ASC')
      ->get()
      ->getResultArray();
  }
}