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
$sql = "SELECT * from `list` WHERE `passport`='{$_SESSION['passport']}' ORDER BY `city_name`, `place_name`, `date`";

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
