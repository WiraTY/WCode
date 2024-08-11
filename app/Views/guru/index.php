<?= $this->extend('guru/layout/main'); ?>
<?= $this->Section('content'); ?>

<div class="container-fluid">
  
  <!--  Row 1 -->
  <div class="col-lg- d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-body p-4">
        <?php if (session()->get('success')) : ?>
          <div class="alert alert-success">
            <?= session()->get('success') ?>
          </div>
        <?php endif; ?>
        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
          <h5 class="card-title fw-semibold mb-4">List Materi</h5>
          <a type="button" class="btn btn-primary m-1" href="<?= base_url('admin/materi/tambah') ?>"><i class="fa fa-plus"></i> Tambah Materi</a>
        </div>
        <div class="table-responsive">
          <table class="table mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h5 class="fw-semibold mb-0">NO</h5>
                </th>
                <th class="border-bottom-0">
                  <h5 class="fw-semibold mb-0">MATERI</h5>
                </th>
                <th class="border-bottom-0">
                  <h5 class="fw-semibold mb-0">AKSI</h4>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($materis as $row) : ?>
                <tr>
                  <td class="border-bottom-0">
                    <h5 class="fw-semibold mb-0"><?= $row['id_topik'] ?></h5>
                  </td>
                  <td class="border-bottom-0">
                    <h5 class="fw-semibold mb-0"><?= $row['materi'] ?></h5>
                  </td>
                </tr>
                <tr>
                  <td class="border-bottom-0">
                    <h5 class="fw-semibold mb-0"></h5>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0"><?= character_limiter($row['penjelasan'], 1000); ?></h6>
                  </td>
                  <td class="border-bottom-0">
                    <a type="button" class="btn btn-primary m-1" href="<?= base_url('admin/materi/preview/' . $row['id_topik']); ?>">Preview</a>
                    <a type="button" class="btn btn-success m-1" href="<?= base_url('admin/materi/edit/' . $row['id_topik']); ?>">Edit</a>
                    <a type="button" class="btn btn-danger m-1" href="<?= base_url('admin/materi/delete/' . $row['id_topik']); ?>">Delete</a>
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