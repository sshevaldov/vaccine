<?php

define('FPDF_FONTPATH', "../../libs/font/");
require('../../libs/fpdf.php');
require_once('../../common/funct.php');
$pdf = new FPDF();
$pdf->AddPage('P');
$pdf->AddFont('Arial', '', 'arial.php');
$pdf->SetFont('Arial','');

$pdf->SetFontSize(20);
$pdf->MultiCell(0, 10, iconv('utf-8', 'windows-1251', "Сертификат о вакцинации"));
$pdf->SetFontSize(15);
$pdf->MultiCell(0, 9, iconv('utf-8', 'windows-1251', "Персональные данные"));


$link = dbconnect();
$link->set_charset("utf8");

$sql = "SELECT * from `users` WHERE `passport`='{$_SESSION['passport']}'";
$result = mysqli_query($link, $sql);

$pdf->SetFontSize(10);

while ($row = mysqli_fetch_array($result)) {
    $pdf->MultiCell(0, 6, iconv('utf-8', 'windows-1251', "{$row['surname']} {$row['name']} {$row['secondname']} "));
    $pdf->MultiCell(0, 6, iconv('utf-8', 'windows-1251', "Дата рождения: {$row['birthdate']}"));    
    $pdf->MultiCell(0, 6, iconv('utf-8', 'windows-1251', "Пол: {$row['sex']}"));
    $pdf->MultiCell(0, 6, iconv('utf-8', 'windows-1251', "Телефон: {$row['phone']}"));
    $pdf->MultiCell(0, 6, iconv('utf-8', 'windows-1251', "ОМС: {$row['oms']}"));
    $pdf->MultiCell(0, 6, iconv('utf-8', 'windows-1251', "Паспорт: {$row['passport']}"));
}

$sql = "SELECT * from `list` WHERE `passport`='{$_SESSION['passport']}' ORDER BY `date`";
$result = mysqli_query($link, $sql);
$p=1;
while ($row = mysqli_fetch_array($result)) {
    $pdf->SetFontSize(15);
    $pdf->MultiCell(0, 8, iconv('utf-8', 'windows-1251', "{$p}-я вакцинация"));
    $pdf->SetFontSize(10);
    $pdf->MultiCell(0, 6, iconv('utf-8', 'windows-1251', "Медицинская организация: {$row['city_name']}, {$row['place_name']} "));
    
    $pdf->MultiCell(0, 6, iconv('utf-8', 'windows-1251', "Дата введения вакцины: {$row['date']} "));
   
   
    $p+=1;
    
}


$pdf->Output('label.pdf', 'I');
