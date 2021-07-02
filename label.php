<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>
 
<div class="table" style="width: max-content;"><h1>Табель записи на вакцинацию</h1>
<?php
session_start();
echo "<h2 style=\"font-weight:bold\">Пациент:</h2>";
echo "<ins>{$_SESSION['fio']} </ins>";
echo "<p>Дата рождения: <ins> {$_SESSION['birthdate']}";  
echo "<p>ОМС: <ins>{$_SESSION['oms']}";  
echo "<p>Серия/номер паспорта: <ins>{$_SESSION['passport']} <p>Код подразделения: <ins>{$_SESSION['district_code']}";
echo "<p>Телефон: <ins>{$_SESSION['phone']}";
echo "<h2 style=\"font-weight:bold\">Записан на вакцинацию:</h2>";
echo "<p>Адрес вакцинации: {$_SESSION['adress']}";
echo "<p>Дата и время вакцинации: {$_SESSION['datetime']}";
?>  
  <p><a href="topdf.php"><button id="button" class="btn_submit disabled">Скачать</button></a>
</div>

</body>
</html>