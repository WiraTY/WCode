<?= $this->extend('siswa/layout/main'); ?>
<?= $this->Section('content'); ?>

<div class="container-fluid">

    <div class="card" style="background-color: #5D87FF;">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4"  style="color: white;">Waktu Belajar</h5>
            <?php if ($noData) : ?>
                <div class="card-body" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <p class="card-title" style="color: white;">Masih belum ada data waktu belajar</p>
                </div>
            <?php else : ?>
                <div class="row" style="display: flex; align-items: center; justify-content: center;">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                <h5 class="card-title">Total Waktu Pomodoro</h5>
                                <p class="card-text" style="font-size: 30px;"><?= round($waktuBelajarData['total_waktu_pomodoro'] / 60) ?> Menit</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                <h5 class="card-title">Total Waktu Istirahat</h5>
                                <p class="card-text" style="font-size: 30px;"><?= round($waktuBelajarData['total_waktu_istirahat'] / 60) ?> Menit</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                <h5 class="card-title">Total Sesi Pomodoro</h5>
                                <p class="card-text" style="font-size: 30px;"><?= $waktuBelajarData['total_sesi_pomodoro'] ?> Kali</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="display: flex; align-items: center; justify-content: center;">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                <h5 class="card-title">Waktu Pomodoro Harian</h5>
                                <p class="card-text" style="font-size: 30px;"><?= round($waktuBelajarData['harian_waktu_pomodoro'] / 60) ?> Menit</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                <h5 class="card-title">Waktu Istirahat Harian</h5>
                                <p class="card-text" style="font-size: 30px;"><?= round($waktuBelajarData['harian_waktu_istirahat'] / 60) ?> Menit</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                <h5 class="card-title">Sesi Pomodoro Harian</h5>
                                <p class="card-text" style="font-size: 30px;"><?= $waktuBelajarData['harian_sesi_pomodoro'] ?> Kali</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>



<?= $this->endSection('content') ?>