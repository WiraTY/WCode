<?php

namespace App\Models;

use CodeIgniter\Model;

class Topik_model extends Model
{
    protected $table = 'tb_topik';
    protected $primaryKey = 'id_topik';
    protected $allowedFields = ['id_materi','nama_topik', 'penjelasan', 'code'];
}
