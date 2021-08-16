<?php

define('FPDF_FONTPATH', "../../libs/font/");
require('../../libs/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage('P');
$pdf->AddFont('Arial', '', 'arial.php');
$pdf->SetFont('Arial');


require_once('../../common/funct.php');
$link = dbconnect();
$link->set_charset("utf8");
$sql = "SELECT * from `list`";
$flag = 0;

if ($_SESSION['dp1'] != '') {
  
    if ($flag == 0) {
        $sql = $sql . 'WHERE ';
    } else {
        $sql = $sql . ' AND ';
    }
    $sql = $sql . "`date` >= " . $_SESSION['dp1'] . "";
    $flag = 1;
}


if ($_SESSION['dp2'] != '') {
    if ($flag == 0) {
        $sql = $sql . 'WHERE ';
    } else {
        $sql = $sql . ' AND ';
    }
    $sql = $sql . "`date` <= ".$_SESSION['dp2']."";
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
if ($_SESSION['sort'] != '') {
    $sql = $sql . " ORDER BY " . $_SESSION['sort'] . "";
} else {
    $sql = $sql . " ORDER BY `city_name`, `place_name`, `date`, `username`";
}
$result = mysqli_query($link, $sql);
$pdf->SetFillColor(207, 207, 207);

$pdf->SetFontSize(8);
$pdf->Cell(6, 4, iconv('utf-8', 'windows-1251', "№"), 1, 0, 'L', true);
$pdf->Cell(25, 4, iconv('utf-8', 'windows-1251', "Город"), 1, 0, 'L', true);
$pdf->Cell(80, 4, iconv('utf-8', 'windows-1251', "Адрес"), 1, 0, 'L', true);
$pdf->Cell(24, 4, iconv('utf-8', 'windows-1251', "Дата и время"), 1, 0, 'C', true);
$pdf->Cell(40, 4, iconv('utf-8', 'windows-1251', "Пациент"), 1, 0, 'C', true);
$pdf->Cell(17, 4, iconv('utf-8', 'windows-1251', "Паспорт"), 1, 0, 'C', true);
$pdf->Ln();
$index = 1;
while ($row = mysqli_fetch_array($result)) {
    $pdf->SetFontSize(7);
    $pdf->Cell(6, 4, "{$index}", "LTR", 0, 'L');
    $pdf->Cell(25, 4, iconv('utf-8', 'windows-1251', "{$row['city_name']} "), "LTR", 0, 'L');
    $pdf->Cell(80, 4, iconv('utf-8', 'windows-1251', "{$row['place_name']} "), "LTR", 0, 'L');
    $pdf->Cell(24, 4,  iconv('utf-8', 'windows-1251', "{$row['date']} {$row['time']}"), "LTR");
    $pdf->Cell(40, 4,  iconv('utf-8', 'windows-1251', "{$row['username']}"), "LTR");
    $pdf->Cell(17, 4,  iconv('utf-8', 'windows-1251', "{$row['passport']}"), "LTR");
    $pdf->Ln();
    $index++;
}
$pdf->MultiCell(0, 4, iconv('utf-8', 'windows-1251', "Пациент: {$_SESSION['dp1']}"));
$pdf->MultiCell(0, 4, iconv('utf-8', 'windows-1251', "Пациент: {$_SESSION['dp2']}"));
$pdf->Ln();
$pdf->MultiCell(0, 4, iconv('utf-8', 'windows-1251', " {$sql}"));

$pdf->MultiCell(0, 4, iconv('utf-8', 'windows-1251', " {$_SESSION['ps']}"));


$pdf->Output('label.pdf', 'I');
