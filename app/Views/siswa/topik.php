<?= $this->extend('siswa/layout/main'); ?>
<?= $this->Section('content'); ?>

<style>
  .topik {
    border: 2px solid #4F73D9;
    border-radius: 20px;
    transition: background-color 0.3s ease;
    /* Menambahkan efek transisi */
  }

  .topik:hover {
    background-color: #4F73D9;
  }

  .topik:hover .card-title {
        color: white; /* Mengubah warna teks menjadi putih */
    }
</style>

<div class="container-fluid site-footer">

  <div>
    <p>
      <a href="<?= base_url('siswa/materi') ?>" style="color: white;">Materi</a>
      <span class="mx-2" style="color: white;">/</span>
      <span><?= $materis['nama_materi']; ?></span>
    </p>
  </div>

  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Daftar Topik</h5>

      <?php foreach ($topiks as $row) : ?>
        <div class="card topik <?= (isset($row['status_pembelajaran']) && $row['status_pembelajaran'] == 1) ? 'opened' : ''; ?>">
          <a href="<?= base_url('siswa/materi/penjelasan/' . $row['id_materi']) . '/' . $row['id_topik']; ?>">
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <img src="<?= base_url('assets/guru/images/' . $row['gambar']) ?>" style="border-radius: 6px 0 0 6px;" width="100vh" height="100vh" class="img-fluid" alt="">
              </div>
              <div class="col">
                <div class="card-block px-2">
                  <h5 class="card-title <?= (isset($row['status_pembelajaran']) && $row['status_pembelajaran'] == 1) ? 'opened-text' : ''; ?>"><?= $row['nama_topik'] ?></h5>
                </div>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach ?>

      <!-- <?php foreach ($topiks as $row) : ?>
        <div class="card <?= (isset($row['status_pembelajaran']) && $row['status_pembelajaran'] == 1) ? 'opened' : ''; ?>">
          <a href="<?= base_url('siswa/materi/penjelasan/' . $row['id_materi']) . '/' . $row['id_topik']; ?>">
            <div class="card-body">
              <h5 class="card-title <?= (isset($row['status_pembelajaran']) && $row['status_pembelajaran'] == 1) ? 'opened-text' : ''; ?>"><?= $row['nama_topik'] ?></h5>
            </div>
          </a>
        </div>
      <?php endforeach ?> -->
    </div>
  </div>
</div>



<?= $this->endSection('content') ?>