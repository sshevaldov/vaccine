<?php
require_once("../../common/funct.php"); //подключение файла с функцией
if (isset($_POST['city_selector1'])) { //если установлен город
  $link = dbconnect(); //соединение с бд
  mysqli_set_charset($link, "utf8"); //установка кодовой страницы подключения
  $city_selector = $_POST['city_selector1']; //заданный город второй вакцинации
  $sql = "SELECT * FROM `places` where `city_name`= '{$city_selector}'"; //вывод адресов по заданному городу
  $result = mysqli_query($link, $sql); //вопроизведение запроса
  $r = 0; //счетчик элементов массива адресов
  $items = []; //массив адресов  
  while ($row = mysqli_fetch_array($result)) { //проход по полученным записям
    $items[$r] = "{$row['place_name']}, {$row['address']}"; //место вакцинации место+адрес
    $r += 1; //переход к следующей ячейке
  }
  echo json_encode($items); //возврат массива 
}
