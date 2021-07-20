<?php
session_start();

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
  
  if ($_SESSION['upl'] == 1) {
    $sql = "UPDATE `users` SET `dv1`='{$_POST['datepickerVak']}' WHERE `passport`='{$_SESSION['passport']}'";
    $result = mysqli_query($link, $sql);
  } else {
    $sql = "UPDATE `users` SET `dv2`='{$_POST['datepickerVak']}' WHERE `passport`='{$_SESSION['passport']}'";
    $result = mysqli_query($link, $sql);
  }
  $rows = mysqli_num_rows($result);
  $ok1 = 'ok';

  $result1 = array(
    'name' => $rows
  );

  echo json_encode($result1);
}
