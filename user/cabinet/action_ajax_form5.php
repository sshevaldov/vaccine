<?php
session_start();

if (true) {
  $servername = "localhost";
  $uname = "root";
  $pword = "";
  $dbname = "vaccine";
  $link = mysqli_connect($servername, $uname, $pword, $dbname);
  mysqli_set_charset($link, "utf8");
  $sql = "SELECT * FROM `users` where `passport`='{$_SESSION['passport']}'";
  $result = mysqli_query($link, $sql);
  mysqli_set_charset($link, "utf8");
  $res = '';

  while ($row = mysqli_fetch_array($result)) {

    $dv = $row['dv1'];
    $dv2 = $row['dv2'];

    if ($dv != '0000-00-00') { //если дата первой вакцинации есть?
      $dv3 = new DateTime($dv); // дата первой вакцинации есть
      $dv3->format("Y-m-d ");
      $dv3->modify('+3 week');
      if ($dv2 == '0000-00-00') {
        $_SESSION['upl'] = 2; //а даты второй вакцинации нет
      }
    } else { //даты первой вакцинации нет
      $_SESSION['upl'] = 1;
    }
  }
  $result1 = array(
    'date' => $dv,
    'date2' => $dv2,
    'date3' => $dv3->format("Y.m.d ")
  );

  echo json_encode($result1);
}
