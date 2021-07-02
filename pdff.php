<?php  
  session_start();   
  define('FPDF_FONTPATH',"libs/font/");
  require('libs/fpdf.php');  
      $pdf=new FPDF();  
      $pdf->AddPage('P');  
      $pdf->AddFont('Arial','','arial.php');  
      $pdf->SetFont('Arial');       
      $pdf->SetFontSize(25);   
      $pdf->MultiCell(0,0,iconv('utf-8', 'windows-1251',"Табель вакцинации"),0,'C');
      $pdf->SetFontSize(10); 
      $pdf->MultiCell(0,10,iconv('utf-8', 'windows-1251',"Пациент"));
      $pdf->MultiCell(0,10,iconv('utf-8', 'windows-1251',"{$_SESSION['surname']} {$_SESSION['name']} {$_SESSION['secondname']}"));
      $pdf->MultiCell(0,15,iconv('utf-8', 'windows-1251',"Дата рождения: {$_SESSION['birthdate']}"));
      $pdf->MultiCell(0,15,iconv('utf-8', 'windows-1251',"ОМС: {$_SESSION['oms']}"));
      $pdf->MultiCell(0,15,iconv('utf-8', 'windows-1251',"Серия/номер паспорта: {$_SESSION['passport']}"));
      $pdf->MultiCell(0,15,iconv('utf-8', 'windows-1251',"Код подразделения: {$_SESSION['district_code']}"));
      $pdf->MultiCell(0,15,iconv('utf-8', 'windows-1251',"Телефон :{$_SESSION['phone']}"));
      $pdf->MultiCell(0,15,iconv('utf-8', 'windows-1251',"Записан на вакцинацию"));
      $pdf->MultiCell(0,15,iconv('utf-8', 'windows-1251',"Адрес вакцинации: {$_SESSION['adress']}"));
      $pdf->MultiCell(0,15,iconv('utf-8', 'windows-1251',"Дата и время: {$_SESSION['datetime']}"));
      $pdf->Output('iskspb.ru.pdf','I');    
    
?>