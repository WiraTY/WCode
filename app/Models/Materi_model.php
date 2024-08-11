<?php

namespace App\Models;

use CodeIgniter\Model;

class Materi_model extends Model
{
    protected $table = 'tb_materi';
    protected $primaryKey = 'id_materi';
    protected $allowedFields = ['nama_materi'];
}
