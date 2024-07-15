<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisModel extends Model
{
    protected $table = 'jenis_barang';
    protected $primaryKey = 'idjenis';
    protected $allowedFields = ['nama_jenis','kode_jenis','idmerk'];
}
