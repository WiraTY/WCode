<?php

namespace App\Controllers;

use App\Models\Materi_model;
use App\Models\Topik_model;
use App\Models\Kuis_model;
use Myth\Auth\Models\UserModel;
use App\Models\Hasil_kuis_model;
use App\Models\Pembelajaran_model;
use App\Models\Pomodoro_model;

class Admin extends BaseController
{

	protected $kuisModel;
	protected $auth;

	public function __construct()
	{
		$this->kuisModel = new Kuis_model();
		$this->auth = service('authentication');
	}

	public function index()
	{
		// Load models
		$materiModel = new Materi_model();
		$topikModel = new Topik_model();
		$kuisModel = new Kuis_model();
		$pembelajaranModel = new Pembelajaran_model();
		$pomodoroModel = new Pomodoro_model();
		$userModel = new UserModel();


		// Menghitung total jumlah materi, topik, dan kuis
		$jumlahMateri = $materiModel->countAll();
		$jumlahTopik = $topikModel->countAll();
		$jumlahKuis = $kuisModel->countAll();
		$averageStudyTimeInSeconds = $pomodoroModel->averageStudyTime();
		$averageRestTimeInSeconds = $pomodoroModel->averageRestTime();

		$averageStudyTimeInMinutes = round($averageStudyTimeInSeconds / 60);
		$averageRestTimeInMinutes = round($averageRestTimeInSeconds / 60);
		$averageSession = $pomodoroModel->averageSession();
		$idUserWithMostKuis = $pembelajaranModel->getUsernameWithMostKuis();

		// Jika ditemukan id_user
		if ($idUserWithMostKuis) {
			// Mendapatkan username berdasarkan id_user
			$username = $userModel->find($idUserWithMostKuis)->username;
		} else {
			$username = null;
		}

		$data['usersByTopik'] = $pembelajaranModel->countUsersByTopik();
		$usersByKuis = $pembelajaranModel->countUsersByKuis();
		// Kirim data ke beranda
		$data += [
			'jumlahMateri' => $jumlahMateri,
			'jumlahTopik' => $jumlahTopik,
			'jumlahKuis' => $jumlahTopik,
			'usersByKuis' => $usersByKuis,
			'averageStudyTime' => $averageStudyTimeInMinutes,
			'averageRestTime' => $averageRestTimeInMinutes,
			'averageSession' => $averageSession,
			'usernameWithMostKuis' => $username,
		];

		return view('guru/beranda', $data);
	}

	public function materi()
	{
		$materiModel = new Topik_model();
		$materis = $materiModel->findAll();

		$data = [
			'materis' => $materis,
		];

		helper('text');

		return view('guru/materi/index', $data);
	}

	public function tambah()
	{
		$model = new Topik_model();
		$data['materi'] = $model->findAll();

		return view('guru/tambah', $data);
	}

	public function proses_tambah()
	{
		$request = service('request');

		$validationRules = [
			'materi' => 'required',
			'penjelasan' => 'required',
		];

		$validationMessages = [
			'materi' => [
				'required' => 'Judul materi harus diisi.',
			],
			'penjelasan' => [
				'required' => 'Penjelasan materi harus diisi.',
			],
		];

		if (!$this->validate($validationRules, $validationMessages)) {
			// Jika validasi gagal, kembali ke halaman kirim.php dengan pesan error
			return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
		}

		$materi = $request->getPost('materi');
		$penjelasan = $request->getPost('penjelasan');
		$code = $request->getPost('code');

		// Data yang akan disimpan
		$data = [
			'materi' => $materi,
			'penjelasan' => $penjelasan,
			'code' => $code,
		];

		// Simpan data kirim email ke dalam tabel tb_kirim_email
		$MateriModel = new Topik_model();
		$MateriModel->insert($data);

		return redirect()->to(base_url('admin/materi'))->with('success', 'Materi berhasil ditambahkan');
	}

	public function edit($id_topik)
	{
		$model = new Topik_model();
		$data['materi'] = $model->find($id_topik);

		return view('guru/edit', $data);
	}

	public function proses_edit($id_topik)
	{
		$request = service('request');
		$materiModel = new Topik_model();
		$data = [
			'materi' => $request->getPost('materi'),
			'penjelasan' => $request->getPost('penjelasan'),
			'code' => $request->getPost('editor'),
		];

		// Perbarui data materi berdasarkan ID
		$materiModel->update($id_topik, $data);

		return redirect()->to(base_url('admin/materi'));
	}

	public function preview($id_topik)
	{
		$model = new Topik_model();
		$data['materi'] = $model->find($id_topik);

		return view('guru/preview', $data);
	}

	public function delete($id = false)
	{
		$MateriModel = new Topik_model();
		$data = $MateriModel->find($id);
		$MateriModel->delete($id);

		return redirect()->to(base_url('admin/materi'))->with('success', 'Materi berhasil dihapus');
	}




	public function materi_index()
	{
		$materiModel = new Materi_model();
		$materis = $materiModel->findAll();

		$data = [
			'materis' => $materis,
		];

		return view('guru/materi/index', $data);
	}

	public function materi_tambah()
	{
		$model = new Materi_model();
		$data['materi'] = $model->findAll();

		return view('guru/materi/tambah', $data);
	}

	public function materi_proses_tambah()
	{
		$request = service('request');

		$validationRules = [
			'nama_materi' => 'required',
		];

		$validationMessages = [
			'nama_materi' => [
				'required' => 'Judul nama materi harus diisi.',
			]
		];

		if (!$this->validate($validationRules, $validationMessages)) {
			// Jika validasi gagal, kembali ke halaman kirim.php dengan pesan error
			return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
		}

		$materi = $request->getPost('nama_materi');

		// Data yang akan disimpan
		$data = [
			'nama_materi' => $materi
		];

		// Simpan data kirim email ke dalam tabel tb_kirim_email
		$MateriModel = new Materi_model();
		$MateriModel->insert($data);

		return redirect()->to(base_url('admin/materi'))->with('success', 'Materi berhasil ditambahkan');
	}

	public function materi_edit($id_materi)
	{
		$model = new Materi_model();
		$data['materi'] = $model->find($id_materi);

		return view('guru/materi/edit', $data);
	}

	public function materi_proses_edit($id_materi)
	{
		$request = service('request');
		$materiModel = new Materi_model();
		$data = [
			'nama_materi' => $request->getPost('nama_materi'),
		];

		// Perbarui data materi berdasarkan ID
		$materiModel->update($id_materi, $data);

		return redirect()->to(base_url('admin/materi'));
	}

	public function materi_hapus($id = false)
	{
		$MateriModel = new Materi_model();
		$data = $MateriModel->find($id);
		$MateriModel->delete($id);

		return redirect()->to(base_url('admin/materi'))->with('success', 'Materi berhasil dihapus');
	}




	public function topik_index($id_materi)
	{
		$TopikModel = new Topik_model();
		$data['topiks'] = $TopikModel->where('id_materi', $id_materi)->findAll();
		$data['id_materi'] = $id_materi;

		$model = new Materi_model();
		$data['materis'] = $model->find($id_materi);

		helper('text');

		return view('guru/topik/index', $data);
	}

	public function topik_preview($id_materi, $id_topik)
	{
		$model = new Topik_model();
		$data['topiks'] = $model->find($id_topik);

		$model = new Materi_model();
		$data['materis'] = $model->find($id_materi);
		$data['id_materi'] = $id_materi;

		return view('guru/topik/preview', $data);
	}

	public function topik_tambah()
	{
		$id_materi = $this->request->getGet('id_materi');

		$model = new Topik_model();
		$data['topiks'] = $model->findAll();
		$data['id_materi'] = $id_materi;

		$model = new Materi_model();
		$data['materis'] = $model->find($id_materi);

		return view('guru/topik/tambah', $data);
	}

	public function topik_proses_tambah()
	{
		$request = service('request');

		$validationRules = [
			'nama_topik' => 'required',
			'penjelasan' => 'required',
		];

		$validationMessages = [
			'nama_topik' => [
				'required' => 'Judul materi harus diisi.',
			],
			'penjelasan' => [
				'required' => 'Penjelasan materi harus diisi.',
			],
		];

		if (!$this->validate($validationRules, $validationMessages)) {
			// Jika validasi gagal, kembali ke halaman kirim.php dengan pesan error
			return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
		}

		$id_materi = $request->getPost('id_materi');
		$topik = $request->getPost('nama_topik');
		$penjelasan = $request->getPost('penjelasan');
		$code = $request->getPost('code');

		// Data yang akan disimpan
		$data = [
			'id_materi' => $id_materi,
			'nama_topik' => $topik,
			'penjelasan' => $penjelasan,
			'code' => $code,
		];

		// Simpan data kirim email ke dalam tabel tb_kirim_email
		$TopikModel = new Topik_model();
		$TopikModel->insert($data);

		return redirect()->to(base_url("admin/materi/topik/$id_materi"))->with('success', 'Topik berhasil ditambahkan');
	}

	public function topik_edit($id_materi, $id_topik)
	{
		$model = new Topik_model();
		$data['topiks'] = $model->find($id_topik);

		$model = new Materi_model();
		$data['materis'] = $model->find($id_materi);
		$data['id_materi'] = $id_materi;

		return view('guru/topik/edit', $data);
	}

	public function topik_proses_edit($id_topik)
	{
		$request = service('request');

		$validationRules = [
			'nama_topik' => 'required',
			'penjelasan' => 'required',
		];

		$validationMessages = [
			'nama_topik' => [
				'required' => 'Judul materi harus diisi.',
			],
			'penjelasan' => [
				'required' => 'Penjelasan materi harus diisi.',
			],
		];

		if (!$this->validate($validationRules, $validationMessages)) {
			// Jika validasi gagal, kembali ke halaman kirim.php dengan pesan error
			return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
		}

		$TopikModel = new Topik_model();
		$data = [
			'id_materi' => $request->getPost('id_materi'),
			'nama_topik' => $request->getPost('nama_topik'),
			'penjelasan' => $request->getPost('penjelasan'),
			'code' => $request->getPost('code'),
		];

		// Perbarui data materi berdasarkan ID
		$TopikModel->update($id_topik, $data);
		$topik = $TopikModel->find($id_topik);
		if ($topik) {
			$id_materi = $topik['id_materi'];

			// Redirect to admin/materi/topik/(:num) with the appropriate ID as a query parameter
			return redirect()->to(base_url("admin/materi/topik/$id_materi"))->with('success', 'Topik berhasil diedit');
		}

		return redirect()->to(base_url('admin/materi'))->with('error', 'Topik tidak ditemukan');
	}

	public function topik_hapus($id = false)
	{
		$TopikModel = new Topik_model();
		$topik = $TopikModel->find($id);

		if ($topik) {
			$id_materi = $topik['id_materi'];
			$TopikModel->delete($id);

			// Redirect to admin/materi/topik/(:num) with the appropriate ID as a query parameter
			return redirect()->to(base_url("admin/materi/topik/$id_materi"))->with('success', 'Topik berhasil dihapus');
		} else {
			// Handle the case where the topik with the given ID doesn't exist
			return redirect()->to(base_url('admin/materi'))->with('error', 'Topik tidak ditemukan');
		}
	}



	public function kuis_index($id_materi, $id_topik)
	{
		$modelKuis = new Kuis_model();
		$kuis = $modelKuis->where('id_topik', $id_topik)->orderBy('no_soal', 'ASC')->findAll();
		$data['id_topik'] = $id_topik;

		$modelMateri = new Materi_model();
		$materi = $modelMateri->find($id_materi);

		$modelTopik = new Topik_model();
		$topik = $modelTopik->find($id_topik);

		$data = [
			'kuis' => $kuis,
			'materis' => $materi,
			'topiks' => $topik,
		];

		return view('guru/kuis/index', $data);
	}

	public function kuis_tambah($id_materi, $id_topik)
	{
		$model = new Kuis_model();
		$data['kuis'] = $model->findAll();
		$data['id_topik'] = $id_topik;

		$model = new Topik_model();
		$data['topiks'] = $model->find($id_topik);

		$model = new Materi_model();
		$data['materis'] = $model->find($id_materi);

		return view('guru/kuis/tambah', $data);
	}

	public function kuis_proses_tambah()
	{
		$request = service('request');

		$validationRules = [
			'no_soal' => 'required',
			'soal' => 'required',
			'a' => 'required',
			'b' => 'required',
			'c' => 'required',
			'd' => 'required',
			'e' => 'required',
			'kunci' => 'required',
		];

		$validationMessages = [
			'no_soal' => [
				'required' => 'No Soal harus diisi.',
			],
			'soal' => [
				'required' => 'Pertanyaan harus diisi.',
			],
			'a' => [
				'required' => 'Jawaban A harus diisi.',
			],
			'b' => [
				'required' => 'Jawaban B harus diisi.',
			],
			'c' => [
				'required' => 'Jawaban C harus diisi.',
			],
			'd' => [
				'required' => 'Jawaban D harus diisi.',
			],
			'e' => [
				'required' => 'Jawaban E harus diisi.',
			],
			'kunci' => [
				'required' => 'Kunci Jawaban harus diisi.',
			],
		];

		if (!$this->validate($validationRules, $validationMessages)) {
			// Jika validasi gagal, kembali ke halaman kirim.php dengan pesan error
			return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
		}

		// $id_materi = $request->getPost('id_materi');

		// Data yang akan disimpan
		$modelKuis = new Kuis_model();
		$data = [
			'id_topik' => $request->getPost('id_topik'),
			'no_soal' => $request->getPost('no_soal'),
			'soal' => $request->getPost('soal'),
			'a' => $request->getPost('a'),
			'b' => $request->getPost('b'),
			'c' => $request->getPost('c'),
			'd' => $request->getPost('d'),
			'e' => $request->getPost('e'),
			'kunci' => $request->getPost('kunci'),
		];
		$modelKuis->insert($data);

		$id_materi = $request->getPost('id_materi');
		$id_topik = $request->getPost('id_topik');

		return redirect()->to(base_url("admin/materi/topik/kuis_index/{$id_materi}/{$id_topik}"))
			->with('success', 'Soal berhasil ditambahkan');
	}

	public function kuis_edit($id_materi, $id_topik, $id_kuis)
	{
		$modelKuis = new Kuis_model();
		$kuis = $modelKuis->find($id_kuis);

		$modelMateri = new Materi_model();
		$materi = $modelMateri->find($id_materi);

		$modelTopik = new Topik_model();
		$topik = $modelTopik->find($id_topik);

		$data = [
			'kuis' => $kuis,
			'materi' => $materi,
			'topik' => $topik,
		];

		return view('guru/kuis/edit', $data);
	}

	public function kuis_proses_edit($id_kuis)
	{
		$request = service('request');

		$validationRules = [
			'no_soal' => 'required',
			'soal' => 'required',
			'a' => 'required',
			'b' => 'required',
			'c' => 'required',
			'd' => 'required',
			'e' => 'required',
			'kunci' => 'required',
		];

		$validationMessages = [
			'no_soal' => [
				'required' => 'No Soal harus diisi.',
			],
			'soal' => [
				'required' => 'Pertanyaan harus diisi.',
			],
			'a' => [
				'required' => 'Jawaban A harus diisi.',
			],
			'b' => [
				'required' => 'Jawaban B harus diisi.',
			],
			'c' => [
				'required' => 'Jawaban C harus diisi.',
			],
			'd' => [
				'required' => 'Jawaban D harus diisi.',
			],
			'e' => [
				'required' => 'Jawaban E harus diisi.',
			],
			'kunci' => [
				'required' => 'Kunci Jawaban harus diisi.',
			],
		];

		if (!$this->validate($validationRules, $validationMessages)) {
			// Jika validasi gagal, kembali ke halaman kirim.php dengan pesan error
			return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
		}

		$modelKuis = new Kuis_model();
		$data = [
			'id_topik' => $request->getPost('id_topik'),
			'no_soal' => $request->getPost('no_soal'),
			'soal' => $request->getPost('soal'),
			'a' => $request->getPost('a'),
			'b' => $request->getPost('b'),
			'c' => $request->getPost('c'),
			'd' => $request->getPost('d'),
			'e' => $request->getPost('e'),
			'kunci' => $request->getPost('kunci'),
		];

		// Perbarui data materi berdasarkan ID
		$modelKuis->update($id_kuis, $data);
		$kuis = $modelKuis->find($id_kuis);
		$modelTopik = new Topik_model();
		$topik = $modelTopik->find($kuis['id_topik']);
		if ($kuis) {
			$id_topik = $kuis['id_topik'];
			$id_materi = $topik['id_materi'];

			// Redirect to admin/materi/topik/(:num) with the appropriate ID as a query parameter
			return redirect()->to(base_url("admin/materi/topik/kuis_index/$id_materi/$id_topik"))->with('success', 'Soal berhasil diedit');
		}

		return redirect()->to(base_url('admin/materi'))->with('error', 'Topik tidak ditemukan');
	}

	public function kuis_hapus($id_kuis = false)
	{
		$KuisModel = new Kuis_model();
		$kuis = $KuisModel->find($id_kuis);
		$modelTopik = new Topik_model();
		$topik = $modelTopik->find($kuis['id_topik']);
		if ($kuis) {
			$id_kuis = $kuis['id_kuis'];
			$KuisModel->delete($id_kuis);
			$id_topik = $kuis['id_topik'];
			$id_materi = $topik['id_materi'];

			// Redirect to admin/materi/topik/(:num) with the appropriate ID as a query parameter
			return redirect()->to(base_url("admin/materi/topik/kuis_index/$id_materi/$id_topik"))->with('success', 'Soal berhasil dihapus');
		} else {
			// Handle the case where the topik with the given ID doesn't exist
			return redirect()->to(base_url('admin/materi'))->with('error', 'Soal tidak ditemukan');
		}
	}



	public function daftar_siswa()
	{
		$userModel = new UserModel();
		$users = $userModel->findAll();

		// Mengirim data pengguna ke tampilan
		return view('guru/daftar_siswa/daftar_siswa', ['users' => $users]);
	}

	public function nilai_per_siswa($userId)
	{
		$userModel = new UserModel();
		$user = $userModel->find($userId);

		$materiModel = new Materi_model();
		$materi = $materiModel->findAll();

		$hasilKuisModel = new Hasil_kuis_model();
		$skor_per_topik = $hasilKuisModel->getLatestScoresByUserId($userId);

		return view('guru/daftar_siswa/nilai_per_siswa', ['materi' => $materi, 'username' => $user->username, 'skor_per_topik' => $skor_per_topik]);
	}

	public function waktu_belajar_siswa($user_id)
	{
		$userModel = new UserModel();
		$user = $userModel->find($user_id);

		$pomodoroModel = new Pomodoro_model();
		$waktuBelajarData = $pomodoroModel->where('id_user', $user_id)->first();

		$data = [
			'waktuBelajarData' => $waktuBelajarData,
			'username' => $user->username,
			'noData' => empty($waktuBelajarData)
		];

		return view('guru/daftar_siswa/waktu_belajar_siswa', $data);
	}

	public function daftar_nilai_siswa()
	{
		// Mendapatkan daftar materi
		$materiModel = new Materi_model();
		$materi = $materiModel->findAll();

		// Mendapatkan daftar topik
		$topikModel = new Topik_model();
		$topik = $topikModel->findAll();

		$hasilKuisModel = new Hasil_kuis_model();
		$topikWithAverageScore = $hasilKuisModel->getTopikWithAverageLatestKuisScore();

		// Kirim data ke tampilan
		return view('guru/daftar_nilai_siswa/daftar_nilai_siswa', [
			'materi' => $materi,
			'topik' => $topik,
			'topikWithAverageScore' => $topikWithAverageScore // Mengirimkan data rata-rata nilai per topik ke tampilan
		]);
	}

	public function nilai_topik($id_topik)
	{
		// Instansiasi model Hasil_kuis_model
		$hasilKuisModel = new Hasil_kuis_model();

		// Ambil semua pengguna dari tabel users
		$users = $hasilKuisModel->getAllUsers();

		// Ambil data nilai siswa berdasarkan id_topik
		$nilai_siswa = $hasilKuisModel->getSkorByTopikId($id_topik);

		// Menginisialisasi array untuk menyimpan semua data pengguna, bahkan yang tidak memiliki nilai
		$allUsersData = [];

		// Memasukkan semua pengguna ke dalam array allUsersData
		foreach ($users as $user) {
			$allUsersData[$user['id']] = [
				'username' => $user['username'],
				'skor' => '-',
				'created_at' => '-'
			];
		}

		// Menyimpan data nilai siswa yang sesuai
		foreach ($nilai_siswa as $nilai) {
			$userId = $nilai['id'];
			$allUsersData[$userId]['skor'] = isset($nilai['skor']) ? $nilai['skor'] : '-';
			$allUsersData[$userId]['created_at'] = isset($nilai['created_at']) ? $nilai['created_at'] : '-';
		}

		// Kirim data ke tampilan
		return view('guru/daftar_nilai_siswa/nilai_topik', ['nilai_siswa' => $allUsersData]);
	}




	public function uploadGambar()
	{
		if ($this->request->getFile('file')) {
			$dataFile = $this->request->getFile('file');
			$fileName = $dataFile->getRandomName('file');
			$dataFile->move("upload/berkas", $fileName);
			echo base_url("upload/berkas/$fileName");
		}
	}

	function deleteGambar()
	{
		$src = $this->request->getVar('src');
		//--> uploads/berkas/1630368882_e4a62568c1b50887a8a5.png

		//https://localhost/ci4summernote/public
		if ($src) {
			$file_name = str_replace(base_url(), "", $src);
			if (unlink($file_name)) {
				echo "Delete file berhasil";
			}
		}
	}

	public function pengembang()
	{
		return view('guru/pengembang');
	}

	public function petunjuk()
	{
		return view('guru/petunjuk');
	}
}
