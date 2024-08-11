<?= $this->extend('siswa/layout/main'); ?>
<?= $this->Section('content'); ?>

<div class="container-fluid site-footer">

  <div>
    <p>
      <a href="<?= base_url('siswa/materi') ?>" style="color: white;">Materi</a>
      <span class="mx-2" style="color: white;">/</span>
      <a href="<?= base_url('siswa/materi/topik/' . $id_materi) ?>" style="color: white;"><?= $materis['nama_materi']; ?></a>
      <span class="mx-2" style="color: white;">/</span>
      <span><?= $topiks['nama_topik']; ?></span>
    </p>
  </div>

  <div class="card">
    <div class="card-body p-4 mx-auto">
      <a href="<?= base_url('siswa/materi/penjelasan/' . $id_materi . '/' . $id_topik); ?>" class="btn btn-outline-primary m-1 active">Penjelasan</a>
      <a href="<?= base_url('siswa/materi/praktik/'  . $id_materi . '/' . $id_topik); ?>" class="btn btn-outline-secondary m-1">Praktik</a>
      <a href="<?= base_url('siswa/materi/kuis/' . $id_materi . '/' . $id_topik); ?>" class="btn btn-outline-success m-1">Kuis</a>
    </div>
  </div>

  <!--  Row 1 -->
  <div class="col-lg- d-flex align-items-stretch">
    <div class="card w-100">
      <div class="">
        <div class="table-responsive">
          <table class="table mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h3 class="fw-semibold mb-0 d-flex justify-content-center"><?= $topiks['nama_topik']; ?></h3>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="border-bottom-0">
                  <p class="fw-semibold mb-0"><?= $topiks['penjelasan']; ?></p>
                </td>
                <td class="border-bottom-0">
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection('content'); ?>