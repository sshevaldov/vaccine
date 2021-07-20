<?php
session_start();
//вызывается из ajax.js из cabinet.php
//используется для сохранения данных о заявке
if (isset($_POST['city_selector']) && isset($_POST['place_selector']) && isset($_POST['datepickerVak']) && isset($_POST['time_selector'])) {

  $servername = "localhost";
  $uname = "root";
  $pword = "";
  $dbname = "vaccine";

  $link = mysqli_connect($servername, $uname, $pword, $dbname);
  $link->set_charset("utf8");
  $_SESSION['datetime'] = "{$_POST['datepickerVak']} {$_POST['time_selector']}";
  $_SESSION['adress'] = "{$_POST['city_selector']}, {$_POST['place_selector']}";
  $sql = "INSERT INTO `list` (`city_name`, `place_name`, `date`, `time`,`username`) VALUES ('{$_POST['city_selector']}', '{$_POST['place_selector']}', '{$_POST['datepickerVak']}', '{$_POST['time_selector']}', '{$_SESSION['fio']}');";
  $result = mysqli_query($link, $sql);
  $sql = "UPDATE `users` SET `status`='vaccinated' WHERE `passport`='{$_SESSION['passport']}'";
  $result = mysqli_query($link, $sql);
  if ($_SESSION['upl'] == 1) {
    $sql = "UPDATE `users` SET `dv1`='{$_POST['datepickerVak']}' WHERE `passport`='{$_SESSION['passport']}'";
    $result = mysqli_query($link, $sql);
  } else {
    $sql = "UPDATE `users` SET `dv2`='{$_POST['datepickerVak']}' WHERE `passport`='{$_SESSION['passport']}'";
    $result = mysqli_query($link, $sql);
  }
  $rows = mysqli_num_rows($result);
  $ok1 = 'ok';
  // Формируем массив для JSON ответа
  $result1 = array(
    'name' => $rows
  );
  //SELECT A.`time` FROM `times_pattern` A LEFT JOIN( SELECT `time` FROM `list` WHERE `city_name` = 'Ульяновск' AND `place_name` = 'Ленина' AND `date` = '04.01.2021' ) B ON A.`time` = B.`time` WHERE B.`time` IS NULL
  // Переводим массив в JSON
  echo json_encode($result1);
}
