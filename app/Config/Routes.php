<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('admin/beranda', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('admin/materi', 'Admin::materi_index', ['filter' => 'role:admin']);
$routes->get('admin/materi/preview/(:num)', 'Admin::preview/$1', ['filter' => 'role:admin']);
$routes->get('admin/materi/tambah', 'Admin::materi_tambah', ['filter' => 'role:admin']);
$routes->post('admin/materi/proses_tambah', 'Admin::materi_proses_tambah', ['filter' => 'role:admin']);
$routes->get('admin/materi/edit/(:num)', 'Admin::materi_edit/$1', ['filter' => 'role:admin']);
$routes->post('admin/materi/proses_edit/(:num)', 'Admin::materi_proses_edit/$1', ['filter' => 'role:admin']);
$routes->get('admin/materi/hapus/(:num)', 'Admin::materi_hapus/$1', ['filter' => 'role:admin']);

$routes->get('admin/materi/topik/(:num)', 'Admin::topik_index/$1', ['filter' => 'role:admin']);
$routes->get('admin/materi/topik/preview/(:num)/(:num)', 'Admin::topik_preview/$1/$2', ['filter' => 'role:admin']);
$routes->get('admin/materi/topik/tambah', 'Admin::topik_tambah', ['filter' => 'role:admin']);
$routes->post('admin/materi/topik/proses_tambah', 'Admin::topik_proses_tambah', ['filter' => 'role:admin']);
$routes->get('admin/materi/topik/edit/(:num)/(:num)', 'Admin::topik_edit/$1/$2', ['filter' => 'role:admin']);
$routes->post('admin/materi/topik/proses_edit/(:num)', 'Admin::topik_proses_edit/$1', ['filter' => 'role:admin']);
$routes->get('admin/materi/topik/hapus/(:num)', 'Admin::topik_hapus/$1', ['filter' => 'role:admin']);

$routes->get('admin/materi/topik/kuis_index/(:num)/(:num)', 'Admin::kuis_index/$1/$2', ['filter' => 'role:admin']);
$routes->get('admin/kuis_list/(:num)', 'Admin::kuis_list/$1', ['filter' => 'role:admin']);
$routes->get('admin/materi/topik/kuis_tambah/(:num)/(:num)', 'Admin::kuis_tambah/$1/$2', ['filter' => 'role:admin']);
$routes->post('admin/materi/topik/kuis_proses_tambah', 'Admin::kuis_proses_tambah', ['filter' => 'role:admin']);
$routes->get('admin/materi/topik/kuis_edit/(:num)/(:num)/(:num)', 'Admin::kuis_edit/$1/$2/$3', ['filter' => 'role:admin']);
$routes->post('admin/materi/topik/kuis_proses_edit/(:num)', 'Admin::kuis_proses_edit/$1', ['filter' => 'role:admin']);
$routes->get('admin/materi/topik/kuis_hapus/(:num)', 'Admin::kuis_hapus/$1', ['filter' => 'role:admin']);
$routes->get('materi/kuis_preview/(:num)', 'Admin::kuis_preview/$1', ['filter' => 'role:admin']);

$routes->get('admin/daftar_siswa', 'Admin::daftar_siswa');
$routes->get('admin/daftar_nilai_siswa', 'Admin::daftar_nilai_siswa');
$routes->get('admin/nilai_topik/(:num)', 'Admin::nilai_topik/$1');
$routes->get('admin/nilai_per_siswa/(:num)', 'Admin::nilai_per_siswa/$1');
$routes->get('admin/waktu_belajar_siswa/(:num)', 'Admin::waktu_belajar_siswa/$1');


$routes->get('/', 'Materi::index');
$routes->get('siswa/', 'Materi::index');
$routes->get('siswa/beranda', 'Materi::index');
$routes->get('siswa/materi', 'Materi::materi');
$routes->get('siswa/waktu_belajar', 'Materi::waktu_belajar');
$routes->get('siswa/nilai_kuis', 'Materi::nilai_kuis');
$routes->get('siswa/materi/topik/(:num)', 'Materi::topik/$1');
$routes->get('siswa/materi/penjelasan/(:num)/(:num)', 'Materi::penjelasan/$1/$2');
$routes->get('siswa/materi/praktik/(:num)/(:num)', 'Materi::praktik/$1/$2');
$routes->get('siswa/materi/kuis/(:num)/(:num)', 'Materi::kuis/$1/$2');
$routes->post('siswa/materi/submit_kuis', 'Materi::submit_kuis');
$routes->get('siswa/hasil_kuis', 'Materi::hasil_kuis');
$routes->get('siswa/lihat_hasil_kuis/(:segment)', 'Materi::lihat_hasil_kuis/$1');
$routes->post('/update-pomodoro-data', 'Pomodoro::updatePomodoroData');
$routes->post('/update-study-time', 'Pomodoro::updateStudyTime');
$routes->post('/update-break-time', 'Pomodoro::updateBreakTime');

$routes->get('guru/pengembang', 'Admin::pengembang');
$routes->get('siswa/pengembang', 'Materi::pengembang');

$routes->get('guru/petunjuk', 'Admin::petunjuk');
$routes->get('siswa/petunjuk', 'Materi::petunjuk');


$routes->post('materi/uploadGambar', 'Admin::uploadGambar', ['filter' => 'role:admin']);
$routes->post('materi/deleteGambar', 'Admin::deleteGambar', ['filter' => 'role:admin']);
