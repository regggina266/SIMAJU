<?php

namespace App\Models;

use CodeIgniter\Model;

class MerkModel extends Model
{
    protected $table = 'merk';
    protected $primaryKey = 'idmerk';
    protected $allowedFields = ['nama_merk','kode_merk'];
}
