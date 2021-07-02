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
      $pdf->MultiCell(0,10,iconv('utf-8', 'windows-1251',"Шевалдов Станислав Сергеевич"));
      $pdf->MultiCell(0,15,iconv('utf-8', 'windows-1251',"Дата рождения: 19.10.2000"));
      $pdf->MultiCell(0,15,iconv('utf-8', 'windows-1251',"ОМС :5464 5645 6546 5466"));
      $pdf->MultiCell(0,15,iconv('utf-8', 'windows-1251',"Серия/номер паспорта: 7320 365666"));
      $pdf->MultiCell(0,15,iconv('utf-8', 'windows-1251',"Код подразделения: 645-64"));
      $pdf->MultiCell(0,15,iconv('utf-8', 'windows-1251',"Телефон :+7 (111) 111-11-11"));
      $pdf->MultiCell(0,15,iconv('utf-8', 'windows-1251',"Записан на вакцинацию"));
      $pdf->MultiCell(0,15,iconv('utf-8', 'windows-1251',"Адрес вакцинации: г. Ульяновск, ЦГКБ, ул. Оренбургская, 27"));
      $pdf->MultiCell(0,15,iconv('utf-8', 'windows-1251',"Дата и время: 07.07.2021 14:50"));
      $pdf->Output('iskspb.ru.pdf','I');    
    
?>