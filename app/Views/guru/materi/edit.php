<?= $this->extend('guru/layout/main'); ?>
<?= $this->Section('content'); ?>

<div class="container-fluid">

  <div>
    <p>
      <a href="<?= base_url('admin/materi') ?>">Materi</a>
      <span class="mx-2">/</span>
      <span>Edit Materi</span>
    </p>
  </div>

  <div class="container-fluid">
    <div class="col-lg- d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold mb-4">Edit Materi</h5>
          <div class="table-responsive">
            <form action="<?= base_url('admin/materi/proses_edit/' . $materi['id_materi']); ?>" method="post">
              <div class="mb-3">
                <label for="nama_materi" class="form-label">Judul Materi</label>
                <input type="text" class="form-control" id="nama_materi" name="nama_materi" value="<?= $materi['nama_materi']; ?>">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection('content'); ?>