<?= $this->extend('siswa/layout/main'); ?>
<?= $this->Section('content'); ?>

<div class="container-fluid">

  <!--  Row 1 -->
  <div class="col-lg- d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-body p-4">
        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
          <h5 class="card-title fw-semibold mb-4">List Nilai Kuis</h5>
        </div>
        <div class="table-responsive">
          <table class="table mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0" style="background-color: #5D87FF; border-radius: 10px 0 0 10px;">
                  <h5 class="fw-semibold mb-0" style="color: white;">NO</h5>
                </th>
                <th class="border-bottom-0" style="background-color: #5D87FF;">
                  <h5 class="fw-semibold mb-0" style="color: white;">Topik Kuis</h5>
                </th>
                <th class="border-bottom-0" style="background-color: #5D87FF;">
                  <h5 class="fw-semibold mb-0" style="color: white;">Nilai</h5>
                </th>
                <th class="border-bottom-0" style="background-color: #5D87FF;">
                  <h5 class="fw-semibold mb-0" style="color: white;">Tanggal Pengerjaan</h5>
                </th>
                <th class="border-bottom-0" style="background-color: #5D87FF; border-radius: 0 10px 10px 0;">
                  <h5 class="fw-semibold mb-0" style="color: white;">Kuis</h5>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($Datahasil)) : ?>
                <tr>
                  <td colspan="5" class="text-center">Tidak ada data nilai kuis.</td>
                </tr>
              <?php else : ?>
                <?php $no = 1;
                foreach ($Datahasil as $hasil) : ?>
                  <tr>
                    <td class="border-bottom-0">
                      <h5 class="fw-semibold mb-0"><?= $no++ ?></h5>
                    </td>
                    <td class="border-bottom-0">
                      <h5 class="fw-semibold mb-0"><?= $hasil['nama_topik']; ?></h5>
                    </td>
                    <td class="border-bottom-0">
                      <h5 class="fw-semibold mb-0"><?= $hasil['skor']; ?></h5>
                    </td>
                    <td class="border-bottom-0">
                      <h5 class="fw-semibold mb-0"><?= $hasil['created_at']; ?></h5>
                    </td>
                    <td class="border-bottom-0">
                      <a type="button" class="btn btn-secondary m-1" style="width: 100px;" href="<?= base_url('siswa/lihat_hasil_kuis/' . $hasil['id_topik']); ?>">Lihat</a>
                    </td>

                  </tr>
                <?php endforeach ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>

<?= $this->endSection('content') ?>