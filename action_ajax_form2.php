<?php
//вызывается из ajax.js из cabinet.php
//используется для подгрузки адресов по выбранному городу
if (isset($_POST['city_selector'])) {
  $servername = "localhost";
  $uname = "root";
  $pword = "";
  $dbname = "vaccine";
  $link = mysqli_connect($servername, $uname, $pword, $dbname);
  $link->set_charset("utf8");
  $city_selector = $_POST['city_selector'];
  $sql = "SELECT * FROM `places` where `city_name`= '{$city_selector}'";
  $result = mysqli_query($link, $sql);
  $rows = mysqli_num_rows($result);
  $r = 0;
  $items = [];
  
  while ($row = mysqli_fetch_array($result)) {
    $items[$r] = "{$row['place_name']}, {$row['address']}";
    $r = $r + 1;
  }
  // Формируем массив для JSON ответа
  $result = array(
    'name' => $rows
  );
  //SELECT * FROM `times_pattern` A LEFT JOIN( SELECT `time` FROM `list` WHERE `city_name` = 'Ульяновск' AND `place_name` = 'Ленина' AND `date` = '04.01.2021' ) B ON A.`time` = B.`time` WHERE B.`time` IS NULL
  // Переводим массив в JSON
  echo json_encode($items);
}
