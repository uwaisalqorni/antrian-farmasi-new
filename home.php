<!DOCTYPE html>
<html lang="id" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
  data-assets-path="assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Portal Farmasi - RS Islam Gondanglegi</title>
  <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Helpers -->
  <script src="assets/vendor/js/helpers.js"></script>
  <script src="assets/js/config.js"></script>

  <style>
    .card-widget {
      transition: all 0.3s ease;
      border: none;
      overflow: hidden;
      position: relative;
      color: white;
    }

    .card-widget:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .card-widget .card-body {
      position: relative;
      z-index: 2;
    }

    .card-widget .icon-bg {
      position: absolute;
      right: -20px;
      top: -20px;
      font-size: 8rem;
      opacity: 0.1;
      transform: rotate(15deg);
      z-index: 1;
    }

    .widget-chart-placeholder {
      height: 50px;
      width: 100%;
      margin-top: 1rem;
      opacity: 0.5;
    }
    
    /* Custom Colors matching CoreUI reference */
    .bg-primary-gradient { background: linear-gradient(45deg, #321fdb, #5e4be6); }
    .bg-info-gradient { background: linear-gradient(45deg, #39f, #2eb85c); } /* Adjusted to match blue-ish */
    .bg-warning-gradient { background: linear-gradient(45deg, #f9b115, #f6cc35); color: #fff !important; }
    .bg-danger-gradient { background: linear-gradient(45deg, #e55353, #d93737); }
    .bg-success-gradient { background: linear-gradient(45deg, #2eb85c, #321fdb); } /* Adjusted */

    /* Specific overrides for better match */
    .bg-purple { background: #5856d6; }
    .bg-blue { background: #39f; }
    .bg-yellow { background: #f9b115; }
    .bg-red { background: #e55353; }
    .bg-green { background: #2eb85c; }

    .text-white-50 { color: rgba(255, 255, 255, 0.8) !important; }
  </style>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="home.php" class="app-brand-link">
            <span class="app-brand-logo demo">
               <img src="assets/images/logo.png" alt="Logo" style="width: 40px;">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2" style="text-transform: uppercase; font-size: 1.2rem;">Farmasi</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <li class="menu-item active">
            <a href="home.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Analytics">Dashboard</div>
            </a>
          </li>

          <!-- Layouts -->
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Aplikasi</span>
          </li>

          <li class="menu-item">
            <a href="index.html" class="menu-link">
              <i class="menu-icon tf-icons bx bx-tv"></i>
              <div data-i18n="Display Antrian">Display Antrian</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="cetak_antrian.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-printer"></i>
              <div data-i18n="Petugas Farmasi">Petugas Farmasi</div>
            </a>
          </li>
           <li class="menu-item">
            <a href="laporan_spm.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-bar-chart-alt-2"></i>
              <div data-i18n="Laporan SPM">Laporan SPM</div>
            </a>
          </li>
           <li class="menu-item">
            <a href="survei_kepuasan.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-smile"></i>
              <div data-i18n="Survei Pasien">Survei Pasien</div>
            </a>
          </li>
           <li class="menu-item">
            <a href="laporan_kepuasan.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-pie-chart-alt"></i>
              <div data-i18n="Laporan Kepuasan">Laporan Kepuasan</div>
            </a>
          </li>
        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <span class="fw-bold fs-4" id="namars">Loading...</span>
              </div>
            </div>
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
               <li class="nav-item lh-1 me-3">
                  <div class="d-flex align-items-center gap-2">
                    <i class="bx bx-time-five fs-4"></i>
                    <span id="clock" class="fw-bold fs-5">00:00:00</span>
                  </div>
               </li>
            </ul>
          </div>
        </nav>
        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Home /</span> Dashboard</h4>

            <div class="row">
              
              <!-- Display Antrian -->
              <div class="col-sm-6 col-lg-4 mb-4">
                <a href="index.html" class="text-decoration-none">
                  <div class="card card-widget bg-purple">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-start">
                        <div>
                          <h4 class="card-title text-white mb-1">Display Antrian</h4>
                          <span class="text-white-50">Layar Ruang Tunggu</span>
                        </div>
                        <div class="p-2 bg-white bg-opacity-25 rounded">
                          <i class="bx bx-tv text-white fs-3"></i>
                        </div>
                      </div>
                      <div class="mt-4">
                        <small class="text-white-50">Lihat Tampilan</small>
                        <i class="bx bx-right-arrow-alt float-end text-white fs-4"></i>
                      </div>
                      <!-- Background Icon -->
                      <i class="bx bx-tv icon-bg"></i>
                    </div>
                  </div>
                </a>
              </div>

              <!-- Petugas Farmasi -->
              <div class="col-sm-6 col-lg-4 mb-4">
                <a href="cetak_antrian.php" class="text-decoration-none">
                  <div class="card card-widget bg-blue">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-start">
                        <div>
                          <h4 class="card-title text-white mb-1">Petugas Farmasi</h4>
                          <span class="text-white-50">Cetak & Panggil</span>
                        </div>
                        <div class="p-2 bg-white bg-opacity-25 rounded">
                          <i class="bx bx-printer text-white fs-3"></i>
                        </div>
                      </div>
                      <div class="mt-4">
                        <small class="text-white-50">Kelola Antrian</small>
                        <i class="bx bx-right-arrow-alt float-end text-white fs-4"></i>
                      </div>
                      <i class="bx bx-printer icon-bg"></i>
                    </div>
                  </div>
                </a>
              </div>

              <!-- Laporan SPM -->
              <div class="col-sm-6 col-lg-4 mb-4">
                <a href="laporan_spm.php" class="text-decoration-none">
                  <div class="card card-widget bg-yellow">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-start">
                        <div>
                          <h4 class="card-title text-white mb-1">Laporan SPM</h4>
                          <span class="text-white-50">Standar Pelayanan</span>
                        </div>
                        <div class="p-2 bg-white bg-opacity-25 rounded">
                          <i class="bx bx-bar-chart-alt-2 text-white fs-3"></i>
                        </div>
                      </div>
                      <div class="mt-4">
                        <small class="text-white-50">Lihat Laporan</small>
                        <i class="bx bx-right-arrow-alt float-end text-white fs-4"></i>
                      </div>
                      <i class="bx bx-bar-chart-alt-2 icon-bg"></i>
                    </div>
                  </div>
                </a>
              </div>

              <!-- Survei Pasien -->
              <div class="col-sm-6 col-lg-4 mb-4">
                <a href="survei_kepuasan.php" class="text-decoration-none">
                  <div class="card card-widget bg-red">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-start">
                        <div>
                          <h4 class="card-title text-white mb-1">Survei Pasien</h4>
                          <span class="text-white-50">Mode Kiosk</span>
                        </div>
                        <div class="p-2 bg-white bg-opacity-25 rounded">
                          <i class="bx bx-smile text-white fs-3"></i>
                        </div>
                      </div>
                      <div class="mt-4">
                        <small class="text-white-50">Buka Survei</small>
                        <i class="bx bx-right-arrow-alt float-end text-white fs-4"></i>
                      </div>
                      <i class="bx bx-smile icon-bg"></i>
                    </div>
                  </div>
                </a>
              </div>

               <!-- Laporan Kepuasan -->
               <div class="col-sm-6 col-lg-4 mb-4">
                <a href="laporan_kepuasan.php" class="text-decoration-none">
                  <div class="card card-widget bg-green">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-start">
                        <div>
                          <h4 class="card-title text-white mb-1">Laporan Kepuasan</h4>
                          <span class="text-white-50">Hasil Survei</span>
                        </div>
                        <div class="p-2 bg-white bg-opacity-25 rounded">
                          <i class="bx bx-pie-chart-alt text-white fs-3"></i>
                        </div>
                      </div>
                      <div class="mt-4">
                        <small class="text-white-50">Lihat Analisa</small>
                        <i class="bx bx-right-arrow-alt float-end text-white fs-4"></i>
                      </div>
                      <i class="bx bx-pie-chart-alt icon-bg"></i>
                    </div>
                  </div>
                </a>
              </div>

            </div>
          </div>
          <!-- / Content -->

          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
              <div class="mb-2 mb-md-0">
                ©
                <script>
                  document.write(new Date().getFullYear());
                </script>
                , Sistem Informasi Farmasi
              </div>
            </div>
          </footer>
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="assets/vendor/libs/jquery/jquery.js"></script>
  <script src="assets/vendor/libs/popper/popper.js"></script>
  <script src="assets/vendor/js/bootstrap.js"></script>
  <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Main JS -->
  <script src="assets/js/main.js"></script>

  <script>
    function updateClock() {
      const now = new Date();
      const timeString = now.toLocaleTimeString('id-ID', { hour12: false });
      document.getElementById("clock").innerHTML = timeString;
    }

    $(document).ready(function () {
      updateClock();
      setInterval(updateClock, 1000);

      // Load Nama RS
      $.ajax({
        url: 'app/antrian.php?p=pengaturan',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
          $('#namars').text(data.nama_instansi);
        }
      });
    });
  </script>
</body>

</html>
