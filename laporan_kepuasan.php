<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="horizontal-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <title>Laporan Kepuasan Pelanggan</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
        body { background-color: #f1f2f6; font-family: 'Plus Jakarta Sans', sans-serif; }
        
        .navbar { background: white !important; box-shadow: 0 2px 15px rgba(0,0,0,0.04); padding: 1rem 0; }
        .app-brand-text { color: #2d3436 !important; font-weight: 800; }

        .card { border: none; border-radius: 16px; box-shadow: 0 5px 15px rgba(0,0,0,0.03); background: white; }
        
        .stat-card { padding: 1.5rem; text-align: center; transition: transform 0.3s; border: 1px solid transparent; }
        .stat-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.05); }

        .icon-circle {
            width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center;
            font-size: 2rem; margin: 0 auto 1rem;
        }

        .stat-value { font-size: 2rem; font-weight: 800; margin-bottom: 0.2rem; }
        .stat-label { font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; }

        /* Colors */
        .color-sangat-puas { color: #00b894; }
        .bg-sangat-puas { background: #e0f7fa; }
        .border-sangat-puas { border-color: #00b894; }

        .color-puas { color: #0984e3; }
        .bg-puas { background: #e3f2fd; }
        .border-puas { border-color: #0984e3; }

        .color-kurang-puas { color: #fdcb6e; }
        .bg-kurang-puas { background: #fff3e0; }
        .border-kurang-puas { border-color: #fdcb6e; }

        .color-tidak-puas { color: #d63031; }
        .bg-tidak-puas { background: #ffebee; }
        .border-tidak-puas { border-color: #d63031; }

        .progress-label { font-weight: 600; margin-bottom: 5px; display: block; }
        .progress { height: 20px; border-radius: 10px; background-color: #dfe6e9; margin-bottom: 1.5rem; }
        .progress-bar { border-radius: 10px; font-weight: 700; font-size: 0.8rem; line-height: 20px; }

        .target-indicator {
            padding: 1rem; border-radius: 12px; margin-bottom: 2rem;
            display: flex; align-items: center; justify-content: space-between;
        }
        .target-success { background: #d1e7dd; color: #0f5132; }
        .target-fail { background: #f8d7da; color: #842029; }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="layout-navbar navbar navbar-expand-xl align-items-center">
        <div class="container-xxl">
            <div class="navbar-brand app-brand demo d-flex align-items-center gap-3">
                <a href="home.php" class="app-brand-link d-flex align-items-center gap-2 text-decoration-none">
                    <img src="./assets/images/logo.png" style="height:40px;width:auto;">
                    <span class="app-brand-text demo menu-text fw-bolder ms-2" style="font-size: 1.2rem;">Laporan Kepuasan</span>
                </a>
            </div>
            <div class="navbar-nav-right d-flex align-items-center">
                <ul class="navbar-nav flex-row align-items-center ms-auto">
                    <li class="nav-item">
                        <a href="home.php" class="btn btn-sm btn-outline-primary"><i class="fa fa-home me-2"></i> Back to Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y mt-4">
        
        <!-- Filter -->
        <div class="card mb-4 p-4">
            <div class="row align-items-end g-3">
                <div class="col-md-4">
                    <label class="form-label fw-bold">Tanggal Awal</label>
                    <input type="text" class="form-control datepicker" id="tgl_awal" placeholder="Pilih tanggal">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Tanggal Akhir</label>
                    <input type="text" class="form-control datepicker" id="tgl_akhir" placeholder="Pilih tanggal">
                </div>
                <div class="col-md-4">
                    <button class="btn btn-primary w-100" onclick="loadReport()">
                        <i class="fa fa-search me-2"></i> Tampilkan Laporan
                    </button>
                </div>
            </div>
        </div>

        <!-- Target Indicator -->
        <div id="target-box" class="target-indicator target-success" style="display:none;">
            <div>
                <h5 class="mb-0 fw-bold"><i class="fa fa-chart-pie me-2"></i> Indeks Kepuasan Pelanggan</h5>
                <small>Target: ≥ 80% Pasien Puas (Sangat Puas + Puas)</small>
            </div>
            <h2 class="mb-0 fw-bold" id="satisfaction-index">0%</h2>
        </div>

        <!-- Stats Cards -->
        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="card stat-card border-sangat-puas">
                    <div class="icon-circle bg-sangat-puas color-sangat-puas"><i class="fa fa-grin-hearts"></i></div>
                    <div class="stat-value color-sangat-puas" id="val-sangat-puas">0</div>
                    <div class="stat-label">SANGAT PUAS</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card border-puas">
                    <div class="icon-circle bg-puas color-puas"><i class="fa fa-smile"></i></div>
                    <div class="stat-value color-puas" id="val-puas">0</div>
                    <div class="stat-label">PUAS</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card border-kurang-puas">
                    <div class="icon-circle bg-kurang-puas color-kurang-puas"><i class="fa fa-meh"></i></div>
                    <div class="stat-value color-kurang-puas" id="val-kurang-puas">0</div>
                    <div class="stat-label">KURANG PUAS</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card border-tidak-puas">
                    <div class="icon-circle bg-tidak-puas color-tidak-puas"><i class="fa fa-frown"></i></div>
                    <div class="stat-value color-tidak-puas" id="val-tidak-puas">0</div>
                    <div class="stat-label">TIDAK PUAS</div>
                </div>
            </div>
        </div>

        <!-- Progress Bars -->
        <div class="card p-4">
            <h5 class="fw-bold mb-4">Detail Persentase</h5>
            
            <span class="progress-label">Sangat Puas</span>
            <div class="progress">
                <div class="progress-bar bg-success" id="bar-sangat-puas" style="width: 0%">0%</div>
            </div>

            <span class="progress-label">Puas</span>
            <div class="progress">
                <div class="progress-bar bg-info" id="bar-puas" style="width: 0%">0%</div>
            </div>

            <span class="progress-label">Kurang Puas</span>
            <div class="progress">
                <div class="progress-bar bg-warning" id="bar-kurang-puas" style="width: 0%">0%</div>
            </div>

            <span class="progress-label">Tidak Puas</span>
            <div class="progress">
                <div class="progress-bar bg-danger" id="bar-tidak-puas" style="width: 0%">0%</div>
            </div>
        </div>

    </div>

    <!-- Scripts -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    
    <script>
        $(document).ready(function() {
            $(".datepicker").flatpickr({ defaultDate: "today", dateFormat: "Y-m-d" });
            loadReport();
        });

        function loadReport() {
            const tgl_awal = $('#tgl_awal').val();
            const tgl_akhir = $('#tgl_akhir').val();

            $.ajax({
                url: 'app/kepuasan.php?act=laporan',
                type: 'GET',
                data: { tgl_awal: tgl_awal, tgl_akhir: tgl_akhir },
                dataType: 'json',
                success: function(response) {
                    const stats = response.stats;
                    
                    // Update Values
                    $('#val-sangat-puas').text(stats['Sangat Puas'].count);
                    $('#val-puas').text(stats['Puas'].count);
                    $('#val-kurang-puas').text(stats['Kurang Puas'].count);
                    $('#val-tidak-puas').text(stats['Tidak Puas'].count);

                    // Update Bars
                    updateBar('sangat-puas', stats['Sangat Puas'].pct);
                    updateBar('puas', stats['Puas'].pct);
                    updateBar('kurang-puas', stats['Kurang Puas'].pct);
                    updateBar('tidak-puas', stats['Tidak Puas'].pct);

                    // Update Index
                    const index = response.satisfaction_index;
                    $('#satisfaction-index').text(index + '%');
                    $('#target-box').show();
                    
                    if(index >= 80) {
                        $('#target-box').removeClass('target-fail').addClass('target-success');
                    } else {
                        $('#target-box').removeClass('target-success').addClass('target-fail');
                    }
                }
            });
        }

        function updateBar(id, pct) {
            $(`#bar-${id}`).css('width', pct + '%').text(pct + '%');
        }
    </script>
</body>
</html>
