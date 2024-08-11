<?= $this->extend('guru/layout/main'); ?>
<?= $this->Section('content'); ?>

<div class="container-fluid">

  <div class="row" style="display: flex; align-items: center; justify-content: center;">
    <div class="col-md-4">
      <div class="card" style="background: #7da0fa; color: white">
        <div class="card-body" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
          <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
            <h5 class="card-title" style="color: white;">Jumlah Materi</h5>
            <div class="row vertical-center-box vertical-center-box-tablet">
              <div class="col-xs-9 cus-gh-hd-pro">
                <h4 class="text-center no-margin" style="color: white;"><?= $jumlahMateri ?></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card" style="background: #4747a1; color: white">
        <div class="card-body" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
          <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
            <h5 class="card-title" style="color: white;">Jumlah Topik</h5>
            <div class="row vertical-center-box vertical-center-box-tablet">
              <div class="col-xs-9 cus-gh-hd-pro">
                <h4 class="text-center no-margin" style="color: white;"><?= $jumlahTopik ?></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card" style="background: #f3797e; color: white">
        <div class="card-body" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
          <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
            <h5 class="card-title" style="color: white;">Jumlah Kuis</h5>
            <div class="row vertical-center-box vertical-center-box-tablet">
              <div class="col-xs-9 cus-gh-hd-pro">
                <h4 class="text-center no-margin" style="color: white;"><?= $jumlahKuis ?></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-8 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-body">
          <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
            <div class="mb-3 mb-sm-0">
              <h5 class="card-title fw-semibold">Topik dan Kuis Dibuka</h5>
            </div>
            <div>
              <select class="form-select">
                <option value="1">HTML</option>
              </select>
            </div>
          </div>
          <div id="chart"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 order-1">
      <div class="row">

        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card" style="border: 2px solid #13DBB7; border-radius: 20px">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="../assets/guru/icons/chart.png" alt="chart" class="rounded" />
                </div>
              </div>
              <span class="fw-semibold d-block mb-1">Rata-Rata Waktu Belajar Siswa</span>
              <h5 class="text-success fw-semibold"><?= $averageStudyTime ?> menit</h5>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card" style="border: 2px solid #13DBB7; border-radius: 20px">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="../assets/guru/icons/chart-success.png" alt="chart success" class="rounded" />
                </div>
              </div>
              <span class="fw-semibold d-block mb-1">Rata-Rata Waktu Istirahat Siswa</span>
              <h5 class="text-success fw-semibold"><?= $averageRestTime ?> menit</h5>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card" style="border: 2px solid #13DBB7; border-radius: 20px">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="../assets/guru/icons/wallet-info.png" alt="wallet-info" class="rounded" />
                </div>
              </div>
              <span class="fw-semibold d-block mb-1">Rata-Rata Sesi Belajar Siswa</span>
              <h5 class="text-success fw-semibold"><?= $averageSession ?> sesi</h5>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card" style="border: 2px solid #13DBB7; border-radius: 20px">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="../assets/guru/icons/cc-primary.png" alt="cc-primary" class="rounded" />
                </div>
              </div>
              <span class="fw-semibold d-block mb-1">Siswa yang Paling Rajin</span>
              <h5 class="text-success fw-semibold"><?= $usernameWithMostKuis ?></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- <div class="col-md-6 grid-margin transparent">
    <div class="row">
      <div class="col-md-6 mb-4 stretch-card transparent">
        <div class="card card-tale" style="background: #7da0fa; color: white">
          <div class="card-body">
            <p class="mb-4">Today’s Bookings</p>
            <p class="fs-30 mb-2">4006</p>
            <p>10.00% (30 days)</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-4 stretch-card transparent">
        <div class="card card-dark-blue" style="background: #4747a1; color: white">
          <div class="card-body">
            <p class="mb-4">Total Bookings</p>
            <p class="fs-30 mb-2">61344</p>
            <p>22.00% (30 days)</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
        <div class="card card-light-blue" style="background: #7978e9; color: white">
          <div class="card-body">
            <p class="mb-4">Number of Meetings</p>
            <p class="fs-30 mb-2">34040</p>
            <p>2.00% (30 days)</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 stretch-card transparent">
        <div class="card card-light-danger" style="background: #f3797e; color: white">
          <div class="card-body">
            <p class="mb-4">Number of Clients</p>
            <p class="fs-30 mb-2">47033</p>
            <p>0.22% (30 days)</p>
          </div>
        </div>
      </div>
    </div>
  </div> -->

</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts/dist/apexcharts.min.js"></script>
<script>
  const chartData = <?php echo json_encode($usersByTopik); ?>;
  const labels = chartData.map(data => data.nama_topik);
  const data = chartData.map(data => data.jumlah_user);

  const chartDataKuis = <?php echo json_encode($usersByKuis); ?>;
  const dataKuis = chartDataKuis.map(data => data.jumlah_user);
  var chart = {
    series: [{
        name: "Jumlah Siswa Membuka Topik",
        data: data
      },
      {
        name: "Jumlah Siswa Membuka Kuis:",
        data: dataKuis
      },
    ],

    chart: {
      type: "bar",
      height: 360,
      offsetX: -15,
      toolbar: {
        show: true
      },
      foreColor: "#adb0bb",
      fontFamily: 'inherit',
      sparkline: {
        enabled: false
      },
    },

    colors: ["#5D87FF", "#49BEFF"],

    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: "35%",
        borderRadius: [6],
        borderRadiusApplication: 'end',
        borderRadiusWhenStacked: 'all'
      },
    },
    markers: {
      size: 0
    },

    dataLabels: {
      enabled: false,
    },

    legend: {
      show: false,
    },

    grid: {
      borderColor: "rgba(0,0,0,0.1)",
      strokeDashArray: 3,
      xaxis: {
        lines: {
          show: false,
        },
      },
    },

    xaxis: {
      type: "category",
      categories: labels,
      labels: {
        style: {
          cssClass: "grey--text lighten-2--text fill-color"
        },
      },
    },

    yaxis: {
      show: true,
      min: 0,
      max: 50,
      tickAmount: 4,
      labels: {
        style: {
          cssClass: "grey--text lighten-2--text fill-color"
        },
      },
    },
    stroke: {
      show: true,
      width: 3,
      lineCap: "butt",
      colors: ["transparent"],
    },

    tooltip: {
      theme: "light"
    },

    responsive: [{
      breakpoint: 600,
      options: {
        plotOptions: {
          bar: {
            borderRadius: 3,
          }
        }
      }
    }]
  };

  var chart = new ApexCharts(document.querySelector("#chart"), chart);
  chart.render();
</script>


<?= $this->endSection('content') ?>