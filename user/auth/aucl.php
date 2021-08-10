<?php

class Auth
{
    public function __construct()
    {
        $this->login = $_POST["password"];
        $this->password = $_POST["passport"];
    }

    public function CheckAuth()
    {
        //$link = dbconnect(); //подключение к бд
        include("../../f.php");
        $link = new Dbconnect();
        $link = $link->dbconnect();
        // $link = new mysqli("localhost", "root", "", "vaccine");
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
}

$user = new Auth();
