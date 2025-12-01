<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="horizontal-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Laporan SPM Farmasi</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    
    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css" />
    
    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
        :root {
            --primary-color: #6c5ce7;
            --secondary-color: #a29bfe;
            --success-color: #00b894;
            --danger-color: #d63031;
            --bg-color: #f1f2f6;
        }

        body {
            background-color: var(--bg-color);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #2d3436;
        }

        /* Navbar */
        .navbar {
            background: white !important;
            box-shadow: 0 2px 15px rgba(0,0,0,0.04);
            padding: 1rem 0;
        }
        
        .app-brand-text {
            color: #2d3436 !important;
            font-weight: 800;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            background: white;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .stat-card {
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 0.2rem;
            color: #2d3436;
        }

        .stat-label {
            font-size: 0.85rem;
            color: #636e72;
            font-weight: 600;
            text-transform: uppercase;
        }

        .progress-micro {
            height: 6px;
            border-radius: 10px;
            background: #dfe6e9;
            margin-top: 10px;
            overflow: hidden;
        }

        .progress-bar-micro {
            height: 100%;
            border-radius: 10px;
        }

        /* Table */
        .table-custom thead th {
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
            background: #f8f9fa;
            border-bottom: 2px solid #dfe6e9;
        }

        .badge-spm {
            padding: 0.4rem 0.8rem;
            border-radius: 30px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .badge-success-light { background: #e0f7fa; color: #00b894; }
        .badge-danger-light { background: #ffebee; color: #d63031; }

        .filter-box {
            background: white;
            padding: 1.5rem;
            border-radius: 16px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.03);
            margin-bottom: 2rem;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="layout-navbar navbar navbar-expand-xl align-items-center" id="layout-navbar">
        <div class="container-xxl">
            <div class="navbar-brand app-brand demo d-flex align-items-center gap-3">
                <a href="home.php" class="app-brand-link d-flex align-items-center gap-2 text-decoration-none">
                    <span class="app-brand-logo demo">
                        <img src="./assets/images/logo.png" style="height:40px;width:auto;">
                    </span>
                    <span class="app-brand-text demo menu-text fw-bolder ms-2" style="font-size: 1.2rem;">Laporan SPM</span>
                </a>
            </div>
            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
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
        <div class="filter-box">
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

        <!-- Stats -->
        <div class="row g-4 mb-4">
            <!-- Non Racikan -->
            <div class="col-md-4">
                <div class="card stat-card">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="stat-label text-primary">Non Racikan (≤ 30 mnt)</div>
                            <div class="stat-value mt-2" id="pct-nonracikan">0%</div>
                            <small class="text-muted" id="count-nonracikan">0 / 0 Resep</small>
                        </div>
                        <div class="stat-icon bg-label-primary text-primary" style="background: #e3f2fd;">
                            <i class="fa fa-pills"></i>
                        </div>
                    </div>
                    <div class="progress-micro">
                        <div class="progress-bar-micro bg-primary" id="bar-nonracikan" style="width: 0%"></div>
                    </div>
                </div>
            </div>

            <!-- Racikan -->
            <div class="col-md-4">
                <div class="card stat-card">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="stat-label text-warning" style="color: #e1b12c !important;">Racikan (≤ 60 mnt)</div>
                            <div class="stat-value mt-2" id="pct-racikan">0%</div>
                            <small class="text-muted" id="count-racikan">0 / 0 Resep</small>
                        </div>
                        <div class="stat-icon text-warning" style="background: #fff3e0; color: #e1b12c;">
                            <i class="fa fa-mortar-pestle"></i>
                        </div>
                    </div>
                    <div class="progress-micro">
                        <div class="progress-bar-micro bg-warning" id="bar-racikan" style="width: 0%; background-color: #e1b12c !important;"></div>
                    </div>
                </div>
            </div>

            <!-- Ranap -->
            <div class="col-md-4">
                <div class="card stat-card">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="stat-label text-success">Rawat Inap (≤ 60 mnt)</div>
                            <div class="stat-value mt-2" id="pct-ranap">0%</div>
                            <small class="text-muted" id="count-ranap">0 / 0 Resep</small>
                        </div>
                        <div class="stat-icon text-success" style="background: #e0f7fa;">
                            <i class="fa fa-bed"></i>
                        </div>
                    </div>
                    <div class="progress-micro">
                        <div class="progress-bar-micro bg-success" id="bar-ranap" style="width: 0%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="card">
            <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 fw-bold">Detail Resep Obat</h5>
                <button class="btn btn-sm btn-outline-secondary" onclick="exportExcel()"><i class="fa fa-file-excel me-2"></i> Export Excel</button>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-custom" id="table-report">
                    <thead>
                        <tr>
                            <th>No. Resep</th>
                            <th>Pasien</th>
                            <th>Kategori</th>
                            <th>Waktu Masuk</th>
                            <th>Waktu Serah</th>
                            <th>Durasi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td colspan="7" class="text-center py-5">Silahkan pilih periode tanggal</td></tr>
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="card-footer border-top py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted" id="pagination-info">Menampilkan 0-0 dari 0 data</small>
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-sm mb-0 justify-content-end" id="pagination-container">
                            <!-- Pagination items will be generated here -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </div>

    <!-- Scripts -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    
    <script>
        $(document).ready(function() {
            // Init Datepicker
            $(".datepicker").flatpickr({
                defaultDate: "today",
                dateFormat: "Y-m-d"
            });

            loadReport();
        });

        let currentPage = 1;
        const limit = 10;

        function loadReport(page = 1) {
            currentPage = page;
            const tgl_awal = $('#tgl_awal').val();
            const tgl_akhir = $('#tgl_akhir').val();

            // Show Loading
            $('#table-report tbody').html('<tr><td colspan="7" class="text-center py-5"><div class="spinner-border text-primary"></div></td></tr>');

            $.ajax({
                url: 'app/laporan.php?p=spm',
                type: 'GET',
                data: { tgl_awal: tgl_awal, tgl_akhir: tgl_akhir, page: page, limit: limit },
                dataType: 'json',
                success: function(response) {
                    updateStats(response.stats);
                    renderTable(response.data);
                    renderPagination(response.pagination);
                },
                error: function() {
                    $('#table-report tbody').html('<tr><td colspan="7" class="text-center py-5 text-danger">Gagal memuat data</td></tr>');
                }
            });
        }

        function updateStats(stats) {
            // Helper Calc
            const calcPct = (tepat, total) => total > 0 ? Math.round((tepat / total) * 100) : 0;

            // Non Racikan
            const pctNon = calcPct(stats.non_racikan.tepat, stats.non_racikan.total);
            $('#pct-nonracikan').text(pctNon + '%');
            $('#count-nonracikan').text(`${stats.non_racikan.tepat} / ${stats.non_racikan.total} Tepat Waktu`);
            $('#bar-nonracikan').css('width', pctNon + '%');

            // Racikan
            const pctRacikan = calcPct(stats.racikan.tepat, stats.racikan.total);
            $('#pct-racikan').text(pctRacikan + '%');
            $('#count-racikan').text(`${stats.racikan.tepat} / ${stats.racikan.total} Tepat Waktu`);
            $('#bar-racikan').css('width', pctRacikan + '%');

            // Ranap
            const pctRanap = calcPct(stats.ranap.tepat, stats.ranap.total);
            $('#pct-ranap').text(pctRanap + '%');
            $('#count-ranap').text(`${stats.ranap.tepat} / ${stats.ranap.total} Tepat Waktu`);
            $('#bar-ranap').css('width', pctRanap + '%');
        }

        function renderTable(data) {
            const tbody = $('#table-report tbody');
            tbody.empty();

            if (data.length === 0) {
                tbody.html('<tr><td colspan="7" class="text-center py-5">Tidak ada data pada periode ini</td></tr>');
                return;
            }

            data.forEach(item => {
                const badgeClass = item.is_tepat ? 'badge-success-light' : 'badge-danger-light';
                const statusText = item.is_tepat ? 'Tepat Waktu' : 'Terlambat';
                const icon = item.is_tepat ? 'check-circle' : 'exclamation-circle';

                const row = `
                    <tr>
                        <td><span class="fw-bold text-primary">${item.no_resep}</span></td>
                        <td>
                            <div class="d-flex flex-column">
                                <span class="fw-bold">${item.nm_pasien}</span>
                                <small class="text-muted">${item.no_rawat}</small>
                            </div>
                        </td>
                        <td>${item.kategori}</td>
                        <td>${item.jam_peresepan}</td>
                        <td>${item.jam_penyerahan}</td>
                        <td><span class="fw-bold">${item.durasi} Menit</span> <small class="text-muted">/ ${item.target}</small></td>
                        <td><span class="badge-spm ${badgeClass}"><i class="fa fa-${icon} me-1"></i> ${statusText}</span></td>
                    </tr>
                `;
                tbody.append(row);
            });
        }

        function renderPagination(pagination) {
            const container = $('#pagination-container');
            container.empty();

            if (pagination.total_records === 0) {
                $('#pagination-info').text('Menampilkan 0 data');
                return;
            }

            const start = (pagination.current_page - 1) * pagination.limit + 1;
            const end = Math.min(pagination.current_page * pagination.limit, pagination.total_records);
            $('#pagination-info').text(`Menampilkan ${start}-${end} dari ${pagination.total_records} data`);

            const totalPages = pagination.total_pages;
            const current = pagination.current_page;

            // Prev
            const prevDisabled = current === 1 ? 'disabled' : '';
            container.append(`
                <li class="page-item ${prevDisabled}">
                    <a class="page-link" href="javascript:void(0)" onclick="loadReport(${current - 1})"><i class="fa fa-chevron-left"></i></a>
                </li>
            `);

            // Pages (Simple: show all or limited range? Let's show simple range)
            // For simplicity, showing current, prev, next, or just simple prev/next with numbers
            // Let's show max 5 pages
            let startPage = Math.max(1, current - 2);
            let endPage = Math.min(totalPages, startPage + 4);
            
            if (endPage - startPage < 4) {
                startPage = Math.max(1, endPage - 4);
            }

            for (let i = startPage; i <= endPage; i++) {
                const active = i === current ? 'active' : '';
                container.append(`
                    <li class="page-item ${active}">
                        <a class="page-link" href="javascript:void(0)" onclick="loadReport(${i})">${i}</a>
                    </li>
                `);
            }

            // Next
            const nextDisabled = current === totalPages ? 'disabled' : '';
            container.append(`
                <li class="page-item ${nextDisabled}">
                    <a class="page-link" href="javascript:void(0)" onclick="loadReport(${current + 1})"><i class="fa fa-chevron-right"></i></a>
                </li>
            `);
        }

        function exportExcel() {
            const tgl_awal = $('#tgl_awal').val();
            const tgl_akhir = $('#tgl_akhir').val();
            window.location.href = `laporan_spm_excel.php?tgl_awal=${tgl_awal}&tgl_akhir=${tgl_akhir}`;
        }
    </script>
</body>
</html>
