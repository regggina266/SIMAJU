<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{
    protected $AuthModel;

    public function __construct()
    {
        helper('form');
        $this->AuthModel = new AuthModel();
    }

    // Menampilkan halaman login
    public function index()
    {
        $data = [
            'judul' => 'Login',
            'errors' => session()->getFlashdata('errors'), // Mengambil pesan kesalahan dari session
            'pesan' => session()->getFlashdata('pesan') // Mengambil pesan umum dari session
        ];
        return view('login', $data);
    }

    // Memeriksa login pengguna
    public function cek_login()
    {
        // Validasi input form
        if ($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!'
                ]
            ],
        ])) {
            // Jika validasi sukses
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek = $this->AuthModel->login($username, $password);
            if ($cek) {
                // Jika data login cocok
                session()->set('log', true);
                session()->set('nama', $cek['nama']);
                session()->set('username', $cek['username']);
                session()->set('password', $cek['password']);
                session()->set('level', $cek['level']); // Simpan level pengguna dalam session

                // Redirect ke dashboard sesuai level pengguna
                switch ($cek['level']) {
                    case 2:
                        session()->setFlashdata('pesan', 'Login berhasil! Selamat datang, ' . $cek['nama']);
                        return redirect()->to(base_url('DashboardP'));
                        break;
                    case 3:
                        session()->setFlashdata('pesan', 'Login berhasil! Selamat datang, ' . $cek['nama']);
                        return redirect()->to(base_url('Dashboard'));
                        break;
                    case 4:
                        session()->setFlashdata('pesan', 'Login berhasil! Selamat datang, ' . $cek['nama']);
                        return redirect()->to(base_url('Beranda'));
                        break;
                    default:
                        session()->setFlashdata('pesan', 'Login Gagal :: Level pengguna tidak valid!');
                        return redirect()->to(base_url('Auth'));
                }
            } else {
                // Jika data login tidak cocok
                session()->setFlashdata('pesan', 'Login Gagal :: Username atau Password Tidak Cocok. Harap masukkan ulang.');
                return redirect()->to(base_url('Auth'));
            }
        } else {
            // Jika validasi gagal
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth'));
        }
    }

    // Fungsi untuk logout
    public function logout()
    {
        session()->remove('log');
        session()->remove('nama');
        session()->remove('username');
        session()->remove('password');
        session()->remove('level'); // Hapus level dari session saat logout
        session()->setFlashdata('pesan', 'Logout Sukses!!');
        return redirect()->to(base_url('Auth'));
    }

    // Menampilkan tampilan error 404 atau validasi
    public function error()
    {
        echo view('Error');
    }
}

