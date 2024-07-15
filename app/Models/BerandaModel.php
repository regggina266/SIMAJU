<?php

namespace App\Models;

use CodeIgniter\Model;

class BerandaModel extends Model
{
    public function getJumlahTransaksiPerHari()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(*) as jumlah FROM transaksi WHERE DATE(tgl_transaksi) = CURDATE()");
        return $query->getRow()->jumlah;
    }

    public function getJumlahLaporanPerHari()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(*) as jumlah FROM laporan WHERE DATE(tgl_transaksi) = CURDATE()");
        return $query->getRow()->jumlah;
    }

    public function getJumlahBarang()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(*) as jumlah FROM barang");
        return $query->getRow()->jumlah;
    }
}