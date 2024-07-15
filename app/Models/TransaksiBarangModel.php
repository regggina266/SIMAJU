<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiBarangModel extends Model
{
    protected $table = 'transaksi_barang'; // Nama tabel di database
    protected $primaryKey = 'id_transaksi_barang'; // Nama primary key
    protected $allowedFields = ['id_transaksi', 'kode_barang', 'jumlah_produk']; // Kolom yang dapat diisi

    public function getAllDataWithJoin()
    {
        $a=$this->select('transaksi_barang.*, barang.*,merk.*,jenis_barang.*')
                    ->join('barang', 'transaksi_barang.kode_barang = barang.kode_barang')
                    ->join('merk', 'merk.idmerk = barang.idmerk')
                    ->join('jenis_barang', 'barang.idjenis = jenis_barang.idjenis')
                    ->groupBy('transaksi_barang.id_transaksi')
                    ->findAll();
                    // var_dump($a);exit;
                    return $a;
    }
    
    public function create($data)
    {
        return $this->insert($data);
    }

    public function insertDetailTransaksi($data)
    {
        return $this->insert($data);
    }

    public function getHargaBarang($kode_barang)
    {
        // Gantikan ini dengan logika Anda untuk mengambil harga barang dari database
        // Contoh sederhana: ambil dari tabel barang berdasarkan kode barang
        $query = $this->db->table('barang')
                        ->select('harga')
                        ->where('kode_barang', $kode_barang)
                        ->get();
        
        $result = $query->getRow();
        
        if ($result) {
            return $result->harga;
        } else {
            return 0; // Atau nilai default jika tidak ditemukan
        }
    }
    
}



