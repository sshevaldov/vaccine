<?php
require_once("../../common/funct.php"); //подключение файла с функцией

class PlaceLoader
{
    public function __construct()
    {
        $this->city_selector = $_POST['city_selector'];
        $this->CheckUsers();
    }

    public function CheckUsers()
    {
        // $link = dbconnect(); //подключение к бд
        include("../../f.php");
        $link = new Dbconnect();
        $link = $link->dbconnect();
        mysqli_set_charset($link, "utf8"); //установка кодовой страницы подключения

        $result = $this->SelectPlace();
        $r = 0; //счетчик массива адресов
        $items = []; //массив адресов вакцинации
        while ($row = mysqli_fetch_array($result)) { //проход по записям
            $items[$r] = "{$row['place_name']}, {$row['address']}"; //запись название+адрес в ячейку массива
            $r += 1; //переход к следующей незанятой ячейке массива
        }
        echo json_encode($items); //возвращаем массив адресов
    }
    public function SelectPlace()
    {
        $link = new Dbconnect();
        $link = $link->dbconnect();
        mysqli_set_charset($link, "utf8"); //установка кодовой страницы подключения
        $sql = "SELECT * FROM `places` where `city_name`= '{$this->city_selector}'"; //выводим адреса в заданном городе
        $result = mysqli_query($link, $sql); //воспроизведение запроса
        return $result;
    }
}

$user = new PlaceLoader();
