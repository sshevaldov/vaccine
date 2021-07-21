<?php
session_start();

if (isset($_POST['city_selector']) && isset($_POST['place_selector']) && isset($_POST['datepickerVak']) && isset($_POST['time_selector']) && isset($_POST['city_selector1']) && isset($_POST['place_selector1']) && isset($_POST['time_selector1'])) {

  $servername = "localhost";
  $uname = "root";
  $pword = "";
  $dbname = "vaccine";

  $link = mysqli_connect($servername, $uname, $pword, $dbname);
  $link->set_charset("utf8");
  $_SESSION['datetime1'] = "{$_POST['datepickerVak']} {$_POST['time_selector']}";
  $_SESSION['adress1'] = "{$_POST['city_selector']}, {$_POST['place_selector']}";
  $_SESSION['datetime2'] = "{$_POST['datepickerVak1']} {$_POST['time_selector1']}";
  $_SESSION['adress2'] = "{$_POST['city_selector1']}, {$_POST['place_selector1']}";
  $sql = "INSERT INTO `list` (`city_name`, `place_name`, `date`, `time`,`username`) VALUES ('{$_POST['city_selector']}', '{$_POST['place_selector']}', '{$_POST['datepickerVak']}', '{$_POST['time_selector']}', '{$_SESSION['fio']}');";
  $result = mysqli_query($link, $sql);
  $sql = "INSERT INTO `list` (`city_name`, `place_name`, `date`, `time`,`username`) VALUES ('{$_POST['city_selector1']}', '{$_POST['place_selector1']}', '{$_POST['datepickerVak1']}', '{$_POST['time_selector1']}', '{$_SESSION['fio']}');";
  $result = mysqli_query($link, $sql);


  $rows = mysqli_num_rows($result);
  $ok1 = 'ok';

  $result1 = array(
    'name' => $rows
  );

  echo json_encode($result1);
}
