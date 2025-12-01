<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="horizontal-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Antrian Farmasi - Menu Petugas</title>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        :root {
            --primary-color: #00b894;
            --secondary-color: #0984e3;
            --accent-color: #6c5ce7;
            --bg-color: #f1f2f6;
            --card-shadow: 0 10px 20px rgba(0,0,0,0.05);
            --hover-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        body {
            background-color: var(--bg-color);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #2d3436;
        }

        /* Navbar Styling */
        .navbar {
            background: white !important;
            box-shadow: 0 2px 15px rgba(0,0,0,0.04);
            padding: 1rem 0;
            backdrop-filter: blur(10px);
        }
        
        .app-brand-text {
            color: #2d3436 !important;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .navbar-nav .nav-item {
            font-weight: 600;
        }

        /* Card Styling */
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            background: white;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: var(--hover-shadow);
        }

        .stat-card {
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            opacity: 0.1;
            z-index: 0;
        }

        .stat-card.primary::before { background: var(--primary-color); }
        .stat-card.warning::before { background: #fdcb6e; }
        .stat-card.info::before { background: var(--secondary-color); }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .stat-value {
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 0.5rem;
            color: #2d3436;
            position: relative;
            z-index: 1;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #636e72;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            z-index: 1;
        }

        /* Table Styling */
        .table-custom {
            border-collapse: separate;
            border-spacing: 0 10px;
        }

        .table-custom thead th {
            border: none;
            background: transparent;
            font-weight: 700;
            color: #b2bec3;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
            padding: 0 1.5rem;
        }

        .table-custom tbody tr {
            background: white;
            box-shadow: 0 5px 10px rgba(0,0,0,0.02);
            transition: transform 0.2s;
        }

        .table-custom tbody tr:hover {
            transform: scale(1.01);
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            z-index: 2;
            position: relative;
        }

        .table-custom td {
            border: none;
            padding: 1.5rem;
            vertical-align: middle;
        }

        .table-custom td:first-child {
            border-top-left-radius: 12px;
            border-bottom-left-radius: 12px;
        }

        .table-custom td:last-child {
            border-top-right-radius: 12px;
            border-bottom-right-radius: 12px;
        }

        .queue-badge {
            background: #e0f7fa;
            color: #006064;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 700;
            font-size: 1.1rem;
            display: inline-block;
        }

        .status-badge {
            padding: 0.4rem 0.8rem;
            border-radius: 30px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status-racikan { background: #fff3e0; color: #e65100; }
        .status-nonracikan { background: #e3f2fd; color: #1565c0; }

        /* Buttons */
        .btn-modern {
            border-radius: 10px;
            padding: 0.6rem 1.2rem;
            font-weight: 600;
            transition: all 0.3s;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-print {
            background: #f1f2f6;
            color: #2d3436;
        }

        .btn-print:hover {
            background: #dfe4ea;
            color: #2d3436;
        }

        .btn-done {
            background: var(--primary-color);
            color: white;
            box-shadow: 0 4px 10px rgba(0, 184, 148, 0.3);
        }

        .btn-done:hover {
            background: #00a884;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 184, 148, 0.4);
        }

        /* Clock */
        .clock-widget {
            text-align: right;
            line-height: 1.2;
        }
        .clock-time {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--primary-color);
        }
        .clock-date {
            font-size: 0.85rem;
            color: #636e72;
            font-weight: 500;
        }



        /* Print Styles for Epson TM-U220 */
        @media print {
            @page {
                size: 76mm auto; 
                margin: 0;
            }
            body {
                margin: 0;
                padding: 0;
                background: white;
            }
            body * { 
                visibility: hidden; 
                height: 0;
            }
            #print-area, #print-area * { 
                visibility: visible; 
                height: auto;
            }
            #print-area {
                position: absolute; 
                left: 0; 
                top: 0; 
                width: 100%; 
                padding-left: 10mm; /* Geser ke kanan */
                padding-right: 2mm;
                padding-top: 5mm;
                text-align: left; /* Rata kiri agar rapi saat digeser */
                font-family: 'calibri', 'calibri', 'calibri'; 
                color: black;
                font-weight: bold;
            }
            .ticket-header { 
                font-size: 16px; /* Diperbesar */
                font-weight: 800; 
                border-bottom: 3px dashed #000; 
                padding-bottom: 8px; 
                margin-bottom: 15px; 
                text-transform: uppercase;
                line-height: 1;
                text-align: center; /* Header tetap tengah relatif terhadap area */
            }
            .ticket-queue { 
                font-size: 28px; /* Sangat besar */
                font-weight: 700; 
                margin: 15px 0; 
                line-height: 1;
                text-align: center;
            }
            .ticket-details table { 
                width: 100%; 
                text-align: left; 
                font-size: 14px; /* Diperbesar */
                line-height: 1;
            }
            .ticket-footer { 
                margin-top: 20px; 
                border-top: 3px dashed #000; 
                padding-top: 10px; 
                font-size: 12px; 
                font-style: italic; 
                text-align: center;
                padding-bottom: 30px; 
            }
        }
        #print-area { display: none; }
        @media print { #print-area { display: block; } }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="layout-navbar navbar navbar-expand-xl align-items-center" id="layout-navbar">
        <div class="container-xxl">
            <div class="navbar-brand app-brand demo d-flex align-items-center gap-3">
                <div class="app-brand-logo demo">
                    <img src="./assets/images/logo.png"
                        alt="Logo"
                        class="img-circle elevation-2 mb-2"
                        style="height:60px;width:60px;object-fit:contain;background:#fff;padding:5px;">
                </div>
                <span class="app-brand-text demo menu-text fw-bolder ms-2" style="font-size: 1.5rem;" id="namars">Loading...</span>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                <ul class="navbar-nav flex-row align-items-center ms-auto">
                    <li class="nav-item">
                        <div class="clock-widget">
                            <div class="clock-time" id="clock">00:00:00</div>
                            <div class="clock-date" id="date-now">Loading...</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container-fluid flex-grow-1 container-p-y mt-4">
        
        <!-- Stats Row -->
        <div class="row mb-5 g-4">
            <div class="col-md-4">
                <div class="card stat-card primary">
                    <div class="stat-icon" style="background: rgba(0, 184, 148, 0.1); color: var(--primary-color);">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="stat-value" id="total-antrian">0</div>
                    <div class="stat-label">Total Antrian</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card warning">
                    <div class="stat-icon" style="background: rgba(253, 203, 110, 0.1); color: #e1b12c;">
                        <i class="fa fa-mortar-pestle"></i>
                    </div>
                    <div class="stat-value" id="total-racikan">0</div>
                    <div class="stat-label">Resep Racikan</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card info">
                    <div class="stat-icon" style="background: rgba(9, 132, 227, 0.1); color: var(--secondary-color);">
                        <i class="fa fa-pills"></i>
                    </div>
                    <div class="stat-value" id="total-nonracikan">0</div>
                    <div class="stat-label">Non Racikan</div>
                </div>
            </div>
        </div>

        <!-- Main List -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold mb-0 text-dark"><i class="fa fa-list-ul me-2 text-primary"></i> Daftar Antrian Aktif</h4>
                    <button class="btn btn-modern btn-print bg-white shadow-sm" onclick="loadData()">
                        <i class="fa fa-sync-alt spin-hover"></i> Refresh Data
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-custom" id="table-antrian">
                        <thead>
                            <tr>
                                <th>No. Antrian</th>
                                <th>Informasi Pasien</th>
                                <th>Poliklinik</th>
                                <th>Jenis Resep</th>
                                <th>Resep Masuk</th>
                                <th>Waktu Validasi</th>
                                <th>Waktu Penyerahan</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div class="spinner-border text-primary" role="status"></div>
                                    <p class="mt-2 text-muted">Memuat data antrian...</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <footer class="content-footer footer mt-5 mb-3">
        <div class="container-xxl text-center">
            <div class="text-muted small">
                &copy; <script>document.write(new Date().getFullYear());</script> Farmasi System • Dibuat dengan <span class="text-danger">❤️</span> oleh IT Support
            </div>
        </div>
    </footer>

    <!-- Hidden Print Area -->
    <div id="print-area">
        <div class="ticket-header" id="print-rs-name">RUMAH SAKIT</div>
        <div class="ticket-body">
            <div style="font-size: 14px; margin-bottom: 5px;">NOMOR ANTRIAN</div>
            <div class="ticket-queue" id="print-queue-no">A-000</div>
            <div class="ticket-details">
                <table>
                    <tr><td style="width: 70px; font-weight: bold;">Nama</td><td>: <span id="print-name">-</span></td></tr>
                    <tr><td style="font-weight: bold;">No. RM</td><td>: <span id="print-rm">-</span></td></tr>
                    <tr><td style="font-weight: bold;">Poli</td><td>: <span id="print-poli">-</span></td></tr>
                    <tr><td style="font-weight: bold;">Waktu</td><td>: <span id="print-date">-</span></td></tr>
                </table>
            </div>
            <div class="ticket-footer">Silahkan menunggu panggilan.<br>Semoga lekas sembuh.</div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        // Clock
        function updateClock() {
            const now = new Date();
            document.getElementById("clock").innerText = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
            document.getElementById("date-now").innerText = now.toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
        }
        setInterval(updateClock, 1000);
        updateClock();

        // Init
        $(document).ready(function() {
            $.get('app/antrian.php?p=pengaturan', function(data) {
                $('#namars').text(data.nama_instansi);
                $('#print-rs-name').text(data.nama_instansi.toUpperCase());
            }, 'json');
            
            loadData();
            setInterval(loadData, 15000);
        });


        function loadData() {
            $.ajax({
                url: 'app/antrian.php?p=list_antrian_farmasi',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    const tbody = $('#table-antrian tbody');
                    tbody.empty();
                    
                    let total = 0, racikan = 0, nonracikan = 0;
                    
                    if (data.length > 0) {
                        data.forEach(item => {
                            // Hitung statistik hanya untuk yang belum diserahkan
                            const isServed = item.jam_penyerahan && item.jam_penyerahan !== '00:00:00';
                            
                            if (!isServed) {
                                total++;
                                if(item.jenis_resep === 'Racikan') racikan++; else nonracikan++;
                            }
                            
                            const badgeClass = item.jenis_resep === 'Racikan' ? 'status-racikan' : 'status-nonracikan';
                            const rowClass = isServed ? 'bg-light text-muted' : '';
                            const btnDoneState = isServed ? 'disabled btn-secondary' : 'btn-done';
                            const btnDoneText = isServed ? '<i class="fa fa-check-double"></i> Diserahkan' : '<i class="fa fa-check"></i> Selesai';
                            const btnDoneAction = isServed ? '' : `onclick="markAsDone('${item.no_resep_full}', '${item.nm_pasien.replace(/'/g, "\\'")}')"`;
                            
                            const row = `
                                <tr class="${rowClass}">
                                    <td><span class="queue-badge ${isServed ? 'bg-secondary text-white' : ''}">${item.no_resep}</span></td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="fw-bold ${isServed ? 'text-muted' : 'text-dark'}">${item.nm_pasien}</span>
                                            <small class="text-muted" style="font-size: 0.75rem;"><i class="fa fa-id-card me-1"></i> ${item.no_rawat}</small>
                                        </div>
                                    </td>
                                    <td><span class="fw-semibold ${isServed ? 'text-muted' : 'text-secondary'}">${item.nm_poli}</span></td>
                                    <td><span class="status-badge ${isServed ? 'bg-secondary text-white' : badgeClass}">${item.jenis_resep}</span></td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="fw-medium text-dark">${item.jam_peresepan}</span>
                                            <small class="text-muted" style="font-size: 0.75rem;">${item.tgl_peresepan.split('-').reverse().join('/')}</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="fw-medium text-dark">${item.jam}</span>
                                            <small class="text-muted" style="font-size: 0.75rem;">${item.tgl_perawatan.split('-').reverse().join('/')}</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="fw-medium ${isServed ? 'text-dark' : 'text-muted'}">${isServed ? item.jam_penyerahan : '-'}</span>
                                            ${isServed ? `<small class="text-muted" style="font-size: 0.75rem;">${item.tgl_penyerahan.split('-').reverse().join('/')}</small>` : ''}
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <button class="btn btn-modern btn-info btn-sm text-white" onclick="callPatient('${item.no_resep}', '${item.nm_pasien.replace(/'/g, "\\'")}', '${item.nm_poli}')">
                                            <i class="fa fa-volume-up"></i> Panggil
                                        </button>
                                        <button class="btn btn-modern btn-print btn-sm" onclick="printQueue('${item.no_resep}', '${item.nm_pasien.replace(/'/g, "\\'")}', '${item.nm_poli}', '${item.no_rawat}')">
                                            <i class="fa fa-print"></i> Cetak
                                        </button>
                                        <button class="btn btn-modern btn-sm ${btnDoneState}" ${btnDoneAction}>
                                            ${btnDoneText}
                                        </button>
                                    </td>
                                </tr>
                            `;
                            tbody.append(row);
                        });
                    } else {
                        tbody.append(`
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div class="d-flex flex-column align-items-center justify-content-center">
                                        <div style="background: #e0f7fa; padding: 20px; border-radius: 50%; margin-bottom: 15px;">
                                            <i class="fa fa-clipboard-check fa-3x text-info"></i>
                                        </div>
                                        <h5 class="text-muted fw-bold">Tidak ada antrian saat ini</h5>
                                        <p class="text-muted small">Semua resep telah diproses.</p>
                                    </div>
                                </td>
                            </tr>
                        `);
                    }
                    
                    $('#total-antrian').text(total);
                    $('#total-racikan').text(racikan);
                    $('#total-nonracikan').text(nonracikan);
                },
                error: function() {
                    $('#table-antrian tbody').html('<tr><td colspan="6" class="text-center text-danger py-4">Gagal terhubung ke server.</td></tr>');
                }
            });
        }

        function callPatient(noResep, namaPasien, poli) {
            // Gunakan ResponsiveVoice jika tersedia, atau fallback ke Web Speech API
            const textToSay = `Nomor Antrian ${noResep}, Atas Nama ${namaPasien}, Silahkan ke loket penyerahan obat`;
            
            if ('speechSynthesis' in window) {
                const utterance = new SpeechSynthesisUtterance(textToSay);
                utterance.lang = 'id-ID';
                utterance.rate = 0.9;
                window.speechSynthesis.speak(utterance);
                
                // Visual feedback
                const Toast = Swal.mixin({
                    toast: true, position: 'top-center', showConfirmButton: false, timer: 3000
                });
                Toast.fire({ icon: 'info', title: `Memanggil ${namaPasien}...` });
            } else {
                alert("Browser Anda tidak mendukung Text-to-Speech.");
            }
        }


        function printQueue(noResep, namaPasien, namaPoli, noRawat) {
    // update isi area cetak seperti sebelumnya
    $('#print-queue-no').text(noResep);
    $('#print-name').text(namaPasien);
    $('#print-poli').text(namaPoli);
    $('#print-rm').text(noRawat);
    const d = new Date();
    $('#print-date').text(`${d.getDate()}/${d.getMonth()+1}/${d.getFullYear()} ${d.getHours()}:${String(d.getMinutes()).padStart(2,'0')}`);

    // sedikit delay agar DOM benar-benar terupdate
    setTimeout(function() {
        // Ambil markup print-area
        const printArea = document.getElementById('print-area');
        if (!printArea) {
            console.error('Elemen #print-area tidak ditemukan.');
            return;
        }

        // Buat iframe tersembunyi
        const iframe = document.createElement('iframe');
        iframe.style.position = 'fixed';
        iframe.style.right = '0';
        iframe.style.bottom = '0';
        iframe.style.width = '0';
        iframe.style.height = '0';
        iframe.style.border = '0';
        iframe.style.visibility = 'hidden';
        document.body.appendChild(iframe);

        const doc = iframe.contentWindow.document;

        // Ambil semua tag <link rel="stylesheet"> dan <style> agar style ikut tercetak
        const links = Array.from(document.querySelectorAll('link[rel="stylesheet"]')).map(link => link.outerHTML).join('');
        const styles = Array.from(document.querySelectorAll('style')).map(s => s.outerHTML).join('');

        // Tuliskan dokumen cetak ke iframe
        doc.open();
        doc.write(`<!doctype html>
            <html>
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Cetak Antrian</title>
                ${links}
                ${styles}
                <style>
                    /* Pastikan default body background & margin untuk print */
                    body { margin: 0; background: white; }
                </style>
            </head>
            <body>
                ${printArea.outerHTML}
            </body>
            </html>`);
        doc.close();

        // Setelah iframe siap — panggil print pada iframe
        const onPrintFinish = () => {
            try {
                // Tutup / hapus iframe setelah cetak selesai (tunggu sedikit agar proses print selesai)
                setTimeout(() => {
                    if (iframe && iframe.parentNode) iframe.parentNode.removeChild(iframe);
                }, 500);
            } catch (e) {
                console.warn('Gagal menghapus iframe:', e);
            }
        };

        // Modern browsers support onafterprint on window
        iframe.contentWindow.focus();

        // set handlers agar iframe dihapus setelah cetak
        if ('onafterprint' in iframe.contentWindow) {
            iframe.contentWindow.onafterprint = onPrintFinish;
        } else {
            // fallback: hapus setelah delay
            setTimeout(onPrintFinish, 2000);
        }

        // Beberapa browser butuh sedikit timeout sebelum print
        setTimeout(() => {
            try {
                iframe.contentWindow.print();
            } catch (err) {
                console.error('Gagal memanggil print pada iframe:', err);
                // fallback: panggil print pada main window
                try { window.print(); } catch(e) { console.error(e); }
            }
        }, 250);
    }, 150);
}


        function markAsDone(noResep, namaPasien) {
            Swal.fire({
                title: 'Konfirmasi',
                text: `Selesaikan antrian untuk ${namaPasien}?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#00b894',
                cancelButtonColor: '#d63031',
                confirmButtonText: 'Ya, Selesai',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'app/antrian.php?p=serahkan_obat',
                        type: 'GET',
                        data: { no_resep: noResep },
                        dataType: 'json',
                        success: function(response) {
                            if(response.status === 'success') {
                                const Toast = Swal.mixin({
                                    toast: true, position: 'top-end', showConfirmButton: false, timer: 3000, timerProgressBar: true
                                });
                                Toast.fire({ icon: 'success', title: 'Antrian diselesaikan' });
                                loadData();
                            } else {
                                Swal.fire('Gagal', 'Terjadi kesalahan.', 'error');
                            }
                        }
                    });
                }
            });
        }
    </script>
</body>
</html>
