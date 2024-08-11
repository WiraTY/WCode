<?php
// app/Controllers/PomodoroController.php
namespace App\Controllers;

use App\Models\Pomodoro_model;

class Pomodoro extends BaseController
{
    public function updateStudyTime()
    {
        $authService = service('authentication');
        $userId = $authService->id();

        $pomodoroModel = new Pomodoro_model();

        // Mendapatkan data JSON dari body permintaan
        $json = $this->request->getJSON();

        // Mendapatkan timer dari data JSON
        $timer = $json->timer;

        // Dapatkan data Pomodoro pengguna dari database
        $userData = $pomodoroModel->where('id_user', $userId)->first();

        if (!$userData) {
            // Jika data Pomodoro belum ada, buat data baru untuk pengguna
            $userData = [
                'id_user' => $userId,
                'total_waktu_pomodoro' => 0,
                'total_waktu_istirahat' => 0,
                'total_sesi_pomodoro' => 0,
                'harian_waktu_pomodoro' => 0,
                'harian_waktu_istirahat' => 0,
                'harian_sesi_pomodoro' => 0,
            ];
            $pomodoroModel->insert($userData);
        }

        // Perbarui data Pomodoro berdasarkan logika timer Anda
        $userData['total_waktu_pomodoro'] += $timer->pomodoro;
        $userData['total_sesi_pomodoro'] += 1;

        // Periksa apakah ini hari baru
        $lastUpdateDate = new \DateTime($userData['updated_at']);
        $currentDate = new \DateTime();

        if ($lastUpdateDate->format('Y-m-d') !== $currentDate->format('Y-m-d')) {
            $userData['harian_waktu_pomodoro'] = 0;
            $userData['harian_waktu_istirahat'] = 0;
            $userData['harian_sesi_pomodoro'] = 0;
        }

        // Update data harian
        $userData['harian_waktu_pomodoro'] += $timer->pomodoro;
        $userData['harian_sesi_pomodoro'] += 1;

        // Update database dengan data Pomodoro yang baru
        $pomodoroModel->update($userData['id_pomodoro'], $userData);

        // Return a response if needed
        return $this->response->setJSON(['success' => true]);
    }

    public function updateBreakTime()
    {
        $authService = service('authentication');
        $userId = $authService->id();

        $pomodoroModel = new Pomodoro_model();

        // Mendapatkan data JSON dari body permintaan
        $json = $this->request->getJSON();

        // Mendapatkan timer dari data JSON
        $timer = $json->timer;

        // Dapatkan data Pomodoro pengguna dari database
        $userData = $pomodoroModel->where('id_user', $userId)->first();

        if (!$userData) {
            // Jika data Pomodoro belum ada, buat data baru untuk pengguna
            $userData = [
                'id_user' => $userId,
                'total_waktu_pomodoro' => 0,
                'total_waktu_istirahat' => 0,
                'total_sesi_pomodoro' => 0,
                'harian_waktu_pomodoro' => 0,
                'harian_waktu_istirahat' => 0,
                'harian_sesi_pomodoro' => 0,
            ];
            $pomodoroModel->insert($userData);
        }

        // Perbarui data Pomodoro berdasarkan logika timer Anda
        $userData['total_waktu_istirahat'] += $timer->shortBreak;

        // Periksa apakah ini hari baru
        $lastUpdateDate = new \DateTime($userData['updated_at']);
        $currentDate = new \DateTime();

        if ($lastUpdateDate->format('Y-m-d') !== $currentDate->format('Y-m-d')) {
            $userData['harian_waktu_pomodoro'] = 0;
            $userData['harian_waktu_istirahat'] = 0;
            $userData['harian_sesi_pomodoro'] = 0;
        }

        // Update data harian
        $userData['harian_waktu_istirahat'] += $timer->shortBreak;

        // Update database dengan data Pomodoro yang baru
        $pomodoroModel->update($userData['id_pomodoro'], $userData);

        // Return a response if needed
        return $this->response->setJSON(['success' => true]);
    }
}
