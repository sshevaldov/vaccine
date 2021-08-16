<?php
session_start(); // запуск сессии для использования переменных сессии в функциях

// функция установки соединения с бд
function dbconnect()
{
    $servername = "localhost"; //имя сервера
    $username = "root"; //имя подключаемого пользователя
    $password = ""; //пароль бд
    $dbname = "vaccine"; //имя бд
    return mysqli_connect($servername, $username, $password, $dbname);
}

// функция загрузки списка городов из бд
function city_loader()
{
    $link = dbconnect(); // функция установки соединения с бд
    mysqli_set_charset($link, "utf8"); // установка кодовой страницы подключения
    $sql = "SELECT `city_name` FROM `cities`"; // запрос на выгрузку списка городов
    $result = mysqli_query($link, $sql); // воспроизведение запроса   
    while ($row = mysqli_fetch_array($result)) { // проход по списку городов
        echo '<option>' . $row['city_name'] . '</option>'; // загрузка имен в селектор
    }
}
