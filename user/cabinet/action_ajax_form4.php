<?php
require_once("../../common/dbfunct.php"); //подключение файла с функцией
if (isset($_POST['city_selector']) && isset($_POST['place_selector']) && isset($_POST['datepickerVak']) && isset($_POST['time_selector']) && isset($_POST['city_selector1']) && isset($_POST['place_selector1']) && isset($_POST['time_selector1'])) { //если все поля введены
  $link = dbconnect(); //соединение с бд
  mysqli_set_charset($link, "utf8"); //установка кодовой страницы подключения
  $_SESSION['datetime1'] = "{$_POST['datepickerVak']} {$_POST['time_selector']}";
  $_SESSION['adress1'] = "{$_POST['city_selector']}, {$_POST['place_selector']}";
  $_SESSION['datetime2'] = "{$_POST['datepickerVak1']} {$_POST['time_selector1']}";
  $_SESSION['adress2'] = "{$_POST['city_selector1']}, {$_POST['place_selector1']}";
  //запись данных о первой вакцинации:
  $sql = "INSERT INTO `list` (`city_name`, `place_name`, `date`, `time`,`username`,`passport`) VALUES ('{$_POST['city_selector']}', '{$_POST['place_selector']}', '{$_POST['datepickerVak']}', '{$_POST['time_selector']}', '{$_SESSION['fio']}','{$_SESSION['passport']}');";
  $result = mysqli_query($link, $sql); //воспроизведение запроса
  //запись данных о второй вакцинации:
  $sql = "INSERT INTO `list` (`city_name`, `place_name`, `date`, `time`,`username`,`passport`) VALUES ('{$_POST['city_selector1']}', '{$_POST['place_selector1']}', '{$_POST['datepickerVak1']}', '{$_POST['time_selector1']}', '{$_SESSION['fio']}','{$_SESSION['passport']}');";
  $result = mysqli_query($link, $sql); //воспроизведение запроса
  //занесение дат вакцинаций в личную запись пользователя:
  $sql = "UPDATE `users` SET `dv1`='{$_POST['datepickerVak']}',`dv2`='{$_POST['datepickerVak1']}' WHERE `passport`='{$_SESSION['passport']}'";
  $result = mysqli_query($link, $sql); //воспроизведение запроса
}
