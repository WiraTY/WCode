<?php

namespace App\Models;

use CodeIgniter\Model;

class Pembelajaran_model extends Model
{
    protected $table = 'tb_pembelajaran';
    protected $primaryKey = 'id_pembelajaran';
    protected $allowedFields = ['id_user', 'id_materi', 'id_topik', 'id_kuis', 'status_pembelajaran'];

    public function getUsernameWithMostKuis()
    {
        $builder = $this->db->table($this->table);
        $builder->select('id_user, COUNT(id_kuis) as kuis_count');
        $builder->where('id_kuis IS NOT NULL AND id_kuis !=', 0);
        $builder->groupBy('id_user');
        $builder->orderBy('kuis_count', 'DESC');
        $builder->orderBy('id_user', 'ASC');
        $builder->limit(1);

        $query = $builder->get();
        $row = $query->getRow();

        if ($row) {
            return $row->id_user;
        }

        return null;
    }

    public function countUsersByTopik()
    {
        // Query untuk menghitung jumlah "id_user" yang membuka setiap topik
        $builder = $this->db->table($this->table);
        $builder->select('tb_pembelajaran.id_topik, COUNT(DISTINCT tb_pembelajaran.id_user) as jumlah_user, tb_topik.nama_topik');
        $builder->join('tb_topik', 'tb_topik.id_topik = tb_pembelajaran.id_topik');
        $builder->groupBy('tb_pembelajaran.id_topik');
        $result = $builder->get()->getResultArray();

        return $result;
    }

    public function countUsersByKuis()
    {
        $builder = $this->db->table('tb_kuis');
        $builder->select('tb_kuis.id_topik, COUNT(DISTINCT tb_pembelajaran.id_user) AS jumlah_user');
        $builder->join('tb_pembelajaran', 'tb_kuis.id_topik = tb_pembelajaran.id_kuis', 'left');
        $builder->groupBy('tb_kuis.id_topik');
        $result = $builder->get()->getResultArray();

        return $result;
    }

    public function getTopikWithAverageKuisScore()
    {
        // Query untuk mengambil rata-rata nilai kuis untuk setiap topik beserta id materi dan nama topik
        $builder = $this->db->table('tb_kuis');
        $builder->select('tb_kuis.id_topik, tb_topik.id_materi, tb_topik.nama_topik, AVG(tb_kuis.nilai) as rata_nilai_kuis');
        $builder->join('tb_topik', 'tb_topik.id_topik = tb_kuis.id_topik');
        $builder->groupBy('tb_kuis.id_topik');
        $result = $builder->get()->getResultArray();

        return $result;
    }
}
