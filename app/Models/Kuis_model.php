<?php

namespace App\Models;

use CodeIgniter\Model;

class Kuis_model extends Model
{
    protected $table = 'tb_kuis';
    protected $primaryKey = 'id_kuis';
    protected $allowedFields = [
        'id_topik',
        'no_soal',
        'soal',
        'a',
        'b',
        'c',
        'd',
        'e',
        'kunci',
    ];

    public function getKunciJawaban($id_topik)
    {
        return $this->select('id_kuis, kunci')
            ->where('id_topik', $id_topik)
            ->get()
            ->getResultArray();
    }

    public function getKuisByTopik($id_topik)
    {
        return $this->where('id_topik', $id_topik)
            ->findAll();
    }
}
