<?= $this->extend('siswa/layout/main'); ?>
<?= $this->Section('content'); ?>

<style>
  .container-fluid {
    padding: 20px;
    /* Tambahkan ruang padding agar tata letak terlihat lebih baik */
  }

  /* Style untuk card dengan gambar dan penjelasan */
  .responsive-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
  }

  .responsive-card .image-container {
    flex: 1;
  }

  .responsive-card img {
    max-width: 100%;
    height: auto;
  }

  .responsive-card .description-container {
    flex: 1;
    padding: 20px;
  }

  @media (min-width: 768px) {

    /* Style untuk layar yang lebih besar dari 768px */
    .responsive-card {
      flex-direction: row;
      /* Ubah tata letak menjadi baris pada layar yang lebih besar */
    }

    .responsive-card .image-container,
    .responsive-card .description-container {
      flex: 1;
    }
  }
</style>

<div class="container-fluid site-footer">

  <div class="row" style="display: flex; align-items: center; justify-content: center;">
    <div class="col-md-4">
      <div class="card" style="background-color: #FFFFFF; border: 4px solid #13DBB7; border-radius: 20px">
        <div class="card-body" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
          <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
            <h5 class="card-title">Jumlah Materi Selesai</h5>
            <div class="row vertical-center-box vertical-center-box-tablet">
              <div class="col-xs-9 cus-gh-hd-pro">
                <?php
                $jumlahMateriSelesai = count(array_filter($materiSelesai));
                ?>
                <h4 class="text-center no-margin"><?= $jumlahMateriSelesai ?> / <?= $jumlahMateri ?></h4>
              </div>
            </div>
            <div class="progress progress-mini">
              <div style="width: <?= ($jumlahMateriSelesai / $jumlahMateri) * 100 ?>%;" class="progress-bar bg-success"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card" style="background-color: #FFFFFF; border: 4px solid #13DBB7; border-radius: 20px">
        <div class="card-body" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
          <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
            <h5 class="card-title">Jumlah Topik Selesai</h5>
            <div class="row vertical-center-box vertical-center-box-tablet">
              <div class="col-xs-9 cus-gh-hd-pro">
                <h4 class="text-center no-margin"><?= $jumlahTopikSelesai ?> / <?= $jumlahTopik ?></h4>
              </div>
            </div>
            <div class="progress progress-mini">
              <div style="width: <?= ($jumlahTopikSelesai / $jumlahTopik) * 100 ?>%;" class="progress-bar bg-success"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card" style="background-color: #FFFFFF; border: 4px solid #13DBB7; border-radius: 20px">
        <div class="card-body" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
          <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
            <h5 class="card-title">Jumlah Kuis Selesai</h5>
            <div class="row vertical-center-box vertical-center-box-tablet">
              <div class="col-xs-9 cus-gh-hd-pro">
                <h4 class="text-center no-margin"><?= $jumlahKuisSelesai ?> / <?= $jumlahKuis ?></h4>
              </div>
            </div>
            <div class="progress progress-mini">
              <div style="width: <?= ($jumlahKuisSelesai / $jumlahKuis) * 100 ?>%;" class="progress-bar bg-success"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-body p-0" style="display: flex; align-items: center;">

      <div class="responsive-card">
        <div class="image-container">
          <img src="<?= base_url('assets/guru/images/html.png') ?>" alt="Deskripsi Gambar">
        </div>
        <div class="description-container">
          <h3 style="font-weight: bold;">WCode</h3>
          <p style="text-align: justify;">
            WCode merupakan media pembelajaran berbasis <i>Responsive Web Design</i> untuk mempelajari materi pemrograman web.
            Tujuannya untuk membantu meningkatkan kemandirian belajar siswa dengan fitur-fitur seperti manajemen waktu Pomodoro,
            pemantauan materi yang sudah dipelajari, <i>live coding</i> untuk mempelajari praktik coding, dan kuis untuk memantau pemahaman siswa.
            Fitur-fitur dalam website ini dapat digunakan melalui <i>smartphone</i>, sehingga dapat mempermudah siswa dalam mengakses media pembelajaran ini kapan pun dan di mana pun.
          </p>
          <a href="<?= base_url('siswa/petunjuk'); ?>" class="btn btn-primary" style="float: right;">Petunjuk Penggunaan <i class="fas fa-arrow-right" style="margin-left: 5px;"></i></a>
        </div>
      </div>

    </div>
  </div>

  <div class="card p-0">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-3">Mulai Belajar</h5>
      <div class="row" style="display: flex; align-items: center; justify-content: left;">
        <?php foreach ($materis as $row) : ?>
          <div class="col-6 col-md-4">
            <div class="card overflow-hidden rounded-2 <?= ($row['status_pembelajaran'] == 1) ? 'opened' : ''; ?>">
              <div class="position-relative">
                <a href="<?= base_url('siswa/materi/topik/' . $row['id_materi']); ?>">
                  <img src="<?= base_url('assets/guru/images/html2.png') ?>" class="card-img-top rounded-0" alt="...">
                </a>
              </div>
              <div class="card-body pt-3 p-4">
                <h5 class="fw-semibold fs-4 text-center <?= ($row['status_pembelajaran'] == 1) ? 'opened-text' : ''; ?>"><?= $row['nama_materi'] ?></h5>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

</div>

<?= $this->endSection('content') ?>