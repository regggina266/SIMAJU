<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangModel extends Model
{
    protected $table = 'keranjang'; // Nama tabel di database
    protected $primaryKey = 'idkeranjang'; // Nama primary key
    protected $allowedFields = ['jumlah', 'idbarang', 'idpelanggan']; // Kolom yang dapat diisi

    public function addToCart($data)
    {
        return $this->insert($data);
    }

    public function deleteCheckedOutProducts($idpelanggan, $selectedItems)
    {
        // Hapus produk yang sudah dicheckout berdasarkan $idpelanggan dan $selectedItems
        $this->whereIn('kode_barang', $selectedItems)
             ->where('idpelanggan', $idpelanggan)
             ->delete();
    }
}
