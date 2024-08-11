<?= $this->extend('guru/layout/main'); ?>
<?= $this->Section('content'); ?>

<div class="container-fluid">
  <div class="container-fluid">
    <div class="col-lg- d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold mb-4">Tambah Materi</h5>
          <div class="table-responsive">
            <form action="<?= base_url('admin/materi/proses_tambah') ?>" method="post">
              <div class="mb-3">
                <label for="mater" class="form-label">Judul Materi</label>
                <input type="text" class="form-control" id="materi" name="materi" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="penjelasan" class="form-label">Penjelasan</label>
                <textarea class="form-control summernote" id="penjelasan" name="penjelasan" rows="4" cols="50" style="height:100%;"></textarea>
              </div>
              <div class="mb-3">
                <label for="code" class="form-label">Code</label>
                <textarea class="form-control" name="code" id="code" cols="50" rows="10"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
        <div ></div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection('content'); ?>