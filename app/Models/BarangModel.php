<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'idbarang';
    protected $allowedFields = [
        'nama_barang',
        'kode_barang',
        'kode_warna',
        'kuantitas',
        'harga',
        'stok',
        'status',
        'gambar',
        'idmerk',
        'idjenis'
    ];

    public function getDataWithJoin($kode_barang)
    {
        return $this->select('barang.*, merk.nama_merk, jenis_barang.nama_jenis')
                    ->join('merk', 'merk.idmerk = barang.idmerk')
                    ->join('jenis_barang', 'jenis_barang.idjenis = barang.idjenis')
                    ->where('barang.kode_barang', $kode_barang)
                    ->first();
    }

    public function getJumlahBarang()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(*) as jumlah FROM barang");
        return $query->getRow()->jumlah;
    }
}
