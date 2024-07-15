<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunModel extends Model
{
    protected $table = 'akun';
    protected $primaryKey = 'idakun';
    protected $allowedFields = ['nama', 'level', 'username', 'password'];

    // Tampil data
    public function AllData()
    {
        return $this->db->table('akun')
            ->orderBy('idakun', 'DESC')
            ->get()->getResultArray();
    }

    public function update_akun($id, $nama, $level, $username, $password)
    {
        $data = [
            'nama' => $nama,
            'level' => $level,
            'username' => $username,
            'password' => $password
        ];

        $this->where('idakun', $id)->set($data)->update();
        
        return $this->db->affectedRows() > 0;
    }

    public function delete_akun($idakun)
    {
        $this->where('idakun', $idakun)->delete();

        return $this->db->affectedRows() > 0;
    }

    // Metode untuk mendapatkan username berdasarkan idakun
    public function getusername($idakun)
    {
        return $this->select('username')->where('idakun', $idakun)->get()->getRow();
    }

    public function getJumlahAkun()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(*) as jumlah FROM akun");
        return $query->getRow()->jumlah;
    }
}
