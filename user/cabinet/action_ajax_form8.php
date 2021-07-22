<?php
require_once("../../common/funct.php"); //подключение файла с функцией
if (isset($_POST['place_selector1'])) { //если адрес задан
  $link = dbconnect(); //соединение с бд
  mysqli_set_charset($link, "utf8"); //установка кодовой страницы подключения  
  // вывод свободных времен для записи в заданный день:
  $sql = "SELECT A.`time` FROM `times_pattern` A LEFT JOIN( SELECT `time` FROM `list` WHERE `city_name` = '{$_POST['city_selector1']}' AND `place_name` = '{$_POST['place_selector1']}' AND `date` = '{$_POST['datepickerVak1']}' ) B ON A.`time` = B.`time` WHERE B.`time` IS NULL";
  $result = mysqli_query($link, $sql); //вопроизведение запроса  
  $r = 0; //счетчик массива адресов
  $items = []; //массив адресов вакцинации
  while ($row = mysqli_fetch_array($result)) { //проход по записям   
    $items[$r] = $row['time']; //запись значения времени в массив
    $r += 1; //переход к следующей ячейке
  }
  echo json_encode($items); //возврат данных
}
