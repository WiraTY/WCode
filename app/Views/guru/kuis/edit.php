<?= $this->extend('guru/layout/main'); ?>
<?= $this->Section('content'); ?>

<div class="container-fluid">

  <div>
    <p>
      <a href="<?= base_url('admin/materi') ?>">Materi</a>
      <span class="mx-2">/</span>
      <a href="<?= base_url('admin/materi/topik/' . $materi['id_materi']) ?>"><?= $materi['nama_materi']; ?></a>
      <span class="mx-2">/</span>
      <span class="mx-2">Kuis</span>
      <span class="mx-2">/</span>
      <span><?= $topik['nama_topik']; ?></span>
    </p>
  </div>

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

          <h5 class="card-title fw-semibold mb-4">Edit Soal</h5>
          <div class="table-responsive">
            <form action="<?= base_url('admin/materi/topik//kuis_proses_edit/' . $kuis['id_kuis']); ?>" method="post">
              <div class="mb-3">
                <label for="no_soal" class="form-label">No Soal</label>
                <input type="text" class="form-control" id="no_soal" name="no_soal" value="<?= $kuis['no_soal']; ?>">
              </div>
              <div class="mb-3">
                <label for="soal" class="form-label">Pertanyaan</label>
                <textarea class="form-control summernote_kuis" id="soal" name="soal"><?= htmlspecialchars($kuis['soal']); ?></textarea>
              </div>
              <div class="mb-3">
                <label for="a" class="form-label">Jawaban A</label>
                <textarea class="form-control summernote_a" id="a" name="a"><?= htmlspecialchars($kuis['a']); ?></textarea>
              </div>
              <div class="mb-3">
                <label for="b" class="form-label">Jawaban B</label>
                <textarea class="form-control summernote_b" id="b" name="b"><?= htmlspecialchars($kuis['b']); ?></textarea>
              </div>
              <div class="mb-3">
                <label for="c" class="form-label">Jawaban C</label>
                <textarea class="form-control summernote_c" id="c" name="c"><?= htmlspecialchars($kuis['c']); ?></textarea>
              </div>
              <div class="mb-3">
                <label for="d" class="form-label">Jawaban D</label>
                <textarea class="form-control summernote_d" id="d" name="d"><?= htmlspecialchars($kuis['d']); ?></textarea>
              </div>
              <div class="mb-3">
                <label for="e" class="form-label">Jawaban E</label>
                <textarea class="form-control summernote_e" id="e" name="e"><?= htmlspecialchars($kuis['e']); ?></textarea>
              </div>
              <div class="mb-3">
                <label for="kunci" class="form-label">Kunci Jawaban</label>
                <select class="form-select" id="kunci" name="kunci" aria-describedby="kunci">
                  <option value="a" <?= ($kuis['kunci'] === 'a') ? 'selected' : '' ?>>A</option>
                  <option value="b" <?= ($kuis['kunci'] === 'b') ? 'selected' : '' ?>>B</option>
                  <option value="c" <?= ($kuis['kunci'] === 'c') ? 'selected' : '' ?>>C</option>
                  <option value="d" <?= ($kuis['kunci'] === 'd') ? 'selected' : '' ?>>D</option>
                  <option value="e" <?= ($kuis['kunci'] === 'e') ? 'selected' : '' ?>>E</option>
                </select>
              </div>
              <input hidden type="text" class="form-control" id="id_topik" name="id_topik" aria-describedby="id_topik" value="<?= $kuis['id_topik']; ?>">
              <button type="submit" class="btn btn-primary">Edit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection('content'); ?>