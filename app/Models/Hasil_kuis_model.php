<?php

namespace App\Models;

use CodeIgniter\Model;

class Hasil_kuis_model extends Model
{
    protected $table = 'tb_hasil_kuis';
    protected $primaryKey = 'id_hasil_kuis';
    protected $allowedFields = ['id_topik', 'id', 'jawaban',  'skor', 'created_at'];

    public function getSkorByUserId($userId)
    {
        // Subquery untuk mendapatkan waktu terbaru untuk setiap id_topik
        $subquery = $this->db->table('tb_hasil_kuis')
            ->select('id_topik, MAX(created_at) as latest_created_at')
            ->where('id', $userId)
            ->groupBy('id_topik')
            ->getCompiledSelect();

        // Ambil skor, id_topik, dan nama_topik dari tb_hasil_kuis dan tb_topik
        $query = $this->select('tb_hasil_kuis.id, tb_hasil_kuis.id_topik, tb_hasil_kuis.skor, tb_hasil_kuis.created_at, tb_topik.nama_topik')
            ->join('tb_topik', 'tb_topik.id_topik = tb_hasil_kuis.id_topik')
            ->join("($subquery) latest", 'latest.id_topik = tb_hasil_kuis.id_topik AND latest.latest_created_at = tb_hasil_kuis.created_at', 'LEFT')
            ->where('tb_hasil_kuis.created_at = latest.latest_created_at') // Hanya ambil data dengan created_at sesuai dengan yang paling baru
            ->findAll();

        return $query;
    }

    public function getHasilKuisTerbaru($id_topik, $id_pengguna)
    {
        return $this->where(['id_topik' => $id_topik, 'id' => $id_pengguna])
            ->orderBy('created_at', 'DESC') // Order by timestamp in descending order
            ->first();
    }

    public function getAllUsers()
    {
        return $this->db->table('users')->get()->getResultArray();
    }

    public function getSkorByTopikId($id_topik)
    {
        return $this->select('tb_hasil_kuis.*, users.username')
            ->join('users', 'users.id = tb_hasil_kuis.id')
            ->where('tb_hasil_kuis.id_topik', $id_topik)
            ->findAll();
    }

    public function getAllSkorAndUsernameByTopikId($id_topik)
    {
        return $this->select('tb_hasil_kuis.id, users.username, tb_hasil_kuis.skor, tb_hasil_kuis.created_at')
            ->join('users', 'users.id = tb_hasil_kuis.id', 'left')
            ->where('tb_hasil_kuis.id_topik', $id_topik)
            ->findAll();
    }

    public function getLatestScoresByUserId($userId)
    {
        $query = $this->db->table('tb_hasil_kuis')
            ->select('tb_topik.id_topik, tb_topik.id_materi, tb_topik.nama_topik, tb_hasil_kuis.created_at, MAX(tb_hasil_kuis.skor) AS skor')
            ->join('tb_topik', 'tb_topik.id_topik = tb_hasil_kuis.id_topik')
            ->where('tb_hasil_kuis.id', $userId)
            ->orderBy('tb_hasil_kuis.created_at', 'DESC')
            ->groupBy('tb_hasil_kuis.id_topik')
            ->get()
            ->getResultArray();

        return $query;
    }

    public function getTopikWithAverageLatestKuisScore()
    {
        // Subquery untuk mendapatkan nilai kuis terbaru untuk setiap pengguna
        $subquery = $this->db->table('tb_hasil_kuis')
            ->select('id_topik, id, MAX(created_at) as latest_created_at')
            ->groupBy('id_topik, id')
            ->getCompiledSelect();

        // Query untuk mengambil rata-rata nilai kuis terbaru untuk setiap topik beserta id materi dan nama topik
        $builder = $this->db->table('tb_hasil_kuis');
        $builder->select('tb_topik.id_materi, tb_hasil_kuis.id_topik, tb_hasil_kuis.id_topik, tb_topik.nama_topik, AVG(tb_hasil_kuis.skor) as rata_nilai_kuis');
        $builder->join('tb_topik', 'tb_topik.id_topik = tb_hasil_kuis.id_topik');
        $builder->join("($subquery) as latest_scores", 'tb_hasil_kuis.id = latest_scores.id AND tb_hasil_kuis.created_at = latest_scores.latest_created_at');
        $builder->groupBy('tb_hasil_kuis.id_topik');

        $result = $builder->get()->getResultArray();

        return $result;
    }
}
