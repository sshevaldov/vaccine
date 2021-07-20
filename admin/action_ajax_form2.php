<?php

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
 
  $result = array(
    'name' => $rows
  );

  echo json_encode($items);
}
