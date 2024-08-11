<?= $this->extend('guru/layout/main'); ?>
<?= $this->Section('content'); ?>

<div class="container-fluid">

    <!--  Row 1 -->
    <div class="col-lg- d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <?php if (session()->get('success')) : ?>
                    <div class="alert alert-success">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                    <h5 class="card-title fw-semibold mb-4">Daftar Siswa</h5>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 align-middle">
                        <thead class="text-dark fs-4 text-center">
                            <tr>
                                <th class="border-bottom-0" style="background-color: #5D87FF; border-radius: 10px 0 0 10px;">
                                    <h5 class="fw-semibold mb-0" style="color: white;">No</h5>
                                </th>
                                <th class="border-bottom-0" style="background-color: #5D87FF;">
                                    <h5 class="fw-semibold mb-0" style="color: white;">Nama Topik</h5>
                                </th>
                                <th class="border-bottom-0" style="background-color: #5D87FF;">
                                    <h5 class="fw-semibold mb-0" style="color: white;">Rata-Rata</h4>
                                </th>
                                <th class="border-bottom-0" style="background-color: #5D87FF; border-radius: 0 10px 10px 0;">
                                    <h5 class="fw-semibold mb-0" style="color: white;">Nilai Siswa</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($materi as $materiRow) : ?>
                                <tr>
                                    <td class="border-bottom-0" colspan="4">
                                        <h5 class="fw-semibold mb-0 text-center">Materi <?= $materiRow['nama_materi'] ?></h5>
                                    </td>
                                </tr>
                                <?php $no = 1;
                                foreach ($topik as $topikRow) : ?>
                                    <?php if ($topikRow['id_materi'] == $materiRow['id_materi']) : ?>
                                        <tr>
                                            <td class="border-bottom-0">
                                                <h5 class="fw-semibold mb-0 text-center"><?= $no++ ?></h5>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h5 class="fw-semibold mb-0"><?= $topikRow['nama_topik'] ?></h5>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h5 class="fw-semibold mb-0 text-center">
                                                    <?php
                                                    // Temukan data rata-rata nilai kuis untuk topik saat ini
                                                    $rataNilaiKuis = null;
                                                    foreach ($topikWithAverageScore as $topikAverageScore) {
                                                        if ($topikAverageScore['id_topik'] == $topikRow['id_topik']) {
                                                            $rataNilaiKuis = round($topikAverageScore['rata_nilai_kuis']);
                                                            break;
                                                        }
                                                    }

                                                    // Tampilkan nilai rata-rata atau teks "Belum ada nilai"
                                                    echo $rataNilaiKuis ?? 'Belum ada nilai';
                                                    ?>
                                                </h5>
                                            </td>
                                            <td class="border-bottom-0">
                                                <a type="button" class="btn btn-success m-1" href="<?= base_url('admin/nilai_topik/' . $topikRow['id_topik']) ?>">Daftar Nilai</a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection('content') ?>