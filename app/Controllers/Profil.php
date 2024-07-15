<?php

namespace App\Controllers;

use App\Models\PelangganModel;
use CodeIgniter\Controller;

class Profil extends BaseController
{
    protected $db;
    protected $PelangganModel;

    public function __construct()
    {
        helper('form');
        $this->db = \Config\Database::connect();
        $this->PelangganModel = new PelangganModel;
    }
    
    public function index()
    {
        $role = session()->get('level');
        if ($role == 2) {
            $model = new PelangganModel();
            $data['pelanggan'] = $model->AllData();

            echo view('pelanggan/header');
            echo view('pelanggan/profil', $data); // Teruskan data ke view
            echo view('pelanggan/footer');
        } else {
            return redirect()->to(base_url('Auth/error'));
        }
    }

    // method untuk edit profil
    public function edit()
    {
        // Define validation rules
        $rules = [
            'nama_pelanggan' => 'required',
            'nohp' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'no_ktp' => 'required'
        ];

        if ($this->validate($rules)) {
            $nama_pelanggan = $this->request->getPost('nama_pelanggan');
            $nohp = $this->request->getPost('nohp');
            $alamat = $this->request->getPost('alamat');
            $jenis_kelamin = $this->request->getPost('jenis_kelamin');
            $no_ktp = $this->request->getPost('no_ktp');
            $id = $this->request->getPost("idpelanggan");

            $hasil = $this->PelangganModel->update_pelanggan($id, $nama_pelanggan, $nohp, $alamat, $jenis_kelamin, $no_ktp);
            if ($hasil == false) {
                return redirect()->to('profil')->with('eror', 'eror');
            } else {
                return redirect()->to('profil')->with('input', 'input');
            }
        } else {
            // If validation fails, redirect back with errors
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }
    }
}