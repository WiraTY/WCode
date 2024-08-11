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
      <a href="<?= base_url('siswa/materi/penjelasan/' . $id_materi . '/' . $id_topik); ?>" class="btn btn-outline-primary m-1">Penjelasan</a>
      <a href="<?= base_url('siswa/materi/praktik/'  . $id_materi . '/' . $id_topik); ?>" class="btn btn-outline-secondary m-1">Praktik</a>
      <a href="<?= base_url('siswa/materi/kuis/' . $id_materi . '/' . $id_topik); ?>" class="btn btn-outline-success m-1 active">Kuis</a>
    </div>
  </div>

  <?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger" role="alert">
      <?= session()->getFlashdata('error'); ?>
    </div>
  <?php endif; ?>

  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Kuis</h5>
      <form action="<?= base_url('siswa/materi/submit_kuis'); ?>" method="post" onsubmit="return validateForm()">
        <input type="hidden" name="jumlah_soal" value="<?= $jumlah_soal ?>">
        <div class="question-group">
          <table class="table mb-0 align-middle">
            <tbody>
              <?php if ($kuis) : ?>
                <?php $i = 1; ?>
                <?php foreach ($kuis as $item) : ?>
                  <tr>
                    <td class="border-bottom-0" style="vertical-align: top;" rowspan="6">
                      <h6 class="fw-semibold mb-0"><?= $item['no_soal'] ?></h6>
                    </td>
                    <td class="border-bottom-0" style="vertical-align: top;" colspan="2">
                      <h6 class="fw-semibold mb-0"><?= $item['soal'] ?></h6>
                    </td>
                  </tr>
                  <tr>
                    <td class="border-bottom-0" style="vertical-align: top;">
                      <input type="radio" name="jawaban[<?= $item['id_kuis']; ?>]" value="a" data-kunci="<?= $item['kunci'] ?>" <?= isset($jawaban_session[$item['id_kuis']]) && $jawaban_session[$item['id_kuis']] === 'a' ? 'checked' : '' ?>>
                    </td>
                    <td class="border-bottom-0" style="vertical-align: top;">
                      <p class="fw-semibold mb-0"><?= $item['a']; ?></p>
                    </td>
                  </tr>
                  <tr>
                    <td class="border-bottom-0" style="vertical-align: top;">
                      <input type="radio" name="jawaban[<?= $item['id_kuis']; ?>]" value="b" data-kunci="<?= $item['kunci'] ?>" <?= isset($jawaban_session[$item['id_kuis']]) && $jawaban_session[$item['id_kuis']] === 'b' ? 'checked' : '' ?>>
                    </td>
                    <td class="border-bottom-0" style="vertical-align: top;">
                      <p class="fw-semibold mb-0"><?= $item['b']; ?></p>
                    </td>
                  </tr>
                  <tr>
                    <td class="border-bottom-0" style="vertical-align: top;">
                      <input type="radio" name="jawaban[<?= $item['id_kuis']; ?>]" value="c" data-kunci="<?= $item['kunci'] ?>" <?= isset($jawaban_session[$item['id_kuis']]) && $jawaban_session[$item['id_kuis']] === 'c' ? 'checked' : '' ?>>
                    </td>
                    <td class="border-bottom-0" style="vertical-align: top;">
                      <p class="fw-semibold mb-0"><?= $item['c']; ?></p>
                    </td>
                  </tr>
                  <tr>
                    <td class="border-bottom-0" style="vertical-align: top;">
                      <input type="radio" name="jawaban[<?= $item['id_kuis']; ?>]" value="d" data-kunci="<?= $item['kunci'] ?>" <?= isset($jawaban_session[$item['id_kuis']]) && $jawaban_session[$item['id_kuis']] === 'd' ? 'checked' : '' ?>>
                    </td>
                    <td class="border-bottom-0" style="vertical-align: top;">
                      <p class="fw-semibold mb-0"><?= $item['d']; ?></p>
                    </td>
                  </tr>
                  <tr>
                    <td class="border-bottom-0" style="vertical-align: top;">
                      <input type="radio" name="jawaban[<?= $item['id_kuis']; ?>]" value="e" data-kunci="<?= $item['kunci'] ?>" <?= isset($jawaban_session[$item['id_kuis']]) && $jawaban_session[$item['id_kuis']] === 'e' ? 'checked' : '' ?>>
                    </td>
                    <td class="border-bottom-0" style="vertical-align: top;">
                      <p class="fw-semibold mb-0"><?= $item['e']; ?></p>
                    </td>
                  </tr>
                  <input type="hidden" name="id_topik" value="<?= $item['id_topik']; ?>">
                <?php endforeach; ?>
              <?php else : ?>
                <p>Tidak ada kuis</p>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
        <button type="submit" class="btn btn-outline-success m-1">Kirim Jawaban</button>
      </form>
    </div>
  </div>
</div>

<script>
  function validateForm() {
    var questionGroups = document.querySelectorAll('.question-group');
    var allQuestionsAnswered = true;

    questionGroups.forEach(function(group) {
      var radioInputs = group.querySelectorAll('input[type="radio"]');
      var anyInputSelected = false;

      radioInputs.forEach(function(input) {
        if (input.checked) {
          anyInputSelected = true;
        }
      });

      if (!anyInputSelected) {
        allQuestionsAnswered = false;
      }
    });

    if (!allQuestionsAnswered) {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Pastikan Anda telah menjawab semua pertanyaan.'
      });
      return false;
    }

    return true;
  }
</script>

<?= $this->endSection('content') ?>