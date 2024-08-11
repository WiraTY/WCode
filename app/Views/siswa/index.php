<?= $this->extend('siswa/layout/main'); ?>
<?= $this->Section('content'); ?>

<div class="container-fluid">

  <div>
    <p>
      <span style="color: white;">Materi</span>
      <span class="mx-2" style="color: white;">/</span>
    </p>
  </div>

  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Daftar Materi</h5>
      <!-- <?php foreach ($materis as $row) : ?>
        <div class="card <?= ($row['status_pembelajaran'] == 1) ? 'opened' : ''; ?>">
          <a href="<?= base_url('siswa/materi/topik/' . $row['id_materi']); ?>">
            <div class="card-body">
              <h5 class="card-title <?= ($row['status_pembelajaran'] == 1) ? 'opened-text' : ''; ?>">
                <?= $row['nama_materi'] ?>
              </h5>
            </div>
          </a>
        </div>
      <?php endforeach; ?> -->
      <?php foreach ($materis as $row) : ?>
        <div class="col-6 col-md-4">
          <div class="card overflow-hidden rounded-2  <?= ($row['status_pembelajaran'] == 1) ? 'opened' : ''; ?>">
            <div class="position-relative">
              <a href="<?= base_url('siswa/materi/topik/' . $row['id_materi']); ?>"><img src="<?= base_url('assets/guru/images/html2.png') ?>" class="card-img-top rounded-0" alt="..."></a>
            </div>
            <div class="card-body pt-3 p-4">
              <h5 class="fw-semibold fs-4 text-center <?= ($row['status_pembelajaran'] == 1) ? 'opened-text' : ''; ?>"><?= $row['nama_materi'] ?></h5>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>



<?= $this->endSection('content') ?>