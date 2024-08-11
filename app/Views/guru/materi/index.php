<?= $this->extend('guru/layout/main'); ?>
<?= $this->Section('content'); ?>

<div class="container-fluid">

  <div>
    <p>
      <a>Materi</a>
      <span class="mx-2">/</span>
    </p>
  </div>

  <!--  Row 1 -->
  <div class="col-lg- d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-body p-4">
        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
          <h5 class="card-title fw-semibold mb-4">List Materi</h5>
          <a type="button" class="btn btn-primary m-1" href="<?= base_url('admin/materi/tambah') ?>"><i class="fa fa-plus"></i> Tambah Materi</a>
        </div>
        <div class="table-responsive">
          <table class="table mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0" style="background-color: #5D87FF; border-radius: 10px 0 0 10px;">
                  <h5 class="fw-semibold mb-0" style="color: white;">NO</h5>
                </th>
                <th class="border-bottom-0" style="background-color: #5D87FF;">
                  <h5 class="fw-semibold mb-0" style="color: white;">MATERI</h5>
                </th>
                <th class="border-bottom-0" style="background-color: #5D87FF; border-radius: 0 10px 10px 0;">
                  <h5 class="fw-semibold mb-0" style="color: white;">AKSI</h4>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($materis as $row) : ?>
                <tr>
                  <td class="border-bottom-0">
                    <h5 class="fw-semibold mb-0"><?= $no++ ?></h5>
                  </td>
                  <td class="border-bottom-0">
                    <h5 class="fw-semibold mb-0"><?= $row['nama_materi'] ?></h5>
                  </td>
                  <td class="border-bottom-0">
                    <a type="button" class="btn btn-primary m-1" href="<?= base_url('admin/materi/topik/' . $row['id_materi']); ?>">Lihat Topik</a>
                    <a type="button" class="btn btn-success m-1" href="<?= base_url('admin/materi/edit/' . $row['id_materi']); ?>">Edit</a>
                    <a type="button" class="btn btn-danger m-1 btn-hapus" href="<?= base_url('admin/materi/hapus/' . $row['id_materi']); ?>">Delete</a>
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