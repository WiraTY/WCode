<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TbMateri extends Seeder
{
    public function run()
    {
        // membuat data
		$TbMateri_data = [
			[
				'materi'  => 'Elemen Head',
				'penjelasan' => '<h5 style="text-align: justify; "><b>1.4.1 Pengertian Web Statis dan Web Dinamis</b></h5><p style="text-align: justify; ">Web statis adalah website yang mana pengguna tidak bisa mengubah konten dari&nbsp;<span style="background-color: var(--bs-card-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight);">web tersebut secara langsung menggunakan browser. Interaksi yang terjadi antara&nbsp;</span><span style="background-color: var(--bs-card-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight);">pengguna dan server hanyalah seputar pemrosesan link saja. Halaman-halaman web&nbsp;</span><span style="background-color: var(--bs-card-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight);">tersebut tidak memliki database, data dan informasi yang ada pada web statis tidak&nbsp;</span><span style="background-color: var(--bs-card-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight);">berubah-ubah kecuali diubah sintaksnya. Dokumen web yang dikirim kepada client akan&nbsp;</span><span style="background-color: var(--bs-card-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight);">sama isinya dengan apa yang ada di web server.</span></p><p style="text-align: justify; ">Contoh dari web statis adalah web yang berisi profil perusahaan. Di sana hanya ada&nbsp;<span style="background-color: var(--bs-card-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight);">beberapa halaman saja dan kontennya hampir tidak pernah berubah karena konten&nbsp;</span><span style="background-color: var(--bs-card-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight);">langsung diletakan dalam file HTML saja.&nbsp;</span><span style="background-color: var(--bs-card-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight);">Dalam web dinamis, interaksi yang terjadi antara pengguna dan server sangat&nbsp;</span><span style="background-color: var(--bs-card-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight);">kompleks. Seseorang bisa mengubah konten dari halaman tertentu dengan menggunakan&nbsp;</span><span style="background-color: var(--bs-card-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight);">browser. Request (permintaan) dari pengguna dapat diproses oleh server yang kemudian&nbsp;</span><span style="background-color: var(--bs-card-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight);">ditampilkan dalam isi yang berbeda-beda menurut alur programnya. Halaman-halaman&nbsp;</span><span style="background-color: var(--bs-card-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight);">web tersebut memiliki database. Web dinamis, memiliki data dan informasi yang berbedabeda&nbsp;</span><span style="background-color: var(--bs-card-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight);">tergantung input apa yang disampaikan client.</span></p><p style="text-align: justify; ">Dokumen yang sampai di client akan berbeda dengan dokumen yang ada di web&nbsp;<span style="background-color: var(--bs-card-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight);">server. Contoh dari web dinamis adalah portal berita dan jejaring sosial. Lihat saja web&nbsp;</span><span style="background-color: var(--bs-card-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight);">tersebut, isinya sering diperbaharui (di-update) oleh pemilik atau penggunanya. Bahkan&nbsp;</span><span style="background-color: var(--bs-card-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight);">untuk jejaring sosial sangat sering di-update setiap harinya.</span></p><p style="text-align: center;"><img src="http://localhost:8080/upload/berkas/1696247553_d78864a48f95319c4f2e.jpg" style="width: 50%;"></p><table class="table table-bordered"><tbody><tr><td><p><span style="background-color: var(--bs-table-bg); color: var(--bs-table-color); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);">&lt;!DOCTYPE html&gt;</span><br></p><p>&lt;html&gt;</p><p>&lt;head&gt;</p><p style="margin-left: 25px;">&lt;title&gt;Page Title&lt;/title&gt;</p><p>&lt;/head&gt;</p><p>&lt;body&gt;</p><p style="margin-left: 25px;">&lt;h1&gt;This is a Heading&lt;/h1&gt;</p><p style="margin-left: 25px;">&lt;p&gt;This is a paragraph.&lt;/p&gt;</p><p>&lt;/body&gt;</p><p>&lt;/html&gt;</p></td></tr></tbody></table><p style="text-align: center;"><br></p>',
				'code'  => '<!DOCTYPE html>
				<html>
				<head>
				<title>Page Title</title>
				</head>
				<body>
				
				<h1>This is a Heading</h1>
				<p>This is a paragraph.</p>
				
				</body>
				</html>',
			],
			[
				'materi'  => 'Elemen Body',
				'penjelasan' => 'Pada Elemen Body'
			],
            [
				'materi'  => 'Komentar',
				'penjelasan' => 'Pada Komentar'
			],
            [
				'materi'  => 'Memberi Identitas',
				'penjelasan' => 'Pada Memberi Identitas'
			],
            [
				'materi'  => 'Memformat Dokumen HTML',
				'penjelasan' => 'Pada Memformat Dokumen HTML'
			],
            [
				'materi'  => 'Memformat Karakter',
				'penjelasan' => 'Pada Memformat Karakter'
			],
            [
				'materi'  => 'Menambah Gambar',
				'penjelasan' => 'Pada Menambah Gambar'
			],
            [
				'materi'  => 'Menggunakan Link',
				'penjelasan' => 'Pada Menggunakan Link'
			],
            [
				'materi'  => 'Menggunakan Tabel',
				'penjelasan' => 'Pada Menggunakan Tabel'
			],
            [
				'materi'  => 'Menggunakan Frame',
				'penjelasan' => 'Pada Menggunakan Frame'
			],
            [
				'materi'  => 'Menggunakan Form',
				'penjelasan' => 'Pada Menggunakan Form'
			],
		];

		foreach($TbMateri_data as $data){
			// insert semua data ke tabel
			$this->db->table('tb_materi')->insert($data);
		}
    }
}
