<?= $this->extend('guru/layout/main'); ?>
<?= $this->Section('content'); ?>

<div class="container-fluid">

  <div>
    <p>
      <a href="<?= base_url('admin/materi') ?>">Materi</a>
      <span class="mx-2">/</span>
      <a href="<?= base_url('admin/materi/topik/' . $materis['id_materi']) ?>"><?= $materis['nama_materi']; ?></a>
      <span class="mx-2">/</span>
      <span class="mx-2">Kuis</span>
      <span class="mx-2">/</span>
      <span><?= $topiks['nama_topik']; ?></span>
    </p>
  </div>

  <!--  Row 1 -->
  <div class="col-lg- d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-body p-4">

        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
          <h5 class="card-title fw-semibold mb-4">List Soal</h5>
          <a type="button" class="btn btn-primary m-1" href="<?= base_url('admin/materi/topik/kuis_tambah') . '/' . $materis['id_materi'] . '/' . $topiks['id_topik'] ?>"><i class="fa fa-plus"></i> Tambah Soal</a>
        </div>
        <div class="table-responsive">
          <table class="table mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h5 class="fw-semibold mb-0">NO</h5>
                </th>
                <th class="border-bottom-0" colspan="2">
                  <h5 class="fw-semibold mb-0">SOAL</h5>
                </th>
                <th class="border-bottom-0">
                  <h5 class="fw-semibold mb-0">AKSI</h4>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($kuis as $row) : ?>
                <tr>
                  <td class="border-bottom-0" style="vertical-align: top;" rowspan="7">
                    <h5 class="fw-semibold mb-0"><?= $row['no_soal'] ?></h5>
                  </td>
                  <td class="border-bottom-0" style="vertical-align: top;" colspan="2">
                    <h5 class="fw-semibold mb-0"><?= $row['soal'] ?></h5>
                  </td>
                  <td class="border-bottom-0" style="vertical-align: top;" rowspan="7">
                    <a type="button" class="btn btn-success m-1" style="width: 100px;" href="<?= base_url('admin/materi/topik/kuis_edit/' . $materis['id_materi'] . '/' . $row['id_topik'] . '/' . $row['id_kuis']); ?>">Edit</a>
                    <a type="button" class="btn btn-danger m-1 btn-hapus" style="width: 100px;" href="<?= base_url('admin/materi/topik/kuis_hapus/' .  $row['id_kuis']) ?>">Delete</a>
                  </td>
                </tr>
                <tr>
                  <td class="border-bottom-0" style="vertical-align: top;">
                    <p class="fw-semibold mb-0">A.</p>
                  </td>
                  <td class="border-bottom-0" style="vertical-align: top;">
                    <p class="fw-semibold mb-0"><?= $row['a'] ?></p>
                  </td>
                </tr>
                <tr>
                  <td class="border-bottom-0" style="vertical-align: top;">
                    <p class="fw-semibold mb-0">B.</p>
                  </td>
                  <td class="border-bottom-0" style="vertical-align: top;">
                    <p class="fw-semibold mb-0"><?= $row['b'] ?></p>
                  </td>
                </tr>
                <tr>
                  <td class="border-bottom-0" style="vertical-align: top;">
                    <p class="fw-semibold mb-0">C.</p>
                  </td>
                  <td class="border-bottom-0" style="vertical-align: top;">
                    <p class="fw-semibold mb-0"><?= $row['c'] ?></p>
                  </td>
                </tr>
                <tr>
                  <td class="border-bottom-0" style="vertical-align: top;">
                    <p class="fw-semibold mb-0">D.</p>
                  </td>
                  <td class="border-bottom-0" style="vertical-align: top;">
                    <p class="fw-semibold mb-0"><?= $row['d'] ?></p>
                  </td>
                </tr>
                <tr>
                  <td class="border-bottom-0" style="vertical-align: top;">
                    <p class="fw-semibold mb-0">E.</p>
                  </td>
                  <td class="border-bottom-0" style="vertical-align: top;">
                    <p class="fw-semibold mb-0"><?= $row['e'] ?></p>
                  </td>
                </tr>
                <tr>
                  <td class="border-bottom-0"  colspan="2">
                    <h6 class="fw-semibold mb-0">Kunci: <span style="color: greenyellow; text-transform:uppercase;"><?= $row['kunci'] ?></span></h6>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>

<?= $this->endSection('content') ?>