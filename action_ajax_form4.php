<?php
//вызывается из ajax.js из cabinet.php
//используется для сохранения данных о заявке
if (isset($_POST['city_selector']) && isset($_POST['place_selector']) && isset($_POST['datepicker']) && isset($_POST['time'])) {

  $servername = "localhost";
  $uname = "root";
  $pword = "";
  $dbname = "vaccine";

  $link = mysqli_connect($servername, $uname, $pword, $dbname);
  $link->set_charset("utf8");

  $sql = "INSERT INTO `list` (`city_name`, `place_name`, `date`, `time`) VALUES ('{$_POST['city_selector']}', '{$_POST['place_selector']}', '{$_POST['datepicker']}', '{$_POST['time_selector']}');";
  $result = mysqli_query($link, $sql);
  $ok = 'ok';
  // Формируем массив для JSON ответа
  $result = array(
    'name' => $ok
  );
  //SELECT A.`time` FROM `times_pattern` A LEFT JOIN( SELECT `time` FROM `list` WHERE `city_name` = 'Ульяновск' AND `place_name` = 'Ленина' AND `date` = '04.01.2021' ) B ON A.`time` = B.`time` WHERE B.`time` IS NULL
  // Переводим массив в JSON
  echo json_encode($result);
}
