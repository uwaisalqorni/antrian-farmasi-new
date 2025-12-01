<?php
require_once('../conf/conf.php');
date_default_timezone_set('Asia/Jakarta');

// Auto Create Table if not exists
$checkTable = bukaquery("SHOW TABLES LIKE 'skor_kepuasan_farmasi'");
if(mysqli_num_rows($checkTable) == 0) {
    bukaquery("CREATE TABLE skor_kepuasan_farmasi (
        id INT AUTO_INCREMENT PRIMARY KEY,
        tanggal DATE,
        jam TIME,
        skor ENUM('Sangat Puas', 'Puas', 'Kurang Puas', 'Tidak Puas'),
        saran TEXT
    )");
}

if(isset($_GET['act'])) {
    switch($_GET['act']) {
        case 'simpan':
            $skor = isset($_POST['skor']) ? $_POST['skor'] : '';
            $saran = isset($_POST['saran']) ? $_POST['saran'] : '';
            $tanggal = date('Y-m-d');
            $jam = date('H:i:s');

            if($skor) {
                $insert = bukaquery("INSERT INTO skor_kepuasan_farmasi (tanggal, jam, skor, saran) VALUES ('$tanggal', '$jam', '$skor', '$saran')");
                if($insert) {
                    echo json_encode(['status' => 'success']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan data']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Skor tidak boleh kosong']);
            }
            break;

        case 'laporan':
            $tgl_awal = isset($_GET['tgl_awal']) ? $_GET['tgl_awal'] : date('Y-m-d');
            $tgl_akhir = isset($_GET['tgl_akhir']) ? $_GET['tgl_akhir'] : date('Y-m-d');

            $query = "SELECT skor, COUNT(*) as jumlah FROM skor_kepuasan_farmasi 
                      WHERE tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir' 
                      GROUP BY skor";
            
            $hasil = bukaquery($query);
            $data = [
                'Sangat Puas' => 0,
                'Puas' => 0,
                'Kurang Puas' => 0,
                'Tidak Puas' => 0
            ];
            $total = 0;

            while($row = mysqli_fetch_assoc($hasil)) {
                $data[$row['skor']] = (int)$row['jumlah'];
                $total += (int)$row['jumlah'];
            }

            // Calculate Percentages
            $stats = [];
            foreach($data as $key => $val) {
                $stats[$key] = [
                    'count' => $val,
                    'pct' => $total > 0 ? round(($val / $total) * 100, 1) : 0
                ];
            }

            // Calculate Satisfaction Index (Sangat Puas + Puas)
            $satisfied_count = $data['Sangat Puas'] + $data['Puas'];
            $satisfaction_index = $total > 0 ? round(($satisfied_count / $total) * 100, 1) : 0;

            echo json_encode([
                'stats' => $stats,
                'total' => $total,
                'satisfaction_index' => $satisfaction_index
            ]);
            break;
    }
}
?>
