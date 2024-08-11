<?= $this->extend('guru/layout/main'); ?>
<?= $this->Section('content'); ?>

<div class="container-fluid">

  <div>
    <p>
      <a href="<?= base_url('admin/materi') ?>">Materi</a>
      <span class="mx-2">/</span>
      <span><?= $materis['nama_materi']; ?></span>
    </p>
  </div>

  <!--  Row 1 -->
  <div class="col-lg- d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-body p-4">

        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
          <h5 class="card-title fw-semibold mb-4">List Topik</h5>
          <a type="button" class="btn btn-primary m-1" href="<?= base_url('admin/materi/topik/tambah') . '?id_materi=' . $id_materi ?>"><i class="fa fa-plus"></i> Tambah Topik</a>
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
              foreach ($topiks as $row) : ?>
                <tr>
                  <td class="border-bottom-0">
                    <h5 class="mb-0"><?= $no++ ?></h5>
                  </td>
                  <td class="border-bottom-0">
                    <h5 class="mb-0"><?= $row['nama_topik'] ?></h5>
                  </td>
                  <td class="border-bottom-0" style="text-align: center;">
                    <a type="button" class="btn btn-secondary m-1" style="width: 100px;" href="<?= base_url('admin/materi/topik/kuis_index/' . $row['id_materi']) . '/' . $row['id_topik']; ?>">Kuis</a>
                    <a type="button" class="btn btn-primary m-1" style="width: 100px;" href="<?= base_url('admin/materi/topik/preview/' . $row['id_materi']) . '/' . $row['id_topik']; ?>">Preview</a>
                    <a type="button" class="btn btn-success m-1" style="width: 100px;" href="<?= base_url('admin/materi/topik/edit/' . $row['id_materi']) . '/' . $row['id_topik']; ?>">Edit</a>
                    <a type="button" class="btn btn-danger m-1 btn-hapus" style="width: 100px;" href="<?= base_url('admin/materi/topik/hapus/' . $row['id_topik']); ?>">Delete</a>
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