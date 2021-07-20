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
    $dv = $row['dv1'];
    $dv2 = $row['dv2'];
   
      if ($dv != '0000-00-00') {//если дата первой вакцинации есть?
        $dv3 = new DateTime($dv);// дата первой вакцинации есть
        $dv3->format("Y-m-d "); //2008-07-16
        $dv3->modify('+3 week');
        if ($dv2 == '0000-00-00') {
          $_SESSION['upl']=2;//а даты второй вакцинации нет
        }
      }else {//даты первой вакцинации нет
        $_SESSION['upl']=1;
      }
    
  }


  // Формируем массив для JSON ответа
  $result1 = array(
    'name' => $res,
    'date' => $dv,
    'date2' => $dv2,
    'date3' => $dv3->format("Y.m.d ")
  );
  //SELECT A.`time` FROM `times_pattern` A LEFT JOIN( SELECT `time` FROM `list` WHERE `city_name` = 'Ульяновск' AND `place_name` = 'Ленина' AND `date` = '04.01.2021' ) B ON A.`time` = B.`time` WHERE B.`time` IS NULL
  // Переводим массив в JSON
  echo json_encode($result1);
}
