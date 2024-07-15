<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\KeranjangModel;
use App\Models\MerkModel;
use App\Models\JenisModel;
use App\Models\TransaksiModel;
use App\Models\TransaksiBarangModel;

class Keranjang extends BaseController
{
    protected $BarangModel;
    protected $KeranjangModel;
    protected $MerkModel;
    protected $JenisModel;
    protected $TransaksiModel;
    protected $TransaksiBarangModel;

    public function __construct()
    {
        $this->BarangModel = new BarangModel();
        $this->KeranjangModel = new KeranjangModel(); // Load model KeranjangModel
        $this->MerkModel = new MerkModel();
        $this->JenisModel = new JenisModel();
        $this->TransaksiModel = new TransaksiModel();
        $this->TransaksiBarangModel = new TransaksiBarangModel();
    }

    public function index()
    {
        $role = session()->get('level');
        if ($role == 2) {
            $all_data_barang = $this->KeranjangModel
                ->select('keranjang.*, barang.*')
                ->join('barang', 'keranjang.idbarang = barang.idbarang', 'LEFT')
                ->findAll();

            $merks = $this->MerkModel->findAll();
            $jenisB = $this->JenisModel->findAll();
            // var_dump($all_data_barang);exit;

            echo view('pelanggan/keranjang', ['all_data_barang' => $all_data_barang, 'merks' => $merks, 'jenisB' => $jenisB]); // Teruskan data ke view

        } else {
            return redirect()->to(base_url('Auth/error'));
        }
    }

    public function addToCart($idbarang)
{
    

    // Simpan ke tabel keranjang
    $data = [
        'idpelanggan' => 1, // Sesuaikan dengan session pelanggan Anda
        'idbarang' => $idbarang, // Sesuaikan dengan struktur tabel Anda
        'jumlah' => 0, // Default jumlah
    ];



    if ($this->KeranjangModel->insert($data)) {
        echo "Product added to cart successfully";
    } else {
        echo "Failed to add product to cart";
    }
}

public function checkout()
{
    // Simpan data dari keranjang ke tabel transaksi dan detail transaksi
    $idpelanggan = 1; // Sesuaikan dengan session pelanggan Anda

    // Simpan data ke tabel transaksi
    $transaksiData = [
        'idpelanggan' => $idpelanggan,
        'tgl_transaksi' => date('Y-m-d H:i:s'),
        'status_transaksi' => 'Tunggu Konfirmasi',
    ];

    try {
        // Mulai transaksi jika diperlukan
        $this->db->transStart();

        // Simpan data transaksi
        $this->TransaksiModel->insert($transaksiData);
        $idtransaksi = $this->TransaksiModel->getInsertID();

        // Simpan detail transaksi
        $selectedItems = $this->request->getPost('selected_items');
        $jumlahProduk = $this->request->getPost('jumlah');
        $totalHarga = 0; // Inisialisasi total harga

        foreach ($selectedItems as $i => $kode_barang) {
            // Ambil harga barang dari database (asumsi dari TransaksiBarangModel)
            $hargaBarang = $this->TransaksiBarangModel->getHargaBarang($kode_barang); // Anda perlu menyesuaikan method ini dengan model yang sesuai

            $detailData = [
                'id_transaksi' => $idtransaksi,
                'kode_barang' => $kode_barang,
                'jumlah_produk' => $jumlahProduk[$i],
                'harga' => $hargaBarang, // Simpan harga barang di tabel transaksi barang
            ];

            $this->TransaksiBarangModel->insert($detailData);

            // Hitung total harga transaksi
            $totalHarga += $jumlahProduk[$i] * $hargaBarang;
        }

        // Update total harga ke dalam data transaksi
        $transaksiData['total_harga'] = $totalHarga;
        $this->TransaksiModel->update($idtransaksi, $transaksiData);

        // Hapus produk dari keranjang (misalnya dengan memanggil model yang sesuai)
        $this->KeranjangModel->deleteCheckedOutProducts($idpelanggan, $selectedItems);

        // Selesaikan transaksi jika diperlukan
        $this->db->transComplete();

        // Set pesan sukses
        session()->setFlashdata('success', 'Checkout berhasil.');

        // Redirect ke halaman pemesanan atau halaman lain yang sesuai
        return redirect()->to(base_url('/pemesanan'));
    } catch (\Exception $e) {
        // Rollback transaksi jika ada kesalahan
        // $this->db->transRollback();

        // Set pesan kesalahan
        session()->setFlashdata('error', 'Gagal melakukan checkout.');

        // Tampilkan pesan kesalahan atau log ke file jika diperlukan
        log_message('error', $e->getMessage());

        // Redirect ke halaman keranjang atau halaman lain yang sesuai
        return redirect()->to(base_url('/keranjang'));
    }
}

}
