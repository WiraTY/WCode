<?php

namespace App\Controllers;

use App\Models\Materi_model;
use App\Models\Topik_model;
use App\Models\Kuis_model;
use App\Models\Hasil_kuis_model;
use App\Models\Pembelajaran_model;
use App\Models\Pomodoro_model;
use Myth\Auth\Config\Auth;
use Myth\Auth\Models\UserModel;
use Config\Services;


class Materi extends BaseController
{

	protected $kuisModel;

	public function __construct()
	{
		$this->kuisModel = new Kuis_model();
	}

	public function index()
	{
		// Load models
		$materiModel = new Materi_model();
		$topikModel = new Topik_model();
		$kuisModel = new Kuis_model();
		$pembelajaranModel = new Pembelajaran_model();

		// Mengambil ID pengguna yang sedang login
		$id_pengguna = service('authentication')->id();

		// Menghitung jumlah topik yang sudah dibuka oleh user (hanya dihitung satu kali jika sama)
		$jumlahTopikSelesai = count(
			$pembelajaranModel
				->distinct()
				->select('id_topik')
				->where(['id_user' => $id_pengguna, 'status_pembelajaran' => 1, 'id_topik !=' => null])
				->findAll()
		);

		// Menghitung jumlah kuis yang sudah dibuka oleh user
		$jumlahKuisSelesai = $pembelajaranModel
			->where(['id_user' => $id_pengguna, 'status_pembelajaran' => 1, 'id_kuis !=' => 0])
			->countAllResults();

		// Menghitung total jumlah materi, topik, dan kuis
		$jumlahMateri = $materiModel->countAll();
		$jumlahTopik = $topikModel->countAll();
		$jumlahKuis = $kuisModel->countAll();

		// Mengecek apakah semua topik dalam suatu materi telah selesai
		$materiSelesai = [];
		$semuaMateri = $materiModel->findAll();

		foreach ($semuaMateri as $materi) {
			$topikMateri = $topikModel->where('id_materi', $materi['id_materi'])->findAll();

			// Mendapatkan array id_topik yang sesuai dengan id_materi
			$idTopikMateri = array_column($topikMateri, 'id_topik');

			// Memeriksa apakah semua id_topik untuk suatu materi sudah ada di Pembelajaran_model
			$isMateriSelesai = $pembelajaranModel
				->where(['id_user' => $id_pengguna, 'status_pembelajaran' => 1])
				->whereIn('id_topik', $idTopikMateri)
				->groupBy('id_materi')
				->having('COUNT(DISTINCT id_topik)', count($idTopikMateri))
				->countAllResults() > 0;

			$materiSelesai[$materi['id_materi']] = $isMateriSelesai;
		}

		$materiModel = new Materi_model();

		// Load model tb_pembelajaran
		$pembelajaranModel = new Pembelajaran_model();

		// Get current user
		$userModel = new UserModel();
		$currentUser = $userModel->find(session()->get('id'));

		// Fetch all materis and their learning status for the current user
		$materis = $materiModel->findAll();
		foreach ($materis as &$materi) {
			// Check if the user has already opened this material
			$isOpened = $pembelajaranModel->where(['id_materi' => $materi['id_materi'], 'id_user' => $currentUser->id])->first();
			$materi['status_pembelajaran'] = ($isOpened) ? 1 : 0;
		}

		// Kirim data ke beranda
		$data = [
			'jumlahMateri' => $jumlahMateri,
			'jumlahTopik' => $jumlahTopik,
			'jumlahKuis' => $jumlahTopik,
			'jumlahTopikSelesai' => $jumlahTopikSelesai,
			'jumlahKuisSelesai' => $jumlahKuisSelesai,
			'materiSelesai' => $materiSelesai,
			'materis' => $materis,
		];

		return view('siswa/beranda', $data);
	}

	public function materi()
	{
		$materiModel = new Materi_model();

		// Load model tb_pembelajaran
		$pembelajaranModel = new Pembelajaran_model();

		// Get current user
		$userModel = new UserModel();
		$currentUser = $userModel->find(session()->get('id'));

		// Fetch all materis and their learning status for the current user
		$materis = $materiModel->findAll();
		foreach ($materis as &$materi) {
			// Check if the user has already opened this material
			$isOpened = $pembelajaranModel->where(['id_materi' => $materi['id_materi'], 'id_user' => $currentUser->id])->first();
			$materi['status_pembelajaran'] = ($isOpened) ? 1 : 0;
		}

		$data = [
			'materis' => $materis,
		];

		helper('text');

		return view('siswa/index', $data);
	}

	public function waktu_belajar()
	{
		$id_user = session()->get('id');
		$pomodoroModel = new Pomodoro_model();
		$waktuBelajarData = $pomodoroModel->where('id_user', $id_user)->first();

		$data = ['waktuBelajarData' => $waktuBelajarData, 'noData' => empty($waktuBelajarData)];
		return view('siswa/waktu_belajar', $data);
	}

	public function topik($id_materi)
	{
		// Load models
		$topikModel = new Topik_model();
		$materiModel = new Materi_model();
		$pembelajaranModel = new Pembelajaran_model();

		// Get current user
		$userModel = new UserModel();
		$currentUser = $userModel->find(session()->get('id'));

		// Fetch topiks for the selected materi
		$data['topiks'] = $topikModel->where('id_materi', $id_materi)->findAll();
		$data['id_materi'] = $id_materi;

		// Fetch materi information
		$data['materis'] = $materiModel->find($id_materi);

		// Check if the user has already opened this material
		$isOpened = $pembelajaranModel->where(['id_materi' => $id_materi, 'id_user' => $currentUser->id])->first();

		// If not opened yet, record it
		if (!$isOpened) {
			// Retrieve id_topik from the first topik associated with the materi
			$firstTopik = $topikModel->where('id_materi', $id_materi)->first();
			$id_topik = ($firstTopik) ? $firstTopik['id_topik'] : null;

			$pembelajaranModel->insert([
				'id_materi' => $id_materi,
				'id_user' => $currentUser->id,
				'status_pembelajaran' => 1
			]);
		}

		// Update the status in the data array for each topik
		foreach ($data['topiks'] as &$topik) {
			$isOpened = $pembelajaranModel->where(['id_materi' => $id_materi, 'id_topik' => $topik['id_topik'], 'id_user' => $currentUser->id])->first();
			$topik['status_pembelajaran'] = ($isOpened) ? 1 : 0;
		}

		helper('text');

		return view('siswa/topik', $data);
	}

	public function penjelasan($id_materi, $id_topik)
	{
		// Load models
		$topikModel = new Topik_model();
		$materiModel = new Materi_model();
		$pembelajaranModel = new Pembelajaran_model();

		// Get current user
		$userModel = new UserModel();
		$currentUser = $userModel->find(session()->get('id'));

		// Fetch topik information
		$data['topiks'] = $topikModel->find($id_topik);
		$data['id_topik'] = $id_topik;

		// Fetch materi information
		$data['materis'] = $materiModel->find($id_materi);
		$data['id_materi'] = $id_materi;

		// Check if the user has already opened this topik
		$isOpened = $pembelajaranModel->where(['id_materi' => $id_materi, 'id_topik' => $id_topik, 'id_user' => $currentUser->id])->first();

		// If not opened yet, record it
		if (!$isOpened) {
			$pembelajaranModel->insert([
				'id_materi' => $id_materi,
				'id_topik' => $id_topik,
				'id_user' => $currentUser->id,
				'status_pembelajaran' => 1
			]);
		}

		helper('text');

		return view('siswa/penjelasan', $data);
	}

	public function praktik($id_materi, $id_topik)
	{
		$model = new Topik_model();

		// Mengambil data materi berdasarkan ID materi
		$data['topiks'] = $model->find($id_topik);
		$data['id_topik'] = $id_topik;
		// Mengambil data praktek berdasarkan ID materi
		// $data['praktik'] = $model->find($id_materi); // Asumsikan tabel memiliki kolom "materi_id" yang berkaitan dengan ID materi

		$model = new Materi_model();
		$data['materis'] = $model->find($id_materi);
		$data['id_materi'] = $id_materi;

		return view('siswa/praktik', $data);
	}

	public function kuis($id_materi, $id_topik)
	{
		// Menggunakan model Kuis_model untuk mengambil data kuis yang terkait dengan $id_materi
		$kuisModel = new Kuis_model();
		$data['kuis'] = $kuisModel->where('id_topik', $id_topik)->orderBy('no_soal', 'ASC')->findAll();
		// Kemudian, Anda dapat menggunakan data ini untuk menampilkan kuis di tampilan
		$jumlah_soal = count($data['kuis']);
		$data['id_topik'] = $id_topik;

		$model = new Topik_model();
		$data['topiks'] = $model->find($id_topik);

		$model = new Materi_model();
		$data['materis'] = $model->find($id_materi);
		$data['id_materi'] = $id_materi;
		$data['jumlah_soal'] = $jumlah_soal;
		$data['jawaban_session'] = session()->get('jawaban');
		return view('siswa/kuis', $data);
	}

	public function submit_kuis()
	{
		$id_pengguna = service('authentication')->id();
		$jawaban = $this->request->getPost('jawaban');
		$id_topik = $this->request->getPost('id_topik');

		// Dapatkan id_materi dari Topik_model
		$topikModel = new Topik_model(); // Sesuaikan dengan nama model yang digunakan
		$topikData = $topikModel->find($id_topik);

		if (!$topikData) {
			// Handle jika data topik tidak ditemukan
			return redirect()->to(base_url());
		}

		$id_materi = $topikData['id_materi'];

		// Menggunakan model Kuis_model untuk mendapatkan kunci jawaban

		$kuisModel = new Kuis_model();
		$kunci_jawaban = $this->kuisModel->getKunciJawaban($id_topik); // Gantilah sesuai dengan cara Anda mengambil kunci jawaban

		$waktu = date('Y-m-d H:i:s'); // Waktu saat pengiriman kuis

		$skor = 0; // Initialize the score

		$jumlah_soal = count($kunci_jawaban); // Mendapatkan jumlah soal
		$total_skor_maksimum = 100; // Tetapkan total skor maksimum yang ingin Anda berikan

		// Hitung skor untuk setiap jawaban benar berdasarkan jumlah soal
		$skor_per_jawaban_benar = $total_skor_maksimum / $jumlah_soal;

		foreach ($kunci_jawaban as $kunci) {
			$id_kuis = $kunci['id_kuis'];
			$jawaban_pengguna = isset($jawaban[$id_kuis]) ? $jawaban[$id_kuis] : '';

			// Check if user answer is correct
			if ($jawaban_pengguna === $kunci['kunci']) {
				$skor += $skor_per_jawaban_benar; // Tambahkan skor untuk setiap jawaban benar
				// Update Kuis_model with the calculated score
				try {
					// Update Kuis_model with the calculated score
					$kuisModel->update($id_kuis, ['nilai' => $skor]);
				} catch (\CodeIgniter\Database\Exceptions\DataException $e) {
					// Handle the exception gracefully (log, redirect, etc.)
					// For example, you can log the error message for debugging:
					log_message('error', 'DataException during update: ' . $e->getMessage());
				}
			}
		}
		session()->set('jawaban', $jawaban);
		// Periksa apakah jumlah jawaban yang diterima sama dengan jumlah soal
		if (count($jawaban) !== $jumlah_soal) {
			return redirect()->back()->with('error', 'Pastikan Anda telah menjawab semua pertanyaan.');
		}

		// Simpan data ke dalam tabel tb_hasil_quiz
		$hasilKuisModel = new Hasil_kuis_model();
		$data = [
			'id_topik' => $id_topik,
			'id' => $id_pengguna,
			'jawaban' => json_encode($jawaban),
			'skor' => $skor,
			'time_stamp' => $waktu
		];
		$hasilKuisModel->insert($data);


		// Update tb_pembelajaran dengan id_kuis (dengan pengecekan terlebih dahulu)
		$pembelajaranModel = new Pembelajaran_model();

		// Cek apakah sudah ada data dengan id_kuis yang sama
		$existingData = $pembelajaranModel
			->where(['id_materi' => $id_materi, 'id_user' => $id_pengguna, 'id_topik' => $id_topik, 'id_kuis' => $id_topik])
			->first();

		// Jika data belum ada, lakukan insert
		if (!$existingData) {
			$dataPembelajaran = [
				'id_materi' => $id_materi,
				'id_user' => $id_pengguna,
				'id_topik' => $id_topik,
				'id_kuis' => $id_topik,
				'status_pembelajaran' => 1
			];

			$pembelajaranModel->insert($dataPembelajaran);
		}

		$kuis = $kuisModel->getKuisByTopik($id_topik);

		// Tampilkan skor kepada pengguna atau lakukan redirect ke halaman lain (sesuai kebutuhan Anda)
		$data['jawaban'] = $jawaban; // Tambahkan baris ini untuk mengirim jawaban pengguna ke view
		$data['kunci_jawaban'] = $kunci_jawaban;
		$data['kuis'] = $kuis;
		$data['skor'] = $skor;

		return view('siswa/hasil_kuis', $data);
	}

	public function nilai_kuis()
	{
		// Mendapatkan instance dari Myth/Auth User
		$userModel = new UserModel();
		$user = $userModel->find(session()->get('id'));

		// Mendapatkan ID pengguna yang sedang login
		$idPengguna = !empty($user) ? $user->id : null;

		// Pastikan ID pengguna ditemukan sebelum melanjutkan
		if ($idPengguna) {
			// Buat instance model Hasil_kuis_model
			$hasilKuisModel = new Hasil_kuis_model();

			// Ambil semua skor dari tabel tb_hasil_kuis berdasarkan ID pengguna
			$Datahasil = $hasilKuisModel->getSkorByUserId($idPengguna);

			$noData = empty($Datahasil);

			$data = [
				'Datahasil' => $Datahasil,
				'noData' => $noData,
			];

			// Kirim data ke tampilan di folder 'siswa' dengan nama 'nilai_kuis'
			return view('siswa/nilai_kuis', $data);
		} else {
			// Handle jika ID pengguna tidak ditemukan
			return "ID Pengguna tidak ditemukan.";
		}
	}

	public function lihat_hasil_kuis($id_topik)
	{
		// Get the currently logged-in user ID
		$id_pengguna = service('authentication')->id();

		// Retrieve skor and jawaban based on 'id_topik' and 'id_pengguna'
		$hasilKuisModel = new Hasil_kuis_model();
		$result = $hasilKuisModel->getHasilKuisTerbaru($id_topik, $id_pengguna);

		if (!$result) {
			// Handle if no results found, you can redirect or show an error message
			return redirect()->to(base_url());
		}

		// Retrieve skor directly from the result array
		$skor = $result['skor'];

		// Retrieve jawaban from JSON encoded data
		$jawaban = isset($result['jawaban']) ? json_decode($result['jawaban'], true) : null;

		// Retrieve kunci_jawaban and kuis from Kuis_model
		$kuisModel = new Kuis_model();
		$kunci_jawaban = $kuisModel->getKunciJawaban($id_topik);
		$kuis = $kuisModel->getKuisByTopik($id_topik);

		// Add any additional data you need for the view
		$data['result'] = $result;
		$data['skor'] = $skor;
		$data['jawaban'] = $jawaban;
		$data['kunci_jawaban'] = $kunci_jawaban;
		$data['kuis'] = $kuis;

		// Load the view for displaying quiz results (similar to 'siswa/hasil_kuis')
		return view('siswa/hasil_kuis', $data);
	}

	public function pengembang()
	{
		return view('siswa/pengembang');
	}

	public function petunjuk()
	{
		return view('siswa/petunjuk');
	}
}
