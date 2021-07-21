<?php

if (isset($_POST['place_selector'])) {
  $servername = "localhost";
  $uname = "root";
  $pword = "";
  $dbname = "vaccine";
  $link = mysqli_connect($servername, $uname, $pword, $dbname);
  $link->set_charset("utf8");
 
  
 
  $sql = "SELECT A.`time` FROM `times_pattern` A LEFT JOIN( SELECT `time` FROM `list` WHERE `city_name` = '{$_POST['city_selector']}' AND `place_name` = '{$_POST['place_selector']}' AND `date` = '{$_POST['datepickerVak']}' ) B ON A.`time` = B.`time` WHERE B.`time` IS NULL";
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
  
 

  echo json_encode($items);
  
}
