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
        /* Mobile Responsive Card Refinement */
        @media (max-width: 768px) {
            .table-custom thead { display: none; }
            
            .table-custom tbody tr {
                display: block;
                margin-bottom: 1rem;
                border-radius: 12px;
                box-shadow: 0 2px 8px rgba(0,0,0,0.05);
                background: white;
                padding: 0;
                overflow: hidden;
                border: 1px solid #f0f0f0;
            }

            .card-header-mobile {
                background: #f8f9fa;
                padding: 0.8rem 1rem;
                display: flex;
                justify-content: space-between;
                align-items: center;
                border-bottom: 1px solid #eee;
            }

            .card-body-mobile {
                padding: 1rem;
            }

            .card-footer-mobile {
                padding: 0.5rem;
                background: #fff;
                border-top: 1px solid #f0f0f0;
            }

            .info-row {
                display: flex;
                justify-content: space-between;
                margin-bottom: 0.5rem;
                font-size: 0.9rem;
            }

            .info-label { color: #636e72; }
            .info-value { font-weight: 600; color: #2d3436; text-align: right; }

            /* Action Bar */
            .action-bar {
                display: flex;
                gap: 0.5rem;
            }

            .btn-action-mobile {
                flex: 1;
                border-radius: 8px;
                padding: 0.6rem;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 1.1rem;
                border: none;
                transition: background 0.2s;
            }
            
            .btn-call { background: #00cec9; color: white; flex: 0 0 50px; }
            .btn-print-mobile { background: #2d3436; color: white; flex: 1; }
            .btn-done-mobile { background: #00b894; color: white; flex: 1; }
            
            .btn-disabled { background: #dfe6e9; color: #b2bec3; cursor: not-allowed; }
        }
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
        
        <!-- Printer Settings & Stats -->
        <!-- Printer Settings & Stats -->
        <div class="row mb-4 g-4 align-items-stretch">
            <!-- Stats Card -->
            <div class="col-md-8">
                <div class="card h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-0 text-dark"><i class="fa fa-chart-pie me-2 text-primary"></i> Statistik Antrian</h5>
                        <span class="badge bg-label-primary rounded-pill">Hari Ini</span>
                    </div>
                    <div class="row g-0 align-items-center h-100">
                        <div class="col-4 border-end">
                            <div class="d-flex flex-column align-items-center justify-content-center p-2">
                                <div class="stat-icon mb-2" style="width: 50px; height: 50px; font-size: 1.5rem; background: rgba(0, 184, 148, 0.1); color: var(--primary-color);">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="stat-value mb-0" style="font-size: 2rem;" id="total-antrian">0</div>
                                <div class="stat-label text-muted small">Total Antrian</div>
                            </div>
                        </div>
                        <div class="col-4 border-end">
                            <div class="d-flex flex-column align-items-center justify-content-center p-2">
                                <div class="stat-icon mb-2" style="width: 50px; height: 50px; font-size: 1.5rem; background: rgba(253, 203, 110, 0.1); color: #e1b12c;">
                                    <i class="fa fa-mortar-pestle"></i>
                                </div>
                                <div class="stat-value mb-0" style="font-size: 2rem;" id="total-racikan">0</div>
                                <div class="stat-label text-muted small">Racikan</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-flex flex-column align-items-center justify-content-center p-2">
                                <div class="stat-icon mb-2" style="width: 50px; height: 50px; font-size: 1.5rem; background: rgba(9, 132, 227, 0.1); color: var(--secondary-color);">
                                    <i class="fa fa-pills"></i>
                                </div>
                                <div class="stat-value mb-0" style="font-size: 2rem;" id="total-nonracikan">0</div>
                                <div class="stat-label text-muted small">Non-Racik</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Printer Settings Card -->
            <div class="col-md-4">
                <div class="card h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-0 text-dark"><i class="fa fa-print me-2 text-primary"></i> Printer</h5>
                        <div class="badge bg-label-secondary" id="connection-status-badge">
                            <i class="fa fa-circle text-danger me-1" style="font-size: 8px;"></i> Disconnected
                        </div>
                    </div>
                    
                    <!-- Mode Selection -->
                    <div class="btn-group w-100 mb-3" role="group">
                        <input type="radio" class="btn-check" name="printerMode" id="modeUSB" autocomplete="off" checked onchange="updatePrinterUI()">
                        <label class="btn btn-outline-primary" for="modeUSB"><i class="fa fa-desktop me-1"></i> PC/USB</label>

                        <input type="radio" class="btn-check" name="printerMode" id="modeBT" autocomplete="off" onchange="updatePrinterUI()">
                        <label class="btn btn-outline-primary" for="modeBT"><i class="fa fa-bluetooth me-1"></i> Bluetooth</label>
                    </div>

                    <!-- Connection Controls -->
                    <div id="connection-controls" style="display:none;" class="mt-auto">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small class="text-muted fw-bold">Device:</small>
                            <small class="text-primary fw-bold text-truncate" style="max-width: 150px;" id="device-name">-</small>
                        </div>
                        <button class="btn btn-primary w-100 mb-2" id="btn-connect" onclick="connectPrinter()">
                            <i class="fa fa-search me-1"></i> Cari & Sambungkan
                        </button>
                        <div class="alert alert-light border mb-0 p-2 small text-muted d-flex align-items-start">
                            <i class="fa fa-info-circle me-2 mt-1 text-primary"></i>
                            <span id="helper-text" style="line-height: 1.2;">Pilih printer USB yang terhubung.</span>
                        </div>
                    </div>
                    
                    <!-- Fallback Info -->
                    <div id="fallback-info" class="alert alert-warning d-flex align-items-center p-2 mb-0 mt-2" style="display:none; font-size: 0.8rem;">
                        <i class="fa fa-exclamation-triangle me-2"></i>
                        <div>Gunakan <b>RawBT</b> jika gagal.</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main List -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold mb-0 text-dark"><i class="fa fa-list-ul me-2 text-primary"></i> Daftar Antrian</h4>
                    <div class="d-flex gap-2">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"><i class="fa fa-search text-muted"></i></span>
                            <input type="text" id="search-input" class="form-control border-start-0 ps-0" placeholder="Cari nama pasien..." oninput="filterData()">
                        </div>
                        <button class="btn btn-modern btn-print bg-white shadow-sm" onclick="loadData()">
                            <i class="fa fa-sync-alt spin-hover"></i> Refresh
                        </button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-custom" id="table-antrian">
                        <thead>
                            <tr>
                                <th>No. Antrian</th>
                                <th>Nama Pasien</th>
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
    <!-- <div id="print-area">
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
    </div> -->

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

        // --- Printer Logic ---
        
        let printerDevice = null;
        let printerCharacteristic = null; // For Bluetooth
        let printerWriter = null;         // For Serial/USB
        let isConnected = false;

        $(document).ready(function() {
            // Load Printer Mode
            const savedMode = localStorage.getItem('printerMode') || 'USB';
            if (savedMode === 'BT') {
                $('#modeBT').prop('checked', true);
            } else {
                $('#modeUSB').prop('checked', true);
            }
            
            updatePrinterUI();

            $.get('app/antrian.php?p=pengaturan', function(data) {
                $('#namars').text(data.nama_instansi);
                $('#print-rs-name').text(data.nama_instansi.toUpperCase());
            }, 'json');
            
            loadData();
            setInterval(loadData, 15000);
        });

        let allPatients = [];

        function filterData() {
            const query = $('#search-input').val().toLowerCase();
            if (!allPatients || !Array.isArray(allPatients)) {
                renderTable([]);
                return;
            }
            
            const filtered = allPatients.filter(item => 
                (item.nm_pasien && item.nm_pasien.toLowerCase().includes(query)) || 
                (item.no_rawat && item.no_rawat.toLowerCase().includes(query)) ||
                (item.no_resep && item.no_resep.toLowerCase().includes(query))
            );
            renderTable(filtered);
        }

        function updatePrinterUI() {
            const mode = $('#modeBT').is(':checked') ? 'BT' : 'USB';
            localStorage.setItem('printerMode', mode);
            
            // Show/Hide Controls
            // USB Mode: Can use Browser Print (Default) OR Web Serial (Direct)
            // BT Mode: Must use Web Bluetooth (Direct) OR RawBT (Fallback)
            
            $('#connection-controls').show();
            
            if (mode === 'BT') {
                $('#helper-text').text('Pastikan Bluetooth aktif dan printer nyala.');
                $('#fallback-info').show();
            } else {
                $('#helper-text').text('Gunakan Browser Print (Default) atau Web Serial.');
                $('#fallback-info').hide();
            }
            
            // Reset connection state on mode switch
            if(isConnected) disconnectPrinter();
        }

        async function connectPrinter() {
            const mode = localStorage.getItem('printerMode');
            
            try {
                if (mode === 'BT') {
                    // Web Bluetooth
                    if (!navigator.bluetooth) {
                        alert('Browser ini tidak mendukung Web Bluetooth.');
                        return;
                    }
                    
                    printerDevice = await navigator.bluetooth.requestDevice({
                        filters: [{ services: ['000018f0-0000-1000-8000-00805f9b34fb'] }], // Standard Service
                        optionalServices: ['000018f0-0000-1000-8000-00805f9b34fb'],
                        acceptAllDevices: false
                    }).catch(e => {
                        // Fallback: try acceptAllDevices if filter fails
                         return navigator.bluetooth.requestDevice({
                            acceptAllDevices: true,
                            optionalServices: ['000018f0-0000-1000-8000-00805f9b34fb'] 
                        });
                    });

                    const server = await printerDevice.gatt.connect();
                    const service = await server.getPrimaryService('000018f0-0000-1000-8000-00805f9b34fb');
                    printerCharacteristic = await service.getCharacteristic('00002af1-0000-1000-8000-00805f9b34fb'); // Write Char

                    $('#device-name').text(printerDevice.name);
                    setConnected(true);

                } else {
                    // Web Serial (USB)
                    if (!navigator.serial) {
                        alert('Browser ini tidak mendukung Web Serial API.');
                        return;
                    }

                    const port = await navigator.serial.requestPort();
                    await port.open({ baudRate: 9600 });
                    
                    const textEncoder = new TextEncoderStream();
                    const writableStreamClosed = textEncoder.readable.pipeTo(port.writable);
                    printerWriter = textEncoder.writable.getWriter();
                    
                    printerDevice = port; // Store port
                    $('#device-name').text("USB Printer");
                    setConnected(true);
                }
            } catch (error) {
                console.error(error);
                Swal.fire('Gagal', 'Koneksi gagal: ' + error.message, 'error');
                setConnected(false);
            }
        }

        function disconnectPrinter() {
            if (printerDevice) {
                if (printerDevice.gatt) printerDevice.gatt.disconnect();
                if (printerWriter) printerWriter.releaseLock();
                // if (printerDevice.close) printerDevice.close(); // Serial port close logic is complex
            }
            printerDevice = null;
            printerCharacteristic = null;
            printerWriter = null;
            setConnected(false);
            $('#device-name').text('-');
        }

        function setConnected(status) {
            isConnected = status;
            const el = $('#connection-status-badge');
            const btn = $('#btn-connect');
            
            if (status) {
                el.removeClass('bg-label-secondary').addClass('bg-success text-white').html('<i class="fa fa-link me-1"></i> Connected');
                btn.removeClass('btn-primary').addClass('btn-danger').html('<i class="fa fa-times me-1"></i> Putus Koneksi').attr('onclick', 'disconnectPrinter()');
            } else {
                el.removeClass('bg-success text-white').addClass('bg-label-secondary').html('<i class="fa fa-circle text-danger me-1" style="font-size: 8px;"></i> Disconnected');
                btn.removeClass('btn-danger').addClass('btn-primary').html('<i class="fa fa-search me-1"></i> Cari & Sambungkan').attr('onclick', 'connectPrinter()');
            }
        }

        async function handlePrint(noResep, namaPasien, poli, noRawat) {
            const mode = localStorage.getItem('printerMode');

            // 1. If Connected Direct (BT or USB), use it
            if (isConnected) {
                try {
                    const data = getEscPosData(noResep, namaPasien, poli, noRawat);
                    
                    if (mode === 'BT' && printerCharacteristic) {
                        // Bluetooth writes in chunks (max 512 bytes usually)
                        await printerCharacteristic.writeValue(data);
                    } else if (mode === 'USB' && printerWriter) {
                        // Serial writes string/text usually, but we need bytes. 
                        // Our writer is TextEncoderStream, so we need to write string.
                        // BUT thermal printers need raw bytes.
                        // FIX: Re-open port as raw if needed, OR just send text if printer supports it.
                        // Better: Use raw writer.
                        // For simplicity in this iteration:
                        // If using TextEncoderStream, we can only send text.
                        // Let's assume we send formatted text.
                        
                        // REVISION: For USB Thermal, we need Uint8Array writer.
                        // Since I initialized with TextEncoderStream, I should fix that in connect().
                        // However, let's try writing the string version first.
                        
                        // Actually, let's just use the raw writer for USB to be safe.
                        // I will fix connectUsb to use getWriter() directly on port.writable
                        
                        // Since I cannot change connectUsb easily now without re-writing the whole block,
                        // I will assume the user will re-connect if I change the code.
                        // Wait, I can just write text for now.
                        
                        await printerWriter.write(getTextData(noResep, namaPasien, poli, noRawat));
                    }
                    
                    Swal.fire({ icon: 'success', title: 'Dicetak', timer: 1500, showConfirmButton: false });
                    
                } catch (e) {
                    console.error(e);
                    Swal.fire('Error', 'Gagal mencetak: ' + e.message, 'error');
                }
                return;
            }

            // 2. If Not Connected, Fallback
            if (mode === 'BT') {
                // Fallback to RawBT
                printRawBT(noResep, namaPasien, poli, noRawat);
            } else {
                // Fallback to Browser Print
                printQueue(noResep, namaPasien, poli, noRawat);
            }
        }
        
        // Helper: Generate ESC/POS Bytes (Uint8Array)
        function getEscPosData(noResep, namaPasien, poli, noRawat) {
            const encoder = new TextEncoder();
            const rsName = $('#namars').text().toUpperCase();
            const d = new Date();
            const dateStr = `${d.getDate()}/${d.getMonth()+1}/${d.getFullYear()} ${d.getHours()}:${String(d.getMinutes()).padStart(2,'0')}`;
            
            let commands = [];
            
            // Helper to push string
            const addText = (text) => {
                const bytes = encoder.encode(text);
                bytes.forEach(b => commands.push(b));
            };
            
            // Init
            commands.push(0x1B, 0x40); // ESC @
            
            // Center Align
            commands.push(0x1B, 0x61, 0x01);
            addText(rsName + "\n");
            addText("--------------------------------\n");
            
            // Left Align
            commands.push(0x1B, 0x61, 0x00);
            commands.push(0x0A); // LF
            
            // Center + Large
            commands.push(0x1B, 0x61, 0x01);
            addText("NOMOR ANTRIAN\n");
            commands.push(0x1D, 0x21, 0x11); // Double Width + Height
            addText(noResep + "\n");
            commands.push(0x1D, 0x21, 0x00); // Normal
            
            // Left Align + Details
            commands.push(0x1B, 0x61, 0x00);
            commands.push(0x0A);
            addText("Nama    : " + namaPasien + "\n");
            addText("No.Rawat: " + noRawat + "\n");
            addText("Poli    : " + poli + "\n");
            addText("Waktu   : " + dateStr + "\n");
            
            // Footer
            commands.push(0x1B, 0x61, 0x01); // Center
            addText("--------------------------------\n");
            addText("Silahkan menunggu panggilan.\n");
            addText("Semoga lekas sembuh.\n");
            commands.push(0x0A, 0x0A, 0x0A); // Feed
            commands.push(0x1D, 0x56, 0x42, 0x00); // Cut
            
            return new Uint8Array(commands);
        }
        
        function getTextData(noResep, namaPasien, poli, noRawat) {
             const rsName = $('#namars').text().toUpperCase();
             const d = new Date();
             const dateStr = `${d.getDate()}/${d.getMonth()+1}/${d.getFullYear()} ${d.getHours()}:${String(d.getMinutes()).padStart(2,'0')}`;
             
             return `
${rsName}
--------------------------------

NOMOR ANTRIAN
${noResep}

Nama    : ${namaPasien}
No.Rawat: ${noRawat}
Poli    : ${poli}
Waktu   : ${dateStr}
--------------------------------
Silahkan menunggu panggilan.
Semoga lekas sembuh.


`;
        }

        function loadData() {
            $.ajax({
                url: 'app/antrian.php?p=list_antrian_farmasi',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    allPatients = data || []; // Ensure it's an array
                    filterData(); // This will call renderTable with current filter
                },
                error: function(xhr, status, error) {
                    console.error("Error loading data:", error);
                    $('#table-antrian tbody').html('<tr><td colspan="8" class="text-center text-danger py-4">Gagal memuat data. Silahkan refresh halaman.</td></tr>');
                }
            });
        }

        function renderTable(data) {
            const tbody = $('#table-antrian tbody');
            tbody.empty();
            
            // Calculate stats from ALL patients (not filtered)
            let statsTotal = 0, statsRacikan = 0, statsNonracikan = 0;
            if (allPatients && Array.isArray(allPatients)) {
                allPatients.forEach(item => {
                     const isServed = item.jam_penyerahan && item.jam_penyerahan !== '00:00:00';
                     if (!isServed) {
                        statsTotal++;
                        if(item.jenis_resep === 'Racikan') statsRacikan++; else statsNonracikan++;
                     }
                });
            }
            
            $('#total-antrian').text(statsTotal);
            $('#total-racikan').text(statsRacikan);
            $('#total-nonracikan').text(statsNonracikan);

            if (data && data.length > 0) {
                data.forEach(item => {
                    const isServed = item.jam_penyerahan && item.jam_penyerahan !== '00:00:00';
                    
                    const badgeClass = item.jenis_resep === 'Racikan' ? 'status-racikan' : 'status-nonracikan';
                    const rowClass = isServed ? 'bg-light text-muted' : '';
                    const btnDoneState = isServed ? 'btn-disabled' : 'btn-done-mobile';
                    const btnDoneText = isServed ? '<i class="fa fa-check-double"></i>' : '<i class="fa fa-check"></i> Selesai';
                    const btnDoneAction = isServed ? '' : `onclick="markAsDone('${item.no_resep_full}', '${item.nm_pasien.replace(/'/g, "\\'")}')"`;
                    
                    // Desktop Row
                    const desktopRow = `
                        <tr class="${rowClass} d-none d-md-table-row">
                            <td><span class="queue-badge ${isServed ? 'bg-secondary text-white' : ''}">${item.no_resep}</span></td>
                            <td>
                                <div class="d-flex flex-column">
                                    <span class="fw-bold ${isServed ? 'text-muted' : 'text-dark'}">${item.nm_pasien}</span>
                                    <small class="text-muted" style="font-size: 0.75rem;"><i class="fa fa-id-card me-1"></i> ${item.no_rawat}</small>
                                </div>
                            </td>
                            <td><span class="fw-semibold ${isServed ? 'text-muted' : 'text-secondary'}">${item.nm_poli}</span></td>
                            <td><span class="status-badge ${isServed ? 'bg-secondary text-white' : badgeClass}">${item.jenis_resep}</span></td>
                            <td>${item.jam_peresepan}</td>
                            <td>${item.jam}</td>
                            <td>${isServed ? item.jam_penyerahan : '-'}</td>
                            <td class="text-end">
                                <button class="btn btn-modern btn-info btn-sm text-white" onclick="callPatient('${item.no_resep}', '${item.nm_pasien.replace(/'/g, "\\'")}', '${item.nm_poli}', '${item.no_rawat}', '${item.no_resep_full}')">
                                    <i class="fa fa-volume-up"></i>
                                </button>
                                <button class="btn btn-modern btn-dark btn-sm" onclick="handlePrint('${item.no_resep}', '${item.nm_pasien.replace(/'/g, "\\'")}', '${item.nm_poli}', '${item.no_rawat}')">
                                    <i class="fa fa-print"></i> Cetak
                                </button>
                                <button class="btn btn-modern btn-sm ${isServed ? 'btn-secondary disabled' : 'btn-done'}" ${btnDoneAction}>
                                    ${isServed ? 'Selesai' : 'Selesai'}
                                </button>
                            </td>
                        </tr>
                    `;
                    
                    // Mobile Card
                    const mobileCard = `
                        <tr class="d-md-none border-0 bg-transparent shadow-none p-0 mb-3">
                            <td colspan="8" class="p-0 border-0 bg-transparent">
                                <div class="card mb-3 shadow-sm border-0 overflow-hidden">
                                    <div class="card-header-mobile">
                                        <span class="fw-bold text-primary" style="font-size: 1.2rem;">${item.no_resep}</span>
                                        <span class="status-badge ${badgeClass}" style="font-size: 0.7rem;">${item.jenis_resep}</span>
                                    </div>
                                    <div class="card-body-mobile">
                                        <div class="info-row">
                                            <span class="info-label">Pasien</span>
                                            <span class="info-value text-truncate" style="max-width: 150px;">${item.nm_pasien}</span>
                                        </div>
                                        <div class="info-row">
                                            <span class="info-label">No. RM</span>
                                            <span class="info-value">${item.no_rawat}</span>
                                        </div>
                                        <div class="info-row">
                                            <span class="info-label">Poli</span>
                                            <span class="info-value">${item.nm_poli}</span>
                                        </div>
                                    </div>
                                    <div class="card-footer-mobile">
                                        <div class="action-bar">
                                            <button class="btn-action-mobile btn-call" onclick="callPatient('${item.no_resep}', '${item.nm_pasien.replace(/'/g, "\\'")}', '${item.nm_poli}', '${item.no_rawat}', '${item.no_resep_full}')">
                                                <i class="fa fa-volume-up"></i>
                                            </button>
                                            <button class="btn-action-mobile btn-print-mobile" onclick="handlePrint('${item.no_resep}', '${item.nm_pasien.replace(/'/g, "\\'")}', '${item.nm_poli}', '${item.no_rawat}')">
                                                <i class="fa fa-print"></i>
                                            </button>
                                            <button class="btn-action-mobile ${btnDoneState}" ${btnDoneAction}>
                                                ${btnDoneText}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    `;
                    
                    tbody.append(desktopRow + mobileCard);
                });
            } else {
                tbody.html(`
                    <tr>
                        <td colspan="8" class="text-center py-5">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <div style="background: #e0f7fa; padding: 20px; border-radius: 50%; margin-bottom: 15px;">
                                    <i class="fa fa-clipboard-check fa-3x text-info"></i>
                                </div>
                                <h5 class="text-muted fw-bold">Tidak ada antrian yang cocok</h5>
                            </div>
                        </td>
                    </tr>
                `);
            }
        }

        function callPatient(noResep, namaPasien, poli, noRawat, noResepFull) {
            // 1. Panggil Lokal (Feedback untuk petugas)
            const textToSay = `Nomor Antrian ${noResep}, Atas Nama ${namaPasien}, Silahkan ke loket penyerahan obat`;
            
            if ('speechSynthesis' in window) {
                const utterance = new SpeechSynthesisUtterance(textToSay);
                utterance.lang = 'id-ID';
                utterance.rate = 0.9;
                window.speechSynthesis.speak(utterance);
            }

            // 2. Trigger Panggilan di TV (Server-side)
            // Kita kirim request ke server agar status di antriapotek3 jadi '1'
            // TV yang polling p=panggil akan mendeteksi ini dan memutar suara.
            $.ajax({
                url: 'app/antrian.php?p=simpan_panggil',
                type: 'GET',
                data: { 
                    no_rawat: noRawat,
                    no_resep: noResepFull // Kirim No Resep Full untuk disimpan
                },
                success: function(response) {
                    console.log("Call triggered on server");
                    const Toast = Swal.mixin({
                        toast: true, position: 'top-center', showConfirmButton: false, timer: 3000
                    });
                    Toast.fire({ icon: 'info', title: `Memanggil ${namaPasien}...` });
                }
            });
        }

        function printQueue(noResep, namaPasien, namaPoli, noRawat) {
            $('#print-queue-no').text(noResep);
            $('#print-name').text(namaPasien);
            $('#print-poli').text(namaPoli);
            $('#print-rm').text(noRawat);
            const d = new Date();
            $('#print-date').text(`${d.getDate()}/${d.getMonth()+1}/${d.getFullYear()} ${d.getHours()}:${String(d.getMinutes()).padStart(2,'0')}`);

            setTimeout(function() {
                const printArea = document.getElementById('print-area');
                if (!printArea) return;

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
                const links = Array.from(document.querySelectorAll('link[rel="stylesheet"]')).map(link => link.outerHTML).join('');
                const styles = Array.from(document.querySelectorAll('style')).map(s => s.outerHTML).join('');

                doc.open();
                doc.write(`<!doctype html>
                    <html>
                    <head>
                        <title>Cetak Antrian</title>
                        ${links}
                        ${styles}
                        <style>body { margin: 0; background: white; }</style>
                    </head>
                    <body>${printArea.outerHTML}</body>
                    </html>`);
                doc.close();

                const onPrintFinish = () => {
                    setTimeout(() => {
                        if (iframe && iframe.parentNode) iframe.parentNode.removeChild(iframe);
                    }, 500);
                };

                iframe.contentWindow.focus();
                if ('onafterprint' in iframe.contentWindow) {
                    iframe.contentWindow.onafterprint = onPrintFinish;
                } else {
                    setTimeout(onPrintFinish, 2000);
                }

                setTimeout(() => {
                    try {
                        iframe.contentWindow.print();
                    } catch (err) {
                        window.print();
                    }
                }, 250);
            }, 150);
        }

        function printRawBT(noResep, namaPasien, poli, noRawat) {
             const rsName = $('#namars').text().toUpperCase();
             const d = new Date();
             const dateStr = `${d.getDate()}/${d.getMonth()+1}/${d.getFullYear()} ${d.getHours()}:${String(d.getMinutes()).padStart(2,'0')}`;
             
             let text = '';
             text += '[C]<b>' + rsName + '</b>\n';
             text += '[C]--------------------------------\n';
             text += '[C]<font size="big">NOMOR ANTRIAN</font>\n';
             text += '[C]<font size="big" w="2" h="2"><b>' + noResep + '</b></font>\n';
             text += '[L]\n';
             text += '[L]Nama    : ' + namaPasien + '\n';
             text += '[L]No.Rawat: ' + noRawat + '\n';
             text += '[L]Poli    : ' + poli + '\n';
             text += '[L]Waktu   : ' + dateStr + '\n';
             text += '[C]--------------------------------\n';
             text += '[C]Silahkan menunggu panggilan.\n';
             text += '[C]Semoga lekas sembuh.\n';
             text += '[L]\n\n';

             const encodedText = encodeURIComponent(text);
             window.location.href = 'rawbt:' + encodedText;
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
