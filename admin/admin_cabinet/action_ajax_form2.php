<?php
require_once("../../common/funct.php");
if (isset($_POST['city_selector'])) {
  $link = dbconnect(); //соединение с бд
  mysqli_set_charset($link, "utf8"); //установка кодовой страницы подключения
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
