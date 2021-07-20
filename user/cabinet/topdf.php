<?php  
  session_start();   
  define('FPDF_FONTPATH',"../../libs/font/");
  require('../../libs/fpdf.php');  
      $pdf=new FPDF();  
      $pdf->AddPage('P');  
      $pdf->AddFont('Arial','','arial.php');  
      $pdf->SetFont('Arial');       
      $pdf->SetFontSize(25);   
      $pdf->MultiCell(0,0,iconv('utf-8', 'windows-1251',"Табель записи на вакцинацию"),0,'C');
      $pdf->SetFontSize(15); 
      $pdf->MultiCell(0,8,iconv('utf-8', 'windows-1251',"Пациент"));
      $pdf->SetFontSize(10); 
      $pdf->MultiCell(0,8,iconv('utf-8', 'windows-1251',"{$_SESSION['fio']}"));
      $pdf->MultiCell(0,8,iconv('utf-8', 'windows-1251',"Дата рождения: {$_SESSION['birthdate']}"));
      $pdf->MultiCell(0,8,iconv('utf-8', 'windows-1251',"ОМС: {$_SESSION['oms']}"));
      $pdf->MultiCell(0,8,iconv('utf-8', 'windows-1251',"Серия/номер паспорта: {$_SESSION['passport']}"));
      $pdf->MultiCell(0,8,iconv('utf-8', 'windows-1251',"Код подразделения: {$_SESSION['district_code']}"));
      $pdf->MultiCell(0,8,iconv('utf-8', 'windows-1251',"Телефон :{$_SESSION['phone']}"));
      $pdf->SetFontSize(15); 
      $pdf->MultiCell(0,8,iconv('utf-8', 'windows-1251',"Записан на вакцинацию"));
      $pdf->SetFontSize(10); 
      $pdf->MultiCell(0,8,iconv('utf-8', 'windows-1251',"Адрес вакцинации: {$_SESSION['adress']}"));
      $pdf->MultiCell(0,8,iconv('utf-8', 'windows-1251',"Дата и время: {$_SESSION['datetime']}"));
      $pdf->Output('label.pdf','I');    
?>