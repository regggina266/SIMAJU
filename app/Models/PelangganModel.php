<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{

    protected $table = 'pelanggan'; // Nama tabel di database
    protected $primaryKey = 'idpelanggan'; // Nama primary key
    protected $allowedFields = ['nama_pelanggan', 'username_pelanggan','password_pelanggan', 'nohp', 'alamat', 'no_ktp', 'foto_ktp']; // Kolom yang dapat diisi

    //tampil data
    public function AllData()
    {
         return $this->db->table('pelanggan')
         ->orderBy('idpelanggan','DESC')
         ->Get()->getResultArray();
    }
    
        //tambah data
        public function Add($data)
        {
            $this->db->table('pelanggan')->insert($data);
        }

        public function update_pelanggan($id, $nama_pelanggan, $nohp, $alamat)
        {
            $builder = $this->db->table('pelanggan');
            $builder->where('idpelanggan', $id);
            $data = [
                'nama_pelanggan' => $nama_pelanggan,
                'nohp' => $nohp,
                'alamat' => $alamat
            ];
            $builder->set($data); // Menggunakan set() untuk menentukan nilai yang ingin diupdate
            $builder->update(); // Memanggil update() tanpa parameter

            if ($this->db->affectedRows() > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function delete_pelanggan($idpelanggan)
        {
            $this->db->table('pelanggan')
                ->where('idpelanggan', $idpelanggan)
                ->delete();

            if ($this->db->affectedRows() > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function getPelangganByName($nama_pelanggan)
    {
        return $this->where('nama_pelanggan', $nama_pelanggan)->first();
    }

    public function getJumlahPelanggan()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(*) as jumlah FROM pelanggan");
        return $query->getRow()->jumlah;
    }
}    