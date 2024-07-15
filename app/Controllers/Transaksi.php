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
        $this->TransaksiModel = new TransaksiModel();
        $this->TransaksiBarangModel = new TransaksiBarangModel();
        $this->PelangganModel = new PelangganModel();
        $this->BarangModel = new BarangModel();
        $this->db = \Config\Database::connect();
    }
    
    public function index()
    {
        $data['transaksi'] = $this->TransaksiModel->AllData();

        $role = session()->get('level');
        if ($role == 4) {
            echo view('components/header');
            echo view('components/navbar');
            echo view('super_admin/sidebar');
            echo view('super_admin/transaksi_SA', $data);
            echo view('components/js');
            echo view('components/footer');
        } elseif ($role == 3){
            echo view('components/header');
            echo view('components/navbar');
            echo view('admin/sidebar');
            echo view('admin/transaksi', $data);
            echo view('components/js');
            echo view('components/footer');
        } elseif ($role == 2){
            echo view('components/header');
            echo view('pelanggan/sidebar');
            echo view('pelanggan/pemesanan', $data);
            echo view('components/js');
            echo view('components/footer');  
        } else {
            return redirect()->to(base_url('Auth/error'));
        }
    }

    public function tambah($idakun)
    {
        $role = session()->get('level'); // Dapatkan level pengguna dari session
        if ($role == 4 || $role == 3) {
        $validationRules = [
            'nama_pelanggan' => 'required',
            'tgl_transaksi' => 'required',
            'jenis_pembayaran' => 'required',
            'kode_barang.*' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            session()->setFlashdata('err', \Config\Services::validation()->listErrors());
            return $this->redirectAfterOperation();
        }

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
                return $this->redirectAfterOperation();
            }
        }

        $data = [
            'tgl_transaksi' => $this->request->getPost('tgl_transaksi'),
            'idakun' => $idakun,
            'idpelanggan' => $idpelanggan,
            'jenis_pembayaran' => $this->request->getPost('jenis_pembayaran'),
            'total_harga' => $this->request->getPost('total_harga')
        ];

        $this->TransaksiModel->Add($data);
        $transactionId = $this->db->insertID();

        $kode_barang = $this->request->getPost('kode_barang');
        $jumlah_produk = $this->request->getPost('jumlah_produk');
        $stok = $this->request->getPost('stok');
        $harga = $this->request->getPost('harga');

        $hit = count($kode_barang);
        $success = true;

        $this->db->transStart();

        for ($i = 0; $i < $hit; $i++) {
            $itemData = [
                'id_transaksi' => $transactionId,
                'kode_barang' => $kode_barang[$i],
                'jumlah_produk' => $jumlah_produk,
            ];

            if (!$this->TransaksiBarangModel->insert($itemData)) {
                $success = false;
                log_message('error', 'Failed to insert transaksi_barang: ' . json_encode($itemData));
                break;
            } else {
                $barang = $this->BarangModel->where('kode_barang', $kode_barang[$i])->first();
                if ($barang) {
                    $new_stok = $barang['stok'] - $jumlah_produk;
                    if ($new_stok < 0) {
                        $success = false;
                        log_message('error', 'Stok tidak mencukupi untuk barang: ' . json_encode($barang));
                        break;
                    } else {
                        $this->BarangModel->update($barang['idbarang'], ['stok' => $new_stok]);
                    }
                } else {
                    $success = false;
                    log_message('error', 'Barang tidak ditemukan: ' . $kode_barang[$i]);
                    break;
                }
            }
        }

        if ($success) {
            $this->db->transComplete();
            if ($this->db->transStatus() === false) {
                session()->setFlashdata('err', 'Gagal menyimpan transaksi.');
            } else {
                session()->setFlashdata('message', 'Berhasil Ditambahkan.');
            }
        } else {
            $this->db->transRollback();
            session()->setFlashdata('err', 'Gagal menambahkan data.');
        }

        return $this->redirectAfterOperation();
        } else {
            return redirect()->to(base_url('Auth/error'));
        }
    }

    public function getPrice()
    {
        $kode_barang = $this->request->getPost('kode_barang');
        $data_barang = $this->BarangModel->getDataWithJoin($kode_barang);

        if ($data_barang) {
            return $this->response->setJSON($data_barang);
        } else {
            return $this->response->setJSON(['error' => 'Barang tidak ditemukan']);
        }
    }

    public function detail($id)
    {
        $barang = $this->TransaksiBarangModel->where('id_transaksi', $id)->getAllDataWithJoin();
        $data = ['barang' => $barang];

        $role = session()->get('level');
        echo view('components/header');
        echo view('components/navbar');
        if ($role == 4) {
            echo view('super_admin/sidebar');
            echo view('admin/detail_transaksi', $data);
            echo view('components/js');
            echo view('components/footer');
        } elseif ($role == 3) {
            echo view('admin/sidebar');
            echo view('admin/detail_transaksi', $data);
            echo view('components/js');
            echo view('components/footer');
        } else {
            return redirect()->to(base_url('Auth/error'));
        }
    }

    protected function redirectAfterOperation()
    {
        $role = session()->get('level');
        if ($role == 4) {
            return redirect()->to(base_url('transaksi'));
        } else {
            return redirect()->to(base_url('transaksi'));
        }
    }

    public function acc_pemesanan()
    {
        $id_status_laporan = $this->request->uri->getSegment(3);
        // menentukan nilai id laporan
        $id_permohonan = $this->request->getPost("id_permohonan");
        $idlaporan = $this->request->getPost("idlaporan");
        $idakun = session()->get("idakun");
        $alasan = $this->request->getPost("alasan");
        
        // Load model
        $approvalModel = new Approval_m(); // Sesuaikan dengan model yang Anda gunakan
        
        // update permohonan
        // tambah history permohonan
        if ($id_status_laporan == 2) {
            $hasil = $approvalModel->confirm_laporan_gl($id_permohonan, $id_status_laporan, $alasan);
            $update_history = $approvalModel->add_history($id_permohonan, $id_status_laporan, $alasan, 12, $idakun);
        } elseif ($id_status_laporan == 3) {
            $hasil = $approvalModel->confirm_laporan_gl($idlaporan, $id_status_laporan, $alasan);
            $update_history = $approvalModel->add_history($idlaporan, $id_status_laporan, $alasan, 13, $idakun);
        }

        if ($hasil === false) {
            session()->setFlashdata('eror_input', 'eror_input');
        } else { // Update level persetujuan jika status disetujui oleh GL
            session()->setFlashdata('input', 'input');
            return redirect()->to(base_url('approval')); // Redirect ke halaman riwayat laporan GL
        }
    }
}
