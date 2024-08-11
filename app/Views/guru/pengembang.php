<?= $this->extend('guru/layout/main'); ?>
<?= $this->Section('content'); ?>

<div class="container-fluid">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Informasi Pengembang</h5>

            <!-- Tambahkan foto dengan align mid dan bingkai rounded -->
            <div class="text-center">
                <div style="background-color: #d3d3d3; display: inline-block; border-radius: 50%; overflow: hidden">
                    <img src="../assets/guru/images/pengembang.png" alt="Foto Pengembang" class="rounded-circle" style="width: 200px; height: 210px;">
                </div>
            </div>

            <!-- Tambahkan tabel untuk menampilkan nama, nim, dan prodi -->
            <div class="mt-4">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td>Wira Tri Yoga</td>
                        </tr>
                        <tr>
                            <td>NIM</td>
                            <td>200533628039</td>
                        </tr>
                        <tr>
                            <td>Prodi</td>
                            <td>S1 Pendidikan Teknik Informatika</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Dosen Pembimbing</h5>

            <!-- Tambahkan foto dengan align mid dan bingkai rounded -->
            <div class="text-center">
                <div style="background-color: #d3d3d3; display: inline-block; border-radius: 50%; overflow: hidden">
                    <img src="assets/guru/images/pembimbing.png" alt="Foto Pembimbing" class="rounded-circle" style="width: 200px; height: 210px;">
                </div>
            </div>

            <!-- Tambahkan tabel untuk menampilkan nama, nim, dan prodi -->
            <div class="mt-4">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td>Prof. Dr. H. Hakkun Elmunsyah, S.T., M,T.</td>
                        </tr>
                        <tr>
                            <td>NIP</td>
                            <td>196509161995121001</td>
                        </tr>
                        <tr>
                            <td>Instansi</td>
                            <td>Universitas Negeri Malang</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content') ?>