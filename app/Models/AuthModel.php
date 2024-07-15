<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'akun'; // Sesuaikan dengan nama tabel di database Anda
    protected $primaryKey = 'idakun';
    protected $allowedFields = ['nama', 'level', 'username', 'password'];

    public function login($username, $password)
    {
        // Ambil data pengguna berdasarkan username
        $user = $this->db->table($this->table)->where('username', $username)->get()->getRowArray();

        // Jika pengguna ditemukan dan password verifikasi berhasil
        if ($user && password_verify($password, $user['password'])) {
            return $user; // Mengembalikan data pengguna jika berhasil login
        }

        return false; // Mengembalikan false jika login gagal
    }
}