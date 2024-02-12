<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenjualanModel;
use App\Models\PelangganModel;
use CodeIgniter\HTTP\ResponseInterface;

class Penjualan extends BaseController
{
    protected $penjualan;

    function __construct()
    {
        $this->penjualan = new PenjualanModel();
    }

    public function index()
    {
        $data['pelanggan'] = $this->ambilDataPelanggan(); // Metode untuk mengambil data dari tb_pelanggan
        return view('v_penjualan', $data);
    }

    private function ambilDataPelanggan()
{
    // Query untuk mengambil data dari tb_pelanggan
    $result = $this->penjualan->table('tb_pelanggan')->get()->getResult();

    $pelanggan = [];
    foreach ($result as $row) {
        $pelanggan[$row->id_pelanggan] = $row->nama_pelanggan;
    }

    return $pelanggan;
}
}
