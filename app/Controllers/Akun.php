<?php

namespace App\Controllers;

use App\Models\AkunModel;
use CodeIgniter\Controller;

class Akun extends BaseController
{
    protected $db;
    protected $AkunModel;

    public function __construct()
    {
        helper('form');
        $this->db = \Config\Database::connect();
        $this->AkunModel = new AkunModel;
    }
    
    public function index()
    {
        $role = session()->get('level');
        if ($role == 4) {
            $model = new AkunModel();
            $data['akun'] = $model->AllData();

            echo view('components/header');
            echo view('components/navbar');
            echo view('super_admin/sidebar');
            echo view('super_admin/akun', $data); // Perhatikan cara meneruskan data barang ke view
            echo view('components/js');
            echo view('components/footer');
        } else {
            return redirect()->to(base_url('Auth/error'));
        }
    }

    public function tambah()
    {
        $role = session()->get('level');
        if ($role == 4) {
            // Validasi input
            $validation = \Config\Services::validation();
            $validation->setRules([
                'username' => 'required',
                'nama' => 'required',
                'level' => 'required'
            ]);

        if (!$validation->withRequest($this->request)->run()) {
            session()->setFlashdata('error', 'Gagal menambahkan data! Pastikan semua field diisi.');
            return redirect()->back()->withInput();
        }

        $username = $this->request->getPost('username');
        $nama = $this->request->getPost('nama');
        $level = $this->request->getPost('level');

        // Siapkan data untuk disimpan
        $data = [
            'nama' => $nama,
            'level' => $level,
            'username' => $username,
            'password' => password_hash($username, PASSWORD_DEFAULT)
        ];

            // Simpan data ke database
            $this->AkunModel->insert($data);
            session()->setFlashdata('input', 'Data Berhasil Ditambahkan!');
            return redirect()->to(base_url('Akun'));
        } else {
            return redirect()->to(base_url('Auth/error'));
        }
    }

    public function edit()
    {
        $role = session()->get('level');
        if ($role == 4) {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required',
            'nama' => 'required',
            'level' => 'required',
            'password' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            session()->setFlashdata('error', 'Gagal memperbarui data! Pastikan semua field diisi.');
            return redirect()->back()->withInput();
        }

        $nama = $this->request->getPost('nama');
        $level = $this->request->getPost('level');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $id = $this->request->getPost("idakun");

        // Cek apakah password diberikan dan lakukan hashing
        if (!empty($password)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        } else {
            // Ambil password saat ini dari database jika field password kosong
            $currentData = $this->AkunModel->get_akun($id);
            $hashedPassword = $currentData['password'];
        }

        $hasil = $this->AkunModel->update_akun($id, $nama, $level, $username, $hashedPassword);
        if ($hasil == false) {
            session()->setFlashdata('error', 'Gagal memperbarui data!');
        } else {
            session()->setFlashdata('input', 'Data Berhasil Diperbarui!');
        }
        return redirect()->to(base_url('Akun'));
        } else {
            return redirect()->to(base_url('Auth/error'));
        }
    }

    public function delete()
    {
        $role = session()->get('level');
        if ($role == 4) {
        $idakun = $this->request->getPost("idakun");
        $hasil = $this->AkunModel->delete_akun($idakun);

        if ($hasil == false) {
            session()->setFlashdata('input', 'Data Berhasil Ditambahkan!');
        } else {
            session()->setFlashdata('error_hapus', 'Data Gagal Dihapus!');
        }
        return redirect()->to(base_url('Akun'));
        } else {
            return redirect()->to(base_url('Auth/error'));
        }
    }
}
