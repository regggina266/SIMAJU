<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table = 'transaksi'; // Nama tabel di database
    protected $primaryKey = 'idtransakksi'; // Nama primary key
    protected $allowedFields = ['tgl_transaksi', 'jumlah_produk', 'total_harga', 'jenis_pembayaran', 'idakun', 'idpelanggan', 'idbarang']; // Kolom yang dapat diisi

    public function AllData()
    {
        return $this->select('transaksi.*, akun.nama, pelanggan.nama_pelanggan, barang.kode_barang, barang.harga')
                ->join('akun', 'akun.idakun = transaksi.idakun')
                ->join('pelanggan', 'pelanggan.idpelanggan = transaksi.idpelanggan')
                ->join('barang', 'barang.idbarang = transaksi.idbarang')
                ->findAll();
    }

    public function getJumlahLaporanPerHari()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(*) as jumlah FROM laporan WHERE DATE(tgl_transaksi) = CURDATE()");
        return $query->getRow()->jumlah;
    }

    //tambah data
    public function Add($data)
    {
        $this->insert($data);
            return $this->insertID();
    }

}


