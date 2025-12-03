<?php
require('fpdf/fpdf.php');
require('koneksi.php');

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

// Judul
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190, 10, 'SEKOLAH MENENGAH KEJURUAN NEGERI 2 LANGSA', 0, 1, 'C');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(190, 7, 'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK', 0, 1, 'C');

$pdf->Ln(5);

// Header tabel
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(40, 10, 'NIM', 1, 0, 'C');
$pdf->Cell(60, 10, 'NAMA MAHASISWA', 1, 0, 'C');
$pdf->Cell(40, 10, 'NO HP', 1, 0, 'C');
$pdf->Cell(40, 10, 'TANGGAL LHR', 1, 1, 'C');

$pdf->SetFont('Arial', '', 12);

$query = mysqli_query($koneksi, "SELECT * FROM siswa");

while ($row = mysqli_fetch_assoc($query)) {
    $pdf->Cell(40, 10, $row['nim'], 1, 0);
    $pdf->Cell(60, 10, $row['nama'], 1, 0);
    $pdf->Cell(40, 10, $row['nohp'], 1, 0);
    $pdf->Cell(40, 10, $row['tgl_lahir'], 1, 1);
}

$pdf->Output();
?>
