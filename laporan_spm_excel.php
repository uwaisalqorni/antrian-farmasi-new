<?php
require 'vendor/autoload.php';
require_once('conf/conf.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

date_default_timezone_set('Asia/Jakarta');

$tgl_awal = isset($_GET['tgl_awal']) ? $_GET['tgl_awal'] : date('Y-m-d');
$tgl_akhir = isset($_GET['tgl_akhir']) ? $_GET['tgl_akhir'] : date('Y-m-d');

// Query Data (Full without pagination)
$query = "SELECT 
            resep_obat.no_resep, 
            resep_obat.no_rawat, 
            resep_obat.tgl_peresepan, 
            resep_obat.jam_peresepan, 
            resep_obat.jam_penyerahan,
            pasien.nm_pasien,
            reg_periksa.status_lanjut,
            dokter.nm_dokter
          FROM resep_obat 
          INNER JOIN reg_periksa ON resep_obat.no_rawat = reg_periksa.no_rawat 
          INNER JOIN pasien ON reg_periksa.no_rkm_medis = pasien.no_rkm_medis 
          INNER JOIN dokter ON resep_obat.kd_dokter = dokter.kd_dokter
          WHERE resep_obat.tgl_peresepan BETWEEN '$tgl_awal' AND '$tgl_akhir'
          AND resep_obat.jam_penyerahan <> '00:00:00'
          ORDER BY resep_obat.tgl_peresepan DESC, resep_obat.jam_peresepan DESC";

$hasil = bukaquery($query);

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Header
$sheet->setCellValue('A1', 'LAPORAN STANDAR PELAYANAN MINIMAL (SPM) FARMASI');
$sheet->mergeCells('A1:H1');
$sheet->setCellValue('A2', 'Periode: ' . $tgl_awal . ' s/d ' . $tgl_akhir);
$sheet->mergeCells('A2:H2');

$sheet->getStyle('A1:A2')->getFont()->setBold(true)->setSize(14);
$sheet->getStyle('A1:A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

// Table Header
$headers = ['No', 'No. Resep', 'Pasien', 'Dokter', 'Kategori', 'Waktu Masuk', 'Waktu Serah', 'Durasi (Menit)', 'Status'];
$col = 'A';
foreach ($headers as $header) {
    $sheet->setCellValue($col . '4', $header);
    $sheet->getColumnDimension($col)->setAutoSize(true);
    $col++;
}

$headerStyle = [
    'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
    'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '4b7bec']],
    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
    'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN]]
];
$sheet->getStyle('A4:I4')->applyFromArray($headerStyle);

// Data
$rowNum = 5;
$no = 1;

while ($row = mysqli_fetch_assoc($hasil)) {
    // Cek Racikan
    $is_racikan = false;
    $cek_racikan = bukaquery("SELECT no_resep FROM resep_dokter_racikan WHERE no_resep = '".$row['no_resep']."'");
    if(mysqli_num_rows($cek_racikan) > 0) {
        $is_racikan = true;
    }

    // Hitung Durasi
    $start = strtotime($row['jam_peresepan']);
    $end = strtotime($row['jam_penyerahan']);
    $diff = $end - $start;
    $minutes = round($diff / 60);

    // Kategori & Status
    $kategori = '';
    $status = '';
    $is_tepat = false;

    if ($row['status_lanjut'] == 'Ranap') {
        $kategori = 'Rawat Inap';
        if ($minutes <= 60) $is_tepat = true;
    } else {
        if ($is_racikan) {
            $kategori = 'Racikan';
            if ($minutes <= 60) $is_tepat = true;
        } else {
            $kategori = 'Non-Racikan';
            if ($minutes <= 30) $is_tepat = true;
        }
    }

    $status = $is_tepat ? 'Tepat Waktu' : 'Terlambat';

    $sheet->setCellValue('A' . $rowNum, $no++);
    $sheet->setCellValue('B' . $rowNum, $row['no_resep']);
    $sheet->setCellValue('C' . $rowNum, $row['nm_pasien']);
    $sheet->setCellValue('D' . $rowNum, $row['nm_dokter']);
    $sheet->setCellValue('E' . $rowNum, $kategori);
    $sheet->setCellValue('F' . $rowNum, $row['jam_peresepan']);
    $sheet->setCellValue('G' . $rowNum, $row['jam_penyerahan']);
    $sheet->setCellValue('H' . $rowNum, $minutes);
    $sheet->setCellValue('I' . $rowNum, $status);

    // Color for Status
    if (!$is_tepat) {
        $sheet->getStyle('I' . $rowNum)->getFont()->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED));
    } else {
        $sheet->getStyle('I' . $rowNum)->getFont()->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_DARKGREEN));
    }

    $rowNum++;
}

// Border for data
$sheet->getStyle('A5:I' . ($rowNum - 1))->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

// Output
$filename = 'Laporan_SPM_Farmasi_' . date('Ymd_His') . '.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
?>
