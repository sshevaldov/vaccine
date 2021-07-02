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
  <?php session_start();?>
<div class="table" style="width: max-content;"><h1>Табель записи на вакцинацию</h1>
<?php
echo "<h2 style=\"font-weight:bold\">Пациент:</h2>";
echo "<ins>{$_SESSION['surname']}  {$_SESSION['name']} {$_SESSION['secondname']} </ins>";



$servername = "localhost";
$uname = "root";
$pword = "";
$dbname = "vaccine";                  
$link = mysqli_connect($servername, $uname, $pword, $dbname);
mysqli_set_charset($link, "utf8");
$sql = "SELECT * FROM `cities`";
$result=mysqli_query($link,"SELECT * FROM `users` where `passport`='7320 365666'");

mysqli_set_charset($link, "utf8");

while($row = mysqli_fetch_array($result))
{
  echo "<p>Дата рождения: <ins> {$row['birthdate']}";
  $_SESSION['birthdate']=$row['birthdate'];
  echo "<p>ОМС: <ins>{$row['oms']}";
  $_SESSION['oms']=$row['oms'];
  echo "<p>Серия/номер паспорта: <ins>{$row['passport']} <p>Код подразделения: <ins>{$row['district_code']}";
  $_SESSION['district_code']=$row['district_code'];
  echo "<p>Телефон: <ins>{$row['phone']}";
  $_SESSION['phone']=$row['phone'];
}
echo "<h2 style=\"font-weight:bold\">Записан на вакцинацию:</h2>";
echo "<p>Адрес вакцинации: г. {$_SESSION['city']}, {$_SESSION['place']}";
echo "<p>Дата и время вакцинации: {$_SESSION['date']} {$_SESSION['time']}";
$_SESSION['adress']="г. {$_SESSION['city']}, {$_SESSION['place']}";
$_SESSION['datetime']="{$_SESSION['date']} {$_SESSION['time']}";
?>
  
  <p><a href="pdff.php"><button id="button" class="btn_submit disabled">Скачать</button></a>
</div>

</body>
</html>