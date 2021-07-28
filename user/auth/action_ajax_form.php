<?php
require_once("../../common/funct.php"); //подключаем скрипт с функцией
if (isset($_POST["passport"]) && isset($_POST["password"])) { //если паспорт и логин введены
    $link = dbconnect(); //подключение к бд
    $sql = "SELECT * FROM `accounts` where `passport`='{$_POST["passport"]}'"; //запрос к записям с заданным паспортом
    $responce = mysqli_query($link, $sql); //воспроизведение запроса
    $NumRows = mysqli_num_rows($responce); //количество записей с заданным паспортом
    $IsMatch = false; //флаг совпадения пароля
    if ($NumRows != 0) { //если есть строки с заданным логином
        while ($row = mysqli_fetch_array($responce)) { //проход по полученным записям
            if ((password_verify($_POST["password"], $row['password']))) { //если введеный пароль совпадает
                $IsMatch = true; //установка флага "пароль совпал"
                $_SESSION['passport'] = $_POST["passport"];
            }
        }
    }
    $return = array(
        'NumRows' => $NumRows,
        'IsMatch' => $IsMatch
    );
    echo json_encode($return);
}
