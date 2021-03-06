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
$sql = $sql . " ORDER BY `city_name`, `place_name`, `date`, `username`";
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
