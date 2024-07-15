<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\MerkModel;
use App\Models\JenisModel;

class Freeuser extends BaseController
{
    protected $BarangModel;
    protected $MerkModel;
    protected $JenisModel;

    public function __construct()
    {
        $this->BarangModel = new BarangModel();
        $this->MerkModel = new MerkModel();
        $this->JenisModel = new JenisModel();
    }

    public function index()
    {
                $all_data_barang = $this->BarangModel
                ->select('barang.*, jenis_barang.*, merk.*')
                ->join('jenis_barang', 'barang.idjenis = jenis_barang.idjenis', 'LEFT')
                ->join('merk', 'barang.idmerk = merk.idmerk', 'LEFT')
                ->findAll();

            $merks = $this->MerkModel->findAll();
            $jenisB = $this->JenisModel->findAll();


            echo view('freeuser/beranda_freeuser', ['all_data_barang' => $all_data_barang, 'merks' => $merks, 'jenisB' => $jenisB]); // Teruskan data ke view
    }
}