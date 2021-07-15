<?php
session_start();
//вызывается из ajax.js из cabinet.php
//используется для сохранения данных о заявке
if (true) {
  $servername = "localhost";
  $uname = "root";
  $pword = "";
  $dbname = "vaccine";
  $link = mysqli_connect($servername, $uname, $pword, $dbname);  
  mysqli_set_charset($link, "utf8");
  $result = mysqli_query($link, "SELECT * FROM `users` where `passport`='{$_SESSION['passport']}'");
  mysqli_set_charset($link, "utf8");
  $res = '';
  while ($row = mysqli_fetch_array($result)) {
    $res = $row['status'];
  }


  // Формируем массив для JSON ответа
  $result1 = array(
    'name' => $res
  );
  //SELECT A.`time` FROM `times_pattern` A LEFT JOIN( SELECT `time` FROM `list` WHERE `city_name` = 'Ульяновск' AND `place_name` = 'Ленина' AND `date` = '04.01.2021' ) B ON A.`time` = B.`time` WHERE B.`time` IS NULL
  // Переводим массив в JSON
  echo json_encode($result1);
}
