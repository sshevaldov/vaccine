<?php
session_start();
//вызывается из ajax.js из cabinet.php
//используется для сохранения данных о заявке
if (true) {


  $_SESSION['dp1'] = $_POST['datepicker1'];
  $_SESSION['dp2'] = $_POST['datepicker2'];
  $_SESSION['city_sel'] = $_POST['city_selector'];
  $_SESSION['pl_sel'] = $_POST['place_selector'];
  $_SESSION['t_sel'] = $_POST['time_selector'];


  $res = $_POST['datepicker1'];
  // Формируем массив для JSON ответа
  $result1 = array(
    'name' =>  $res
  );
  //SELECT A.`time` FROM `times_pattern` A LEFT JOIN( SELECT `time` FROM `list` WHERE `city_name` = 'Ульяновск' AND `place_name` = 'Ленина' AND `date` = '04.01.2021' ) B ON A.`time` = B.`time` WHERE B.`time` IS NULL
  // Переводим массив в JSON
  echo json_encode($result1);
}
