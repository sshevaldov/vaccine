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
$flag = 0;

if ($_SESSION['dp1'] != '') {
  if ($flag == 0) {
    $sql = $sql . 'WHERE ';
  } else {
    $sql = $sql . ' AND ';
  }
  $sql = $sql . "`date` >'" . $_SESSION['dp1'] . "'";
  $flag = 1;
}
if ($_SESSION['dp2'] != '') {
  if ($flag == 0) {
    $sql = $sql . 'WHERE ';
  } else {
    $sql = $sql . ' AND ';
  }
  $sql = $sql . "`date` < '" . $_SESSION['dp2'] . "'";
  $flag = 1;
}
if ($_SESSION['city_sel'] != '') {
  if ($flag == 0) {
    $sql = $sql . 'WHERE ';
  } else {
    $sql = $sql . ' AND ';
  }
  $sql = $sql . "`city_name` = '" . $_SESSION['city_sel'] . "'";
  $flag = 1;
}
if ($_SESSION['pl_sel'] != '') {
  if ($flag == 0) {
    $sql = $sql . 'WHERE ';
  } else {
    $sql = $sql . ' AND ';
  }
  $sql = $sql . "`place_name` = '" . $_SESSION['pl_sel'] . "'";
  $flag = 1;
}
$result = mysqli_query($link, $sql);


$pdf->SetFillColor(207, 207, 207);


// Title row
$pdf->SetFontSize(8);
$pdf->Cell(114, 4, iconv('utf-8', 'windows-1251', "Адрес"), 1, 0, 'L', true);
$pdf->SetFont('', '');
$pdf->Cell(24, 4, iconv('utf-8', 'windows-1251', "Дата и время"), 1, 0, 'C', true);
$pdf->Cell(40, 4, iconv('utf-8', 'windows-1251', "Пациент"), 1, 0, 'C', true);
$pdf->Ln();

while ($row = mysqli_fetch_array($result)) {
  $pdf->SetFontSize(7);
  $pdf->Cell(114, 4, iconv('utf-8', 'windows-1251', "{$row['city_name']}, {$row['place_name']} "), "LTR", 0, 'L');
  $pdf->Cell(24, 4,  iconv('utf-8', 'windows-1251', "{$row['date']} {$row['time']}"), "LTR");
  $pdf->Cell(40, 4,  iconv('utf-8', 'windows-1251', "{$row['username']}"), "LTR");
  $pdf->Ln();
}
$pdf->Output('label.pdf', 'I');
