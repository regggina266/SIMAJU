<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'idpembayaran';
    protected $allowedFields = ['nama_bank', 'no_bank', 'atas_nama'];

    //tampil data
    public function AllData()
    {
         return $this->db->table('pembayaran')
         ->orderBy('idpembayaran','DESC')
         ->Get()->getResultArray();
    }
    
    //tambah data
    public function Add($data)
    {
        $this->db->table('pembayaran')->insert($data);
    }

    public function update_pelanggan($id, $nama_bank, $no_bank, $atas_nama)
    {
        $builder = $this->db->table('pembayaran');
        $builder->where('idpembayaran', $id);
        $data = [
            'nama_bank' => $nama_bank,
            'no_bank' => $no_bank,
            'atas_nama' => $atas_nama
        ];
        $builder->set($data); // Menggunakan set() untuk menentukan nilai yang ingin diupdate
        $builder->update(); // Memanggil update() tanpa parameter

        if ($this->db->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_pembayaran($idpembayaran)
    {
        $this->db->table('pembayaran')
            ->where('idpembayaran', $idpembayaran)
            ->delete();

        if ($this->db->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
