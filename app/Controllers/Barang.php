<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\MerkModel;
use App\Models\JenisModel;

class Barang extends BaseController
{
    protected $BarangModel;
    protected $MerkModel;
    protected $JenisModel;

    public function __construct()
    {
        helper('form');
        $this->BarangModel = new BarangModel();
        $this->MerkModel = new MerkModel();
        $this->JenisModel = new JenisModel();
    }

    public function index()
    {
        $role = session()->get('level'); // Dapatkan level pengguna dari session

        if ($role == 4) { // Level 4 untuk super admin
            $all_data_barang = $this->BarangModel
                ->select('barang.*, jenis_barang.*, merk.*')
                ->join('jenis_barang', 'barang.idjenis = jenis_barang.idjenis', 'LEFT')
                ->join('merk', 'barang.idmerk = merk.idmerk', 'LEFT')
                ->findAll();

            $merks = $this->MerkModel->findAll();
            $jenisB = $this->JenisModel->findAll();

            echo view('components/header');
            echo view('components/navbar');
            echo view('super_admin/sidebar');
            echo view('super_admin/barang_SA', ['all_data_barang' => $all_data_barang, 'merks' => $merks, 'jenisB' => $jenisB]);
            echo view('components/js');
            echo view('components/footer');
        } elseif ($role == 3) { // Level 3 untuk admin
            $all_data_barang = $this->BarangModel
                ->select('barang.*, jenis_barang.*, merk.*')
                ->join('jenis_barang', 'barang.idjenis = jenis_barang.idjenis', 'LEFT')
                ->join('merk', 'barang.idmerk = merk.idmerk', 'LEFT')
                ->findAll();

            $merks = $this->MerkModel->findAll();
            $jenisB = $this->JenisModel->findAll();

            echo view('components/header');
            echo view('components/navbar');
            echo view('admin/sidebar');
            echo view('admin/barang', ['all_data_barang' => $all_data_barang, 'merks' => $merks, 'jenisB' => $jenisB]);
            echo view('components/js');
            echo view('components/footer');
        } else {
            return redirect()->to(base_url('Auth/error'));
        }
    }

    // Tambahkan pengecekan pada fungsi tambah, edit, dan delete sesuai dengan role pengguna

    public function tambah()
{
    $role = session()->get('level'); // Dapatkan level pengguna dari session
    if ($role == 4 || $role == 3) {
        if ($this->request->getMethod() === 'post') {
            $validationRules = [
                'nama_barang' => 'required',
                'kode_barang' => 'required',
                'kode_warna' => 'required',
                'kuantitas' => 'required',
                'harga' => 'required',
                'stok' => 'required',
                'status' => 'required',
                'idmerk' => 'required',
                'idjenis' => 'required',
                'gambar' => [
                    'rules' => 'uploaded[gambar]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'Gambar harus diunggah.',
                        'is_image' => 'File harus berupa gambar.',
                        'mime_in' => 'Gambar harus berupa file JPG, JPEG, atau PNG.',
                    ],
                ],
            ];

            if ($this->validate($validationRules)) {
                $gambar = $this->request->getFile('gambar');
                $gambarName = $gambar->getRandomName();
                $gambar->move('uploads', $gambarName);

                $data = [
                    'nama_barang' => $this->request->getPost('nama_barang'),
                    'kode_barang' => $this->request->getPost('kode_barang'),
                    'kode_warna' => $this->request->getPost('kode_warna'),
                    'kuantitas' => $this->request->getPost('kuantitas'),
                    'harga' => $this->request->getPost('harga'),
                    'stok' => $this->request->getPost('stok'),
                    'status' => $this->request->getPost('status'),
                    'gambar' => $gambarName,
                    'idmerk' => $this->request->getPost('idmerk'),
                    'idjenis' => $this->request->getPost('idjenis')
                ];

                $success = $this->BarangModel->insert($data);

                if ($success) {
                    session()->setFlashdata('message', 'Berhasil Ditambahkan.');
                } else {
                    session()->setFlashdata('err', 'Gagal menambahkan data.');
                }
            } else {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());
            }

            return $this->redirectAfterOperation();
        } else {
            return $this->redirectAfterOperation();
        }
    } else {
        return redirect()->to(base_url('Auth/error'));
    }
}

public function edit()
{
    $role = session()->get('level'); // Dapatkan level pengguna dari session
    if ($role == 4 || $role == 3) {
        if ($this->request->getMethod() === 'post') {
            $validationRules = [
                'nama_barang' => 'required',
                'kode_barang' => 'required',
                'kode_warna' => 'required',
                'kuantitas' => 'required',
                'harga' => 'required',
                'stok' => 'required',
                'status' => 'required',
                'idmerk' => 'required',
                'idjenis' => 'required',
                'gambar' => [
                    'rules' => 'is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'is_image' => 'File harus berupa gambar.',
                        'mime_in' => 'Gambar harus berupa file JPG, JPEG, atau PNG.',
                    ],
                ],
            ];

            if ($this->validate($validationRules)) {
                $id = $this->request->getPost('idbarang');
                $data = [
                    'nama_barang' => $this->request->getPost('nama_barang'),
                    'kode_barang' => $this->request->getPost('kode_barang'),
                    'kode_warna' => $this->request->getPost('kode_warna'),
                    'kuantitas' => $this->request->getPost('kuantitas'),
                    'harga' => $this->request->getPost('harga'),
                    'stok' => $this->request->getPost('stok'),
                    'status' => $this->request->getPost('status'),
                    'idmerk' => $this->request->getPost('idmerk'),
                    'idjenis' => $this->request->getPost('idjenis')
                ];

                $gambar = $this->request->getFile('gambar');
                if ($gambar->isValid() && !$gambar->hasMoved()) {
                    $gambarName = $gambar->getRandomName();
                    $gambar->move('uploads', $gambarName);
                    $data['gambar'] = $gambarName;
                }

                $success = $this->BarangModel->update($id, $data);

                if ($success) {
                    session()->setFlashdata('message', 'Berhasil Diedit.');
                } else {
                    session()->setFlashdata('err', 'Gagal mengedit data.');
                }
            } else {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());
            }

            return $this->redirectAfterOperation();
        } else {
            return $this->redirectAfterOperation();
        }
    } else {
        return redirect()->to(base_url('Auth/error'));
    }
}


    public function delete()
    {
        $role = session()->get('level'); // Dapatkan level pengguna dari session
        if ($role == 4 || $role == 3) {
            $idbarang = $this->request->getPost('idbarang');

            if ($idbarang) {
                $success = $this->BarangModel->delete($idbarang);

                if ($success) {
                    session()->setFlashdata('message', 'Berhasil Dihapus.');
                } else {
                    session()->setFlashdata('err', 'Gagal menghapus data.');
                }
            } else {
                session()->setFlashdata('err', 'ID barang tidak ditemukan.');
            }

            return $this->redirectAfterOperation();
        } else {
            return redirect()->to(base_url('Auth/error'));
        }
    }

    protected function redirectAfterOperation()
    {
        $role = session()->get('level'); // Dapatkan level pengguna dari session
        return redirect()->to(base_url('barang'));
    }
}

