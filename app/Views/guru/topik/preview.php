<?= $this->extend('guru/layout/main'); ?>
<?= $this->Section('content'); ?>

<div class="container-fluid">

  <div>
    <p>
      <a href="<?= base_url('admin/materi') ?>">Materi</a>
      <span class="mx-2">/</span>
      <a href="<?= base_url('admin/materi/topik/' . $id_materi) ?>"><?= $materis['nama_materi']; ?></a>
      <span class="mx-2">/</span>
      <span><?= $topiks['nama_topik']; ?></span>
    </p>
  </div>

  <!--  Row 1 -->
  <div class="col-lg- d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Preview</h5>
        <div class="table-responsive">
          <table class="table mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h3 class="fw-semibold mb-0 d-flex justify-content-center"><?= $topiks['nama_topik']; ?></h3>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="border-bottom-0">
                  <p class="fw-semibold mb-0"><?= $topiks['penjelasan']; ?></p>
                </td>
                <td class="border-bottom-0">
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection('content'); ?>