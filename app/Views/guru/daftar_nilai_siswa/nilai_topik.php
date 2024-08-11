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
                                    <h5 class="fw-semibold mb-0" style="color: white;">Nama Siswa</h5>
                                </th>
                                <th class="border-bottom-0" style="background-color: #5D87FF;">
                                    <h5 class="fw-semibold mb-0" style="color: white;">Skor</h4>
                                </th>
                                <th class="border-bottom-0" style="background-color: #5D87FF; border-radius: 0 10px 10px 0;">
                                    <h5 class="fw-semibold mb-0" style="color: white;">Waktu Mengerjakan</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($nilai_siswa as $nilai) : ?>
                                <tr>
                                    <td class="border-bottom-0 text-center">
                                        <h5 class="fw-semibold mb-0"><?= $no++ ?></h5>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h5 class="fw-semibold mb-0"><?= isset($nilai['username']) ? $nilai['username'] : 'Belum ada nilai' ?></h5>
                                    </td>
                                    <td class="border-bottom-0 text-center">
                                        <h5 class="fw-semibold mb-0"><?= isset($nilai['skor']) ? $nilai['skor'] : 'Belum ada nilai' ?></h5>
                                    </td>
                                    <td class="border-bottom-0 text-center">
                                        <h5 class="fw-semibold mb-0"><?= isset($nilai['created_at']) ? $nilai['created_at'] : 'Belum ada nilai' ?></h5>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection('content') ?>