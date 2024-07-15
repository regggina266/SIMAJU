<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\TransaksiModel;
use App\Models\LaporanModel;

class Dashboard extends BaseController
{
    protected $BarangModel;
    protected $TransaksiModel;
    protected $LaporanModel;

    public function __construct()
    {
        $this->BarangModel = new BarangModel();
        $this->TransaksiModel = new TransaksiModel();
        $this->LaporanModel = new LaporanModel();
    }

    public function index()
    {
        $role = session()->get('level');
        if ($role == 3) {
            $data = [
                'jumlah_transaksi' => $this->TransaksiModel->getJumlahTransaksiPerHari(),
                'jumlah_barang' => $this->BarangModel->getJumlahBarang()
            ];

            echo view('components/header');
            echo view('components/navbar');
            echo view('admin/sidebar');
            echo view('admin/dashboard', $data); // Teruskan data ke view
            echo view('components/js');
            echo view('components/footer');
        } else {
            return redirect()->to(base_url('Auth/error'));
        }
    }
}