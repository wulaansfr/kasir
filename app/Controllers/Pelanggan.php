<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PelangganModel;
use CodeIgniter\HTTP\ResponseInterface;

class Pelanggan extends BaseController
{
    protected $pelanggan;

    public function __construct()
    {
        $this->pelanggan = new PelangganModel();
    }

    public function index()
    {
        return view('v_pelanggan');
    }

    public function ambilSemua()
    {
        $data = $this->pelanggan->findAll(); //mengambil semua data dari tabel

        return json_encode($data); //merubah $data menjadi json
    }

    public function simpan()
    {
        $this->pelanggan->insert([
            'nama_pelanggan' => $this->request->getVar('namaPelanggan'),
            'alamat' => $this->request->getVar('alamat'),
            'no_telp' => $this->request->getVar('no_telp')
        ]);
        return 'sukses';
    }

    public function edit()
    {
        $id = $this->request->getVar('id');
        $data = $this->pelanggan->find($id);

        return json_encode($data);
    }

    public function update()
    {
        $id = $this->request->getVar('id');

        $this->pelanggan->update($id,[
            'nama_pelanggan' => $this->request->getVar('namaPelanggan'),
            'alamat' => $this->request->getVar('alamat'),
            'no_telp' => $this->request->getVar('no_telp')
        ]);
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        $this->pelanggan->delete($id);
    }
}
