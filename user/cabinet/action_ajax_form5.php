<?php
require_once("../../common/funct.php"); //подключение файла с функцией
// $link = dbconnect(); //соединение с бд
include("../../f.php");
    $link = new Dbconnect();
    $link=$link->dbconnect();
mysqli_set_charset($link, "utf8"); //установка кодовой страницы подключения
$sql = "SELECT * FROM `users` where `passport`='{$_SESSION['passport']}'"; //вывести запись пользователя по паспорту
$result = mysqli_query($link, $sql); //воспроизведение запроса
while ($row = mysqli_fetch_array($result)) { //проход по записям
  $dv = $row['dv1']; //получена дата первой вакцинации 
}
$result1 = array(
  'date' => $dv
);
echo json_encode($result1);//отправка данных
