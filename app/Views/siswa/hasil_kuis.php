<?= $this->extend('siswa/layout/main'); ?>
<?= $this->Section('content'); ?>

<div class="container-fluid site-footer">


  <div class="card">
    <div class="card-body">
      <h3 class="card-title fw-semibold mb-4">Kuis</h3>
      <h4>Skor Anda: <?php echo round($skor) ?></h4>
    </div>

    <table class="table mb-0 align-middle">
      <tbody>
        <?php if ($kuis) : ?>
          <?php foreach ($kuis as $item) : ?>
            <tr>
              <td class="border-bottom-0" style="vertical-align: top;" rowspan="6">
                <h6 class="fw-semibold mb-0"><?= $item['no_soal'] ?></h6>
              </td>
              <td class="border-bottom-0" style="vertical-align: top;" colspan="2">
                <h6 class="fw-semibold mb-0"><?= $item['soal'] ?></h6>
              </td>
            </tr>
            <?php $jawaban_pengguna = isset($jawaban[$item['id_kuis']]) ? $jawaban[$item['id_kuis']] : ''; ?>
            <?php foreach (['a', 'b', 'c', 'd', 'e'] as $choice) : ?>
              <?php
              // Determine the color based on whether the user's answer matches the correct answer
              $warna = '';
              if ($jawaban_pengguna === $choice) {
                $warna = ($jawaban_pengguna === $item['kunci']) ? '#13DBB7' : '#FE8484';
              }
              ?>
              <tr style="vertical-align: top;">
                <td class="border-bottom-0">
                  <input type="radio" name="jawaban[<?= $item['id_kuis']; ?>]" value="<?= $choice ?>" <?= ($jawaban_pengguna === $choice) ? 'checked' : '' ?> disabled>
                </td>
                <td class="border-bottom-0">
                  <?php if ($choice === $item['kunci'] || $jawaban_pengguna === $choice) : ?>
                    <div class="card" style="border-color: <?= ($choice === $item['kunci']) ? '#13DBB7' : $warna ?>; border-width: 2px; padding: 10px;">
                      <p class="fw-semibold mb-0"><?= $item[$choice]; ?></p>
                    </div>
                  <?php else : ?>
                    <p class="fw-semibold mb-0" style="color: <?= $warna ?>"><?= $item[$choice]; ?></p>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
            <tr>
              <td></td>
              <td colspan="2" class="border-bottom-0">
                <p class="fw-semibold mb-0">Kunci: <span style="color: #13DBB7; text-transform:uppercase;"><?= $item['kunci']; ?></span></p>
                <?php
                // Display the content of the selected answer from the database
                $selectedAnswerContent = $item[$item['kunci']];
                ?>
                <p class="fw-semibold mb-0"><?= $selectedAnswerContent; ?></p>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else : ?>
          <tr>
            <td colspan="2">
              <p>Tidak ada kuis</p>
            </td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>


  </div>


</div>



<?= $this->endSection('content') ?>