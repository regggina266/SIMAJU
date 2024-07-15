<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi'; // Nama tabel di database
    protected $primaryKey = 'idtransaksi'; // Nama primary key
    protected $useAutoIncrement = true;
    protected $allowedFields = ['tgl_transaksi', 'jumlah_produk', 'jenis_pembayaran', 'total_harga', 'idakun', 'idpelanggan']; // Kolom yang dapat diisi

    public function AllData()
    {
        return $this->select('transaksi.*, akun.nama, pelanggan.nama_pelanggan')
                ->join('akun', 'akun.idakun = transaksi.idakun')
                ->join('pelanggan', 'pelanggan.idpelanggan = transaksi.idpelanggan')
                ->findAll();
    }

    public function getAllDataWithJoin()
    {
        return $this->select('transaksi.*, akun.nama, pelanggan.nama_pelanggan, barang.*, merk.nama_merk, jenis_barang.nama_jenis, transaksi_barang.*')
                    ->join('akun', 'akun.idakun = transaksi.idakun')
                    ->join('pelanggan', 'pelanggan.idpelanggan = transaksi.idpelanggan')
                    ->join('transaksi_barang', 'transaksi_barang.id_transaksi = transaksi.idtransaksi')
                    ->join('barang', 'transaksi_barang.kode_barang = barang.kode_barang')
                    ->join('merk', 'merk.idmerk = barang.idmerk')
                    ->join('jenis_barang', 'barang.idjenis = jenis_barang.idjenis')
                    ->findAll();
    }
    
    public function getJumlahTransaksiPerHari()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(*) as jumlah FROM transaksi WHERE DATE(tgl_transaksi) = CURDATE()");
        return $query->getRow()->jumlah;
    }

    //tambah data
    public function Add($data)
    {
        $this->insert($data);
            return $this->insertID();
    }
}


