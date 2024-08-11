<?php
// app/Models/PomodoroModel.php
namespace App\Models;

use CodeIgniter\Model;

class Pomodoro_model extends Model
{
    protected $table = 'tb_pomodoro';
    protected $primaryKey = 'id_pomodoro';
    protected $allowedFields = [
        'id_user',
        'total_waktu_pomodoro',
        'total_waktu_istirahat',
        'total_sesi_pomodoro',
        'harian_waktu_pomodoro',
        'harian_waktu_istirahat',
        'harian_sesi_pomodoro',
    ];

    public function averageStudyTime()
    {
        $query = $this->selectAvg('total_waktu_pomodoro')->get();
        return round($query->getRow()->total_waktu_pomodoro);
    }

    public function averageRestTime()
    {
        $query = $this->selectAvg('total_waktu_istirahat')->get();
        return round($query->getRow()->total_waktu_istirahat);
    }

    public function averageSession()
    {
        $query = $this->selectAvg('total_sesi_pomodoro')->get();
        return round($query->getRow()->total_sesi_pomodoro);
    }
}
