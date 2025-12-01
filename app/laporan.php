<?php
require_once('../conf/conf.php');
date_default_timezone_set('Asia/Jakarta');

if(isset($_GET['p'])) {
    
    switch($_GET['p']) {
        case 'spm':
            $tgl_awal = isset($_GET['tgl_awal']) ? $_GET['tgl_awal'] : date('Y-m-d');
            $tgl_akhir = isset($_GET['tgl_akhir']) ? $_GET['tgl_akhir'] : date('Y-m-d');

            // Query Data
            // Kita ambil data resep yang sudah diserahkan (jam_penyerahan != '00:00:00')
            // Pagination Params
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
            $offset = ($page - 1) * $limit;

            // Base Query
            $base_query = "SELECT 
                        resep_obat.no_resep, 
                        resep_obat.no_rawat, 
                        resep_obat.tgl_peresepan, 
                        resep_obat.jam_peresepan, 
                        resep_obat.jam_penyerahan,
                        resep_obat.status as status_resep,
                        pasien.nm_pasien,
                        reg_periksa.status_lanjut,
                        poliklinik.nm_poli,
                        dokter.nm_dokter
                      FROM resep_obat 
                      INNER JOIN reg_periksa ON resep_obat.no_rawat = reg_periksa.no_rawat 
                      INNER JOIN pasien ON reg_periksa.no_rkm_medis = pasien.no_rkm_medis 
                      INNER JOIN poliklinik ON reg_periksa.kd_poli = poliklinik.kd_poli
                      INNER JOIN dokter ON resep_obat.kd_dokter = dokter.kd_dokter
                      WHERE resep_obat.tgl_peresepan BETWEEN '$tgl_awal' AND '$tgl_akhir'
                      AND resep_obat.jam_penyerahan <> '00:00:00'";

            // 1. Get Stats (Full Data)
            $query_stats = $base_query . " ORDER BY resep_obat.tgl_peresepan DESC, resep_obat.jam_peresepan DESC";
            $hasil_stats = bukaquery($query_stats);
            
            $stats = [
                'total' => 0,
                'non_racikan' => ['total' => 0, 'tepat' => 0],
                'racikan' => ['total' => 0, 'tepat' => 0],
                'ranap' => ['total' => 0, 'tepat' => 0]
            ];

            // Calculate Stats from ALL data
            while ($row = mysqli_fetch_assoc($hasil_stats)) {
                // Cek Racikan
                $is_racikan = false;
                $cek_racikan = bukaquery("SELECT no_resep FROM resep_dokter_racikan WHERE no_resep = '".$row['no_resep']."'");
                if(mysqli_num_rows($cek_racikan) > 0) {
                    $is_racikan = true;
                }

                // Hitung Durasi (Menit)
                $start = strtotime($row['jam_peresepan']);
                $end = strtotime($row['jam_penyerahan']);
                $diff = $end - $start;
                $minutes = round($diff / 60);

                if ($row['status_lanjut'] == 'Ranap') {
                    $stats['ranap']['total']++;
                    if ($minutes <= 60) $stats['ranap']['tepat']++;
                } else {
                    if ($is_racikan) {
                        $stats['racikan']['total']++;
                        if ($minutes <= 60) $stats['racikan']['tepat']++;
                    } else {
                        $stats['non_racikan']['total']++;
                        if ($minutes <= 30) $stats['non_racikan']['tepat']++;
                    }
                }
                $stats['total']++;
            }

            // 2. Get Paginated Data
            $query_data = $base_query . " ORDER BY resep_obat.tgl_peresepan DESC, resep_obat.jam_peresepan DESC LIMIT $offset, $limit";
            $hasil_data = bukaquery($query_data);
            $data = array();

            while ($row = mysqli_fetch_assoc($hasil_data)) {
                // Cek Racikan
                $is_racikan = false;
                $cek_racikan = bukaquery("SELECT no_resep FROM resep_dokter_racikan WHERE no_resep = '".$row['no_resep']."'");
                if(mysqli_num_rows($cek_racikan) > 0) {
                    $is_racikan = true;
                }

                // Hitung Durasi (Menit)
                $start = strtotime($row['jam_peresepan']);
                $end = strtotime($row['jam_penyerahan']);
                $diff = $end - $start;
                $minutes = round($diff / 60);

                // Kategori & Target
                $kategori = '';
                $target = 0;
                $is_tepat = false;

                if ($row['status_lanjut'] == 'Ranap') {
                    $kategori = 'Ranap';
                    $target = 60;
                    if ($minutes <= $target) $is_tepat = true;
                } else {
                    if ($is_racikan) {
                        $kategori = 'Racikan';
                        $target = 60;
                        if ($minutes <= $target) $is_tepat = true;
                    } else {
                        $kategori = 'Non-Racikan';
                        $target = 30;
                        if ($minutes <= $target) $is_tepat = true;
                    }
                }

                $row['durasi'] = $minutes;
                $row['kategori'] = $kategori;
                $row['target'] = $target;
                $row['is_tepat'] = $is_tepat;
                // $row['nm_pasien'] = $row['nm_pasien']; 
                
                $data[] = $row;
            }

            echo json_encode([
                'stats' => $stats,
                'data' => $data,
                'pagination' => [
                    'total_records' => $stats['total'],
                    'total_pages' => ceil($stats['total'] / $limit),
                    'current_page' => $page,
                    'limit' => $limit
                ]
            ]);
            break;
    }
}
?>
