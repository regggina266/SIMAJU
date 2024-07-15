<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PelangganModel;

class Pelanggan extends BaseController
{
    protected $PelangganModel;

    public function __construct()
    {
        helper('form');
        $this->PelangganModel = new PelangganModel;
    }

    public function index()
    {
        $model = new PelangganModel();
        $data['pelanggan'] = $model->AllData();
        $role = session()->get('level');
        if ($role == 4) {
        echo view('components/header', $data);
        echo view('components/navbar');
        echo view('super_admin/sidebar');
        echo view('super_admin/pelanggan', $data); // Perhatikan cara meneruskan data barang ke view
        echo view('components/js');
        echo view('components/footer');
        } else {
            return redirect()->to(base_url('Auth/error'));
        }
    }

    public function tambah()
    {
        // Define validation rules
        $rules = [
            'nama_pelanggan' => 'required',
            'nohp' => 'required',
            'alamat' => 'required'
        ];

        if ($this->validate($rules)) {
            $data = [
                'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
                'nohp' => $this->request->getPost('nohp'),
                'alamat' => $this->request->getPost('alamat'),
            ];
            $this->PelangganModel->Add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
            return redirect()->to(base_url('Pelanggan'));
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
            'nama_pelanggan' => 'required',
            'nohp' => 'required',
            'alamat' => 'required'
        ];

        if ($this->validate($rules)) {
            $nama_pelanggan = $this->request->getPost('nama_pelanggan');
            $nohp = $this->request->getPost('nohp');
            $alamat = $this->request->getPost('alamat');
            $id = $this->request->getPost("idpelanggan");

            $hasil = $this->PelangganModel->update_pelanggan($id, $nama_pelanggan, $nohp, $alamat);
            if ($hasil == false) {
                return redirect()->to('pelanggan')->with('eror', 'eror');
            } else {
                return redirect()->to('pelanggan')->with('input', 'input');
            }
        } else {
            // If validation fails, redirect back with errors
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }
    }

    public function delete()
    {
        $idpelanggan = $this->request->getPost("idpelanggan");

        $hasil = $this->PelangganModel->delete_pelanggan($idpelanggan);

        if ($hasil == false) {
            return redirect()->to('pelanggan')->with('eror_hapus', 'eror_hapus');
        } else {
            return redirect()->to('pelanggan')->with('hapus', 'hapus');
        }
    }
}
