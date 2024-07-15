<?php

namespace App\Controllers;

use App\Models\PelangganModel;
use CodeIgniter\Controller;

class Registrasi extends BaseController
{
    protected $pelangganModel;

    public function __construct()
    {
        $this->pelangganModel = new PelangganModel();
        helper(['form', 'url', 'date']);
    }

    public function index()
    {
        return view('registrasi');
    }

    public function add_pelanggan()
    {
        // Ambil data dari form registrasi
        $data = [
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'username_pelanggan' => $this->request->getPost('username_pelanggan'),
            'password_pelanggan' => $this->request->getPost('password_pelanggan'),
            'nohp' => $this->request->getPost('nohp'),
            'alamat' => $this->request->getPost('alamat'),
            'no_ktp' => $this->request->getPost('no_ktp'),
        ];

        // Validasi apakah no_ktp sudah digunakan
        $no_ktp = $this->request->getPost('no_ktp');
        $cek_pelanggan = $this->pelangganModel->where('no_ktp', $no_ktp)->first();

        if ($cek_pelanggan) {
            session()->setFlashdata('danger', 'Nomor KTP sudah digunakan, silahkan registrasi kembali!');
            return redirect()->to(base_url('registrasi'));
        }

        // Upload foto KTP
        $foto_ktp = $this->request->getFile('foto_ktp');
        if ($foto_ktp->isValid() && !$foto_ktp->hasMoved()) {
            $newName = $foto_ktp->getRandomName();
            $foto_ktp->move(ROOTPATH . 'public/assets/ktp', $newName);
            $data['foto_ktp'] = $newName;
        } else {
            session()->setFlashdata('danger', 'Foto KTP tidak sesuai format!');
            return redirect()->to(base_url('registrasi'));
        }

        // Insert data ke database menggunakan model
        $this->pelangganModel->insert($data);

        // Set flash message dan redirect ke halaman login
        session()->setFlashdata('success', 'Registrasi berhasil, silahkan login!');
        return redirect()->to(base_url('auth'));
    }
}
