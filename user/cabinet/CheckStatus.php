<?php
require_once("../../common/funct.php"); //подключение файла с функцией

class CheckedPatient
{
    public function __construct()
    {
        $this->passport = $_SESSION['passport'];
        $this->CheckUsers();
    }

    public function CheckUsers()
    {
        // $link = dbconnect(); //соединение с бд
        include("../../f.php");
        $link = new Dbconnect();
        $link = $link->dbconnect();
        mysqli_set_charset($link, "utf8"); //установка кодовой страницы подключения
        $result = $this->SelectStatus();
        while ($row = mysqli_fetch_array($result)) { //проход по записям
            $dv = $row['dv1']; //получена дата первой вакцинации 
        }
        $result1 = array(
            'date' => $dv
        );
        echo json_encode($result1); //отправка данных
    }
    public function SelectStatus()
    {
        $link = new Dbconnect();
        $link = $link->dbconnect();
        $sql = "SELECT `dv1` FROM `users` where `passport`='$this->passport'"; //вывести запись пользователя по паспорту
        $result = mysqli_query($link, $sql); //воспроизведение запроса
        return $result;
    }
}

$user = new CheckedPatient();
