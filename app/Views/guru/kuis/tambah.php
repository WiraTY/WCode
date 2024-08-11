<?= $this->extend('guru/layout/main'); ?>
<?= $this->Section('content'); ?>

<div class="container-fluid">



  <div class="container-fluid">
    <div class="col-lg- d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">

          <?php if (session()->has('errors')) : ?>
            <div class="alert alert-danger">
              <ul>
                <?php foreach (session('errors') as $error) : ?>
                  <li><?= esc($error) ?></li>
                <?php endforeach ?>
              </ul>
            </div>
          <?php endif ?>

          <h5 class="card-title fw-semibold mb-4">Tambah Soal</h5>
          <div class="table-responsive">
            <form action="<?= base_url('admin/materi/topik/kuis_proses_tambah') ?>" method="post">
              <div class="mb-3">
                <label for="no_soal" class="form-label">No Soal</label>
                <input type="text" class="form-control" id="no_soal" name="no_soal" aria-describedby="no_soal">
              </div>
              <div class="mb-3">
                <label for="soal" class="form-label">Pertanyaan</label>
                <textarea class="form-control summernote_kuis" id="soal" name="soal" rows="4" cols="50" style="height:100%;"></textarea>
              </div>
              <div class="mb-3">
                <label for="a" class="form-label">Jawaban A</label>
                <textarea class="form-control summernote_kuis" name="a" id="a" cols="50" rows="10"></textarea>
              </div>
              <div class="mb-3">
                <label for="b" class="form-label">Jawaban B</label>
                <textarea class="form-control summernote_kuis" name="b" id="b" cols="50" rows="10"></textarea>
              </div>
              <div class="mb-3">
                <label for="c" class="form-label">Jawaban C</label>
                <textarea class="form-control summernote_kuis" name="c" id="c" cols="50" rows="10"></textarea>
              </div>
              <div class="mb-3">
                <label for="d" class="form-label">Jawaban D</label>
                <textarea class="form-control summernote_kuis" name="d" id="d" cols="50" rows="10"></textarea>
              </div>
              <div class="mb-3">
                <label for="e" class="form-label">Jawaban E</label>
                <textarea class="form-control summernote_kuis" name="e" id="e" cols="50" rows="10"></textarea>
              </div>
              <div class="mb-3">
                <label for="kunci" class="form-label">Kunci Jawaban</label>
                <select class="form-select" id="kunci" name="kunci" aria-describedby="kunci">
                  <option value="a">A</option>
                  <option value="b">B</option>
                  <option value="c">C</option>
                  <option value="d">D</option>
                  <option value="e">E</option>
                </select>
              </div>
              <input hidden type="text" class="form-control" id="id_materi" name="id_materi" aria-describedby="id_materi" value="<?= $materis['id_materi']; ?>">
              <input hidden type="text" class="form-control" id="id_topik" name="id_topik" aria-describedby="id_topik" value="<?= $topiks['id_topik']; ?>">
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
        <div></div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection('content'); ?>