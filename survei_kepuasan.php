<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <title>Survei Kepuasan Pelanggan</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="assets/vendor/css/rtl/core.css" />
    <link rel="stylesheet" href="assets/vendor/css/rtl/theme-default.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .survey-container {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            padding: 3rem;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
            width: 90%;
            max-width: 1000px;
            text-align: center;
        }

        .survey-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #2d3436;
            margin-bottom: 1rem;
        }

        .survey-subtitle {
            font-size: 1.2rem;
            color: #636e72;
            margin-bottom: 3rem;
        }

        .emoji-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
        }

        .emoji-card {
            background: white;
            border-radius: 24px;
            padding: 2rem 1rem;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 2px solid transparent;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        }

        .emoji-card:hover {
            transform: translateY(-10px) scale(1.05);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .emoji-icon {
            font-size: 5rem;
            margin-bottom: 1rem;
            display: block;
            transition: transform 0.3s;
        }

        .emoji-card:hover .emoji-icon {
            transform: scale(1.2);
        }

        .emoji-label {
            font-size: 1.2rem;
            font-weight: 700;
            color: #2d3436;
        }

        /* Colors */
        .card-sangat-puas:hover { border-color: #00b894; background: #e0f7fa; }
        .card-sangat-puas .emoji-icon { color: #00b894; }
        
        .card-puas:hover { border-color: #0984e3; background: #e3f2fd; }
        .card-puas .emoji-icon { color: #0984e3; }

        .card-kurang-puas:hover { border-color: #fdcb6e; background: #fff3e0; }
        .card-kurang-puas .emoji-icon { color: #fdcb6e; }

        .card-tidak-puas:hover { border-color: #d63031; background: #ffebee; }
        .card-tidak-puas .emoji-icon { color: #d63031; }

        /* Responsive */
        @media (max-width: 768px) {
            .emoji-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .survey-title { font-size: 1.8rem; }
        }
        
        .back-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            background: rgba(255,255,255,0.5);
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            font-weight: 600;
            color: #636e72;
            text-decoration: none;
            transition: all 0.3s;
        }
        .back-btn:hover {
            background: white;
            color: #2d3436;
        }
    </style>
</head>
<body>
    <a href="home.php" class="back-btn"><i class="fa fa-arrow-left me-2"></i> Kembali</a>

    <div class="survey-container">
        <h1 class="survey-title">Bagaimana Pelayanan Kami?</h1>
        <p class="survey-subtitle">Masukan Anda sangat berharga untuk meningkatkan kualitas layanan Farmasi kami.</p>

        <div class="emoji-grid">
            <!-- Sangat Puas -->
            <div class="emoji-card card-sangat-puas" onclick="submitSurvey('Sangat Puas')">
                <span class="emoji-icon"><i class="fa fa-grin-hearts"></i></span>
                <div class="emoji-label">Sangat Puas</div>
            </div>

            <!-- Puas -->
            <div class="emoji-card card-puas" onclick="submitSurvey('Puas')">
                <span class="emoji-icon"><i class="fa fa-smile"></i></span>
                <div class="emoji-label">Puas</div>
            </div>

            <!-- Kurang Puas -->
            <div class="emoji-card card-kurang-puas" onclick="submitSurvey('Kurang Puas')">
                <span class="emoji-icon"><i class="fa fa-meh"></i></span>
                <div class="emoji-label">Kurang Puas</div>
            </div>

            <!-- Tidak Puas -->
            <div class="emoji-card card-tidak-puas" onclick="submitSurvey('Tidak Puas')">
                <span class="emoji-icon"><i class="fa fa-frown"></i></span>
                <div class="emoji-label">Tidak Puas</div>
            </div>
        </div>
    </div>

    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function submitSurvey(skor) {
            // Animasi Loading
            Swal.fire({
                title: 'Menyimpan...',
                allowOutsideClick: false,
                didOpen: () => { Swal.showLoading() }
            });

            $.ajax({
                url: 'app/kepuasan.php?act=simpan',
                type: 'POST',
                data: { skor: skor },
                dataType: 'json',
                success: function(response) {
                    if(response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Terima Kasih!',
                            text: 'Masukan Anda telah kami terima.',
                            timer: 2000,
                            showConfirmButton: false,
                            backdrop: `rgba(0,0,123,0.4) url("assets/img/confetti.gif") left top no-repeat`
                        });
                    } else {
                        Swal.fire('Error', response.message, 'error');
                    }
                },
                error: function() {
                    Swal.fire('Error', 'Gagal terhubung ke server', 'error');
                }
            });
        }
    </script>
</body>
</html>
