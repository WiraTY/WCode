<?= $this->extend('guru/layout/main'); ?>
<?= $this->Section('content'); ?>

<div class="container-fluid">

    <div class="card">
        <div class="card-body">
            <h3 class="fw-semibold mb-4" style="text-align: center;">Petunjuk Penggunaan</h3>

            <p style="text-align:justify"><b><span lang="EN-US"><br></span></b></p>
            <p style="text-align:justify"><b><span lang="EN-US"><br></span></b></p>
            <h4 style="text-align:justify"><b><span lang="EN-US">Halaman Beranda</span></b></h4>
            <p class="MsoNormal" style="text-align:justify"><span lang="EN-US">Pada beranda terdapat rangkuman jumlah materi, jumlah topik, dan jumlah Kuis yang ada.</span></p>
            <p class="MsoNormal" style="text-align:justify"><img src="<?= base_url('upload/berkas/1708944388_49195b967553f8156c0c.png') ?>" style="width: 100%;"><span lang="EN-US">
                    <o:p><br></o:p>
                </span></p>
            <p class="MsoNormal" style="text-align:justify"><span lang="EN-US">
                    <o:p><br></o:p>
                </span></p>
            <p class="MsoNormal" style="text-align:justify"><span lang="EN-US">
                    <o:p></o:p>
                </span></p>
            <h4 style="text-align: justify;"><b>Halaman List Materi</b><br></h4>
            <div>
                <p class="MsoNormal" style="text-align: justify;">Pada halaman ini admin dapat menambahkan materi, mengedit materi, menghapus materi, dan melihat list topik dari materi yang dipilih.<br></p>
            </div>
            <p class="MsoNormal" style="text-align: justify;"><img src="<?= base_url('upload/berkas/1708944468_102e9ae9b2c15d3b0c6b.png') ?>" style="width: 100%;"></p>
            <p class="MsoNormal" style="text-align:justify"><span lang="EN-US">
                    <o:p><br></o:p>
                </span></p>
            <p class="MsoNormal" style="text-align:justify"><span lang="EN-US">
                    <o:p></o:p>
                </span></p>
            <h4 style="text-align: justify;"><b>List Topik</b><br></h4>
            <p class="MsoNormal" style="text-align:justify"><span style="background-color: var(--bs-card-bg); text-align: var(--bs-body-text-align);">Pada halaman ini admin dapat menambahkan topik, mengedit topik, menghapus topik, melihat atau preview topik, dan juga mengelola kuis untuk setiap topiknya.</span></p>
            <p class="MsoNormal" style="text-align:justify"><img src="<?= base_url('upload/berkas/1708944568_683f2e7e8fdaf927e142.png') ?>" style="width: 100%;"><span style="background-color: var(--bs-card-bg); text-align: var(--bs-body-text-align);"><br></span></p>
            <p style="text-align: justify;"><span style="font-weight: 700;"><span lang="EN-US"><br></span></span></p>
            <h4 style="text-align: justify;"><b>Halaman Tambah Topik</b><br></h4>
            <p style="text-align: justify;"><span lang="EN-US">Pada halaman topik ini admin memasukkan judul topik, penjelasan, dan code praktik. Input penjelasan menggunakan WYSIWYG (<i>What You See Is What You Get</i>), yang mana cara penggunaannya mirip dengan text editor seperti Microsoft Word, sehingga memudahkan dalam mengelola penjelasan materi. Selain itu, penggunaan WYSIWYG juga membuat apa yang ditulis pada input akan terlihat sama dengan apa yang dilihat siswa.<br></span></p>
            <p style="text-align: justify;"><img src="<?= base_url('upload/berkas/1708944634_b737f255d78b4efa9c8f.png') ?>" style="width: 100%;"><br></p>
            <p style="text-align: justify;"><img src="<?= base_url('upload/berkas/1708944648_f0af69f471417fa9ad36.png') ?>" style="width: 100%;"><span style="font-weight: 700;"><span lang="EN-US"><br></span></span></p>
            <p style="text-align: justify;"><span lang="EN-US">Pada Code praktik menggunakan code editor Ace Editor, yang memudahkan admin dalam memasukkan code yang ingin dipraktikkan oleh siswa.<br></span></p>
            <p style="text-align: justify;"><span style="font-weight: 700;"><span lang="EN-US"><br></span></span></p>
            <h4 style="text-align: justify;"><b>Halaman Edit Topik</b><br></h4>
            <p class="MsoNormal" style="text-align:justify"><span lang="FI">Halaman ini sama dengan halaman tambah topik, perbedaannya halaman ini digunakan untuk mengedit topik.<o:p></o:p></span></p>
            <p style="text-align: justify;"><span style="font-weight: 700;"><span lang="EN-US"><br></span></span></p>
            <p class="MsoNormal" style="text-align:justify"><span lang="EN-US">
                    <o:p></o:p>
                </span></p>
            <h4 style="text-align: justify;"><b>Halaman Kuis</b><br></h4>
            <p class="MsoNormal" style="text-align:justify"><span lang="EN-US"><span style="background-color: var(--bs-card-bg); text-align: var(--bs-body-text-align);">Tombol untuk membuka halaman ini terdapat pada halaman list topik. Halaman ini digunakan untuk mengelola kuis dari list topik yang dipilih, admin bisa menambah, mengedit, dan delete soal</span>.<o:p></o:p></span></p>
            <p style="text-align: justify;"><img src="<?= base_url('upload/berkas/1708944811_72910c3ad2c3b2dd8260.png') ?>" style="width: 100%;"><span style="font-weight: 700;"><span lang="EN-US"><br></span></span></p>
            <p style="text-align: justify;"><span style="font-weight: 700;"><span lang="EN-US"><br></span></span></p>
            <h4 style="text-align: justify;"><b>Halaman Tambah Soal</b><br></h4>
            <p class="MsoNormal" style="text-align:justify"><span lang="FI">Pada halaman ini admin perlu menambahkan nomor soal, pertanyaan, jawaban A sampai E, dan juga kunci jawaban.<o:p></o:p></span></p>
            <p style="text-align: justify;"><img src="<?= base_url('upload/berkas/1708944920_3b1d5c1d276e9bf67f52.png') ?>" style="width: 100%;"><br></p>
            <p style="text-align: justify;"><img src="<?= base_url('upload/berkas/1708944936_12f6550b4d2005940815.png') ?>" style="width: 100%;"><span style="font-weight: 700;"><span lang="EN-US"><br></span></span></p>
            <p style="text-align: justify;"><span style="font-weight: 700;"><span lang="EN-US"><br></span></span></p>
            <h4 style="text-align: justify;"><b>Halaman Preview</b><br></h4>
            <p class="MsoNormal" style="text-align:justify"><span lang="FI">Halaman ini digunakan untuk melihat tampilan halaman penjelasan dari tampilan atau sudut pandang siswa.</span></p>
            <p class="MsoNormal" style="text-align:justify"><img src="<?= base_url('upload/berkas/1708945011_758d8a17dd7314882048.png') ?>" style="width: 100%;"><span lang="FI"><br></span></p>
            <p class="MsoNormal" style="text-align:justify"><span lang="FI">
                    <o:p></o:p>
                </span></p>
            <p style="text-align: justify;"><br></p>
            <h4 style="text-align: justify;"><b>Menu Tampilan Siswa</b><br></h4>
            <p class="MsoNormal" style="text-align:justify"><span lang="FI">Menu ini digunakan admin untuk berpindah dari halaman atau sudut pandang admin ke sudut pandang siswa. Perbedaannya dengan tampilan biasa siswa, pada tampilan ini terdapat menu untuk kembali ke halaman admin atau sudut pandang admin.<o:p></o:p></span></p>
            <p style="text-align: justify;"><img src="<?= base_url('upload/berkas/1708945051_652263ee9dc7664f0fa4.png') ?>" style="width: 100%;"><br></p>
        </div>
    </div>

</div>



<?= $this->endSection('content') ?>