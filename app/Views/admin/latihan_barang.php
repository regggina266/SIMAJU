<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\TransaksiBarangModel;
use App\Models\BarangModel;
use App\Models\PelangganModel;

class Transaksi extends BaseController
{
    protected $TransaksiModel;
    protected $BarangModel;
    protected $TransaksiBarangModel;
    protected $PelangganModel;
    protected $db;

    public function __construct()
    {
        helper('form');
        $this->TransaksiModel = new TransaksiModel;
        $this->TransaksiBarangModel = new TransaksiBarangModel;
        $this->PelangganModel = new PelangganModel;
        $this->BarangModel = new BarangModel;
        $this->db = \Config\Database::connect();
    }
    
    public function index()
    {
        $model = new TransaksiModel();
        $data['transaksi'] = $model->AllData();
        $data['akun'] = $this->TransaksiModel->get_all_akun();
        $data['pelanggan'] = $this->TransaksiModel->get_all_pelanggan();
        $data['barang'] = $this->TransaksiModel->get_all_barang();

        $role = session()->get('level');
        echo view('components/header');
        echo view('components/navbar');
        if ($role == 4) {
            echo view('super_admin/sidebar');
            echo view('super_admin/transaksi_SA', $data);
        } else {
            echo view('admin/sidebar');
            echo view('admin/transaksi', $data);
        }
        echo view('components/js');
        echo view('components/footer');
    }
    
    public function tambah($idakun)
    {
        $nama_pelanggan = $this->request->getPost('nama_pelanggan');
        $pelanggan = $this->PelangganModel->getPelangganByName($nama_pelanggan);
    
        if ($pelanggan) {
            $idpelanggan = $pelanggan['idpelanggan'];
        } else {
            $this->PelangganModel->insert(['nama_pelanggan' => $nama_pelanggan]);
            $idpelanggan = $this->db->insertID();
            
            if (!$idpelanggan) {
                log_message('error', 'Failed to insert pelanggan');
                session()->setFlashdata('error', 'Failed to insert pelanggan');
                return redirect()->to(base_url('transaksi'));
            }
        }
    
        $data = [
            'tgl_transaksi' => $this->request->getPost('tgl_transaksi'),
            'idakun' => $idakun,
            'idpelanggan' => $idpelanggan,
            'jumlah_produk' => $this->request->getPost('jumlah_produk'),
            'total_harga' => $this->request->getPost('total_harga'),
            'jenis_pembayaran' => $this->request->getPost('jenis_pembayaran'),
        ];
    
        if (!$this->TransaksiModel->insert($data)) {
            log_message('error', 'Failed to insert transaksi: ' . json_encode($data));
            session()->setFlashdata('err', 'Gagal menambahkan transaksi.');
            return redirect()->to(base_url('transaksi'));
        }
        $transactionId = $this->TransaksiModel->getInsertID();
    
        $kode_barang = $this->request->getPost('kode_barang');
        $nama_barang = $this->request->getPost('nama_barang');
        $kode_warna = $this->request->getPost('kode_warna');
        $kuantitas = $this->request->getPost('kuantitas');
        $stok = $this->request->getPost('stok');
        $nama_merk = $this->request->getPost('nama_merk');
        $nama_jenis = $this->request->getPost('nama_jenis');
        $harga = $this->request->getPost('harga');
        
        $hit = count($kode_barang);
        $success = true;
        
        for ($i = 0; $i < $hit; $i++) {
            $itemData = [
                'id_transaksi' => $transactionId,
                'kode_barang' => $kode_barang[$i],
                'nama_barang' => $nama_barang[$i],
                'kode_warna' => $kode_warna[$i],
                'kuantitas' => $kuantitas[$i],
                'stok' => $stok[$i],
                'merk' => $nama_merk[$i],
                'jenis_barang' => $nama_jenis[$i],
                'harga' => $harga[$i],
            ];
    
            if (!$this->TransaksiBarangModel->insert($itemData)) {
                $success = false;
                log_message('error', 'Failed to insert transaksi_barang: ' . json_encode($itemData));
                break;
            } else {
                // Update the stock in the barang table
                $newStok = $stok[$i] - $kode_barang[$i];
                if ($newStok < 0) {
                    log_message('error', 'Stok tidak cukup untuk barang: ' . $kode_barang[$i]);
                    session()->setFlashdata('err', 'Stok tidak cukup untuk barang: ' . $kode_barang[$i]);
                    return redirect()->to(base_url('transaksi'));
                }
                
                if (!$this->BarangModel->update($kode_barang[$i], ['stok' => $newStok])) {
                    $success = false;
                    log_message('error', 'Failed to update stok for barang: ' . $kode_barang[$i]);
                    break;
                }
            }
        }
    
        if ($success) {
            session()->setFlashdata('message', 'Berhasil Ditambahkan.');
        } else {
            session()->setFlashdata('err', 'Gagal menambahkan data.');
        }
    
        return redirect()->to(base_url('transaksi'));
    }    

    public function getPrice()
    {
        $kode_barang = $this->request->getPost('kode_barang');
        $model = new BarangModel();
        $data_barang = $model->getDataWithJoin($kode_barang);

        if ($data_barang) {
            return $this->response->setJSON($data_barang);
        } else {
            return $this->response->setJSON(['error' => 'Harga tidak ditemukan']);
        }
    }
    
    public function detail($id)
    {
        $barang = $this->TransaksiBarangModel->findAll();
        $data = ['barang' => $barang];

        $role = session()->get('level');
        echo view('components/header');
        echo view('components/navbar');
        if ($role == 4) {
            echo view('super_admin/sidebar');
            echo view('admin/detail_transaksi', $data);
        } else {
            echo view('admin/sidebar');
            echo view('admin/detail_transaksi', $data);
        }
        echo view('components/js');
        echo view('components/footer');
    }

    protected function redirectAfterOperation()
    {
        $role = session()->get('level');
        if ($role == 4) {
            return redirect()->to(base_url('transaksi/super_admin'));
        } else {
            return redirect()->to(base_url('transaksi'));
        }
    }
}
