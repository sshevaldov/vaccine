<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <?php session_start();?>
<h2>Табель вакцинации</h2>
<?php
echo "<p>ФИО: {$_SESSION['surname']} {$_SESSION['secondname']} {$_SESSION['name']}";
echo "<p>Город: {$_SESSION['city']}";
echo "<p>Адрес вакцинации: г. {$_SESSION['city']}, {$_SESSION['place']}";
echo "<p>Дата и время: {$_SESSION['date']} {$_SESSION['time']}";

?>
</body>
</html>