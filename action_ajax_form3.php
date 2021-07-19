<?php
//вызывается из ajax.js из cabinet.php
//используется для подгрузки свободных времен приема
if (isset($_POST['place_selector'])) {
  $servername = "localhost";
  $uname = "root";
  $pword = "";
  $dbname = "vaccine";
  $link = mysqli_connect($servername, $uname, $pword, $dbname);
  $link->set_charset("utf8");
  $city_selector = $_POST['city_selector'];
  $pl = $_POST['place_selector'];
  $dt = $_POST['datepicker'];
  $sql = "SELECT A.`time` FROM `times_pattern` A LEFT JOIN( SELECT `time` FROM `list` WHERE `city_name` = '{$_POST['city_selector']}' AND `place_name` = '{$_POST['place_selector']}' AND `date` = '{$_POST['datepicker']}' ) B ON A.`time` = B.`time` WHERE B.`time` IS NULL";
  $result = mysqli_query($link, $sql);
  $rows = mysqli_num_rows($result);
  $r = 0;
  $items = [];

  while ($row = mysqli_fetch_array($result)) {
    $rr = $row['time'];
    $str = mb_convert_encoding($rr, "windows-1252", "utf-8");
    $items[$r] = $row['time'];
    $r = $r + 1;
  }
  // Формируем массив для JSON ответа
  $result = array(
    'name' => "{$pl}"
  );
  //SELECT A.`time` FROM `times_pattern` A LEFT JOIN( SELECT `time` FROM `list` WHERE `city_name` = 'Ульяновск' AND `place_name` = 'Ленина' AND `date` = '04.01.2021' ) B ON A.`time` = B.`time` WHERE B.`time` IS NULL
  // Переводим массив в JSON
  echo json_encode($items);
}
