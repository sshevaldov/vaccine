<?php
session_start();
define('FPDF_FONTPATH', "libs/font/");
require('libs/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage('P');
$pdf->AddFont('Arial', '', 'arial.php');
$pdf->SetFont('Arial');


$servername = "localhost";
$uname = "root";
$pword = "";
$dbname = "vaccine";
$link = mysqli_connect($servername, $uname, $pword, $dbname);
$link->set_charset("utf8");
$sql = "SELECT * from `list`";
$result = mysqli_query($link, $sql);
while ($row = mysqli_fetch_array($result)) {
 
  $pdf->SetFontSize(10);
  $pdf->MultiCell(0, 4, iconv('utf-8', 'windows-1251', "Запись:"));
  $pdf->MultiCell(0, 4, iconv('utf-8', 'windows-1251', "Адрес: {$row['city_name']}, {$row['place_name']} "));
  $pdf->MultiCell(0, 4, iconv('utf-8', 'windows-1251', "Дата и время: {$row['date']} {$row['time']}"));
  $pdf->MultiCell(0, 4, iconv('utf-8', 'windows-1251', "Пациент: {$row['username']}"));
  $pdf->MultiCell(0, 4, iconv('utf-8', 'windows-1251', " "));
}


$pdf->Output('label.pdf', 'I');
