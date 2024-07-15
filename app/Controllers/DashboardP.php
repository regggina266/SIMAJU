<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\MerkModel;
use App\Models\JenisModel;
use App\Models\KeranjangModel;
use App\Models\TransaksiModel;

class DashboardP extends BaseController
{
    protected $BarangModel;
    protected $MerkModel;
    protected $JenisModel;
    protected $KeranjangModel;
    protected $TransaksiModel;

    public function __construct()
    {
        $this->BarangModel = new BarangModel();
        $this->MerkModel = new MerkModel();
        $this->JenisModel = new JenisModel();
        $this->KeranjangModel = new KeranjangModel();
        $this->TransaksiModel = new TransaksiModel();
    }

    public function index()
    {
        $role = session()->get('level');
        if ($role == 2) {
                $all_data_barang = $this->BarangModel
                ->select('barang.*, jenis_barang.*, merk.*')
                ->join('jenis_barang', 'barang.idjenis = jenis_barang.idjenis', 'LEFT')
                ->join('merk', 'barang.idmerk = merk.idmerk', 'LEFT')
                ->findAll();

            $merks = $this->MerkModel->findAll();
            $jenisB = $this->JenisModel->findAll();

            $jumlah_data_keranjang = $this->KeranjangModel->countAllResults();
            $jumlah_data_transaksi = $this->TransaksiModel->countAllResults();
           


            echo view('pelanggan/dashboard_pelanggan', ['all_data_barang' => $all_data_barang, 'merks' => $merks, 'jenisB' => $jenisB, 'jumlah_data_keranjang' => $jumlah_data_keranjang, 'jumlah_data_transaksi' => $jumlah_data_transaksi]); // Teruskan data ke view

        } else {
            return redirect()->to(base_url('Auth/error'));
        }
    }
}