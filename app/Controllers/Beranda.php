<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\TransaksiModel;
use App\Models\LaporanModel;
use App\Models\AkunModel;
use App\Models\PelangganModel;

class Beranda extends BaseController
{
    protected $BarangModel;
    protected $TransaksiModel;
    protected $AkunModel;
    protected $PelangganModel;
    protected $LaporanModel;

    public function __construct()
    {
        $this->BarangModel = new BarangModel();
        $this->TransaksiModel = new TransaksiModel();
        $this->AkunModel = new AkunModel();
        $this->PelangganModel = new PelangganModel();
        $this->LaporanModel = new LaporanModel();
    }

    public function index()
    {
        $role = session()->get('level');
        if ($role == 4) {
            $data = [
                'jumlah_transaksi' => $this->TransaksiModel->getJumlahTransaksiPerHari(),
                'jumlah_akun' => $this->AkunModel->getJumlahAkun(),
                'jumlah_pelanggan' => $this->PelangganModel->getJumlahPelanggan(),
                'jumlah_barang' => $this->BarangModel->getJumlahBarang()
            ];

            echo view('components/header');
            echo view('components/navbar');
            echo view('super_admin/sidebar');
            echo view('super_admin/beranda', $data); // Teruskan data ke view
            echo view('components/js');
            echo view('components/footer');
        } else {
            return redirect()->to(base_url('Auth/error'));
        }
    }
}