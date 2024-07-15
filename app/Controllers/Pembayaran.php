<?php

namespace App\Controllers;

use App\Models\PembayaranModel;
use App\Models\DashboardModel;

class Pembayaran extends BaseController
{
    protected $PembayaranModel;
    protected $dashboardModel;

    public function __construct()
    {
        $this->PembayaranModel = new PembayaranModel();
        $this->dashboardModel = new DashboardModel();

        // User bukan level 'Admin' ditolak
        if (session()->get('level') !== 'Admin') {
            return redirect()->to('auth/logout');
        }
    }

    // -- method menampilkan data pembayaran -- //
    public function index()
    {
        $data['pembayaran'] = $this->PembayaranModel->AllData();
        echo view('components/header');
        echo view('components/navbar');
        echo view('super_admin/sidebar');
        echo view('super_admin/pembayaran', $data); // Perhatikan cara meneruskan data barang ke view
        echo view('components/js');
        echo view('components/footer');
    }

    public function tambah()
    {
        // Define validation rules
        $rules = [
            'nama_bank' => 'required',
            'no_bank' => 'required',
            'atas_nama' => 'required'
        ];

        if ($this->validate($rules)) {
            $data = [
                'nama_bank' => $this->request->getPost('nama_bank'),
                'no_bank' => $this->request->getPost('no_bank'),
                'atas_nama' => $this->request->getPost('atas_nama'),
            ];
            $this->PembayaranModel->Add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
            return redirect()->to(base_url('Pembayaran'));
        } else {
            // If validation fails, redirect back with errors
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }
    }

    // method untuk edit data departemen
    public function edit()
    {
        // Define validation rules
        $rules = [
            'nama_bank' => 'required',
            'no_bank' => 'required',
            'atas_nama' => 'required'
        ];

        if ($this->validate($rules)) {
            $nama_bank = $this->request->getPost('nama_bank');
            $no_bank = $this->request->getPost('no_bank');
            $atas_nama = $this->request->getPost('atas_nama');
            $id = $this->request->getPost("idpembayaran");

            $hasil = $this->PembayaranModel->update_pelanggan($id, $nama_bank, $no_bank, $atas_nama);
            if ($hasil == false) {
                return redirect()->to('Pembayaran')->with('eror', 'eror');
            } else {
                return redirect()->to('Pembayaran')->with('input', 'input');
            }
        } else {
            // If validation fails, redirect back with errors
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }
    }

    public function delete()
    {
        $idpembayaran = $this->request->getPost("idpembayaran");

        $hasil = $this->PembayaranModel->delete_pembayaran($idpembayaran);

        if ($hasil == false) {
            return redirect()->to('Pembayaran')->with('eror_hapus', 'eror_hapus');
        } else {
            return redirect()->to('Pembayaran')->with('hapus', 'hapus');
        }
    }
}
