<?php
require_once("../../common/funct.php"); //подключение файла с функцией

class CheckedPatient
{
    public function __construct()
    {
        $this->datepickerVak = $_POST['datepickerVak'];
        $this->time_selector = $_POST['time_selector'];
        $this->city_selector = $_POST['city_selector'];
        $this->place_selector = $_POST['place_selector'];
        $this->datepickerVak1 = $_POST['datepickerVak1'];
        $this->time_selector1 = $_POST['time_selector1'];
        $this->city_selector1 = $_POST['city_selector1'];
        $this->place_selector1 = $_POST['place_selector1'];
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
        $_SESSION['datetime1'] = "{$this->datepickerVak} {$this->time_selector}";
        $_SESSION['adress1'] = "{$this->city_selector}, {$this->place_selector}";
        $_SESSION['datetime2'] = "{$this->datepickerVak1} {$this->time_selector1}";
        $_SESSION['adress2'] = "{$this->city_selector1}, {$this->place_selector1}";
        //запись данных о первой вакцинации:
        $this->InsertDv1();
        $this->InsertDv2();
        //запись данных о второй вакцинации:
        $this->UpdateUser();
        //занесение дат вакцинаций в личную запись пользователя:
        
    }
    public function InsertDv1()
    {
        $link = new Dbconnect();
        $link = $link->dbconnect();
        mysqli_set_charset($link, "utf8"); //установка кодовой страницы подключения
        $sql = "INSERT INTO `list` (`city_name`, `place_name`, `date`, `time`,`username`,`passport`) VALUES
        ('{$this->city_selector}', '{$this->place_selector}', '{$this->datepickerVak}',
        '{$this->time_selector}', '{$_SESSION['fio']}','{$this->passport}');";
        $result = mysqli_query($link, $sql); //воспроизведение запроса
    }
    public function InsertDv2()
    {
        $link = new Dbconnect();
        $link = $link->dbconnect();
        mysqli_set_charset($link, "utf8"); //установка кодовой страницы подключения
        $sql = "INSERT INTO `list` (`city_name`, `place_name`, `date`, `time`,`username`,`passport`) VALUES ('{$this->city_selector1}', '{$this->place_selector1}', '{$this->datepickerVak1}', '{$this->time_selector1}', '{$_SESSION['fio']}','{$this->passport}');";
        $result = mysqli_query($link, $sql); //воспроизведение запроса
    }
    public function UpdateUser()
    {
        $link = new Dbconnect();
        $link = $link->dbconnect();
        mysqli_set_charset($link, "utf8"); //установка кодовой страницы подключения
        $sql = "UPDATE `users` SET `dv1`='{$this->datepickerVak}',`dv2`='{$this->datepickerVak1}' WHERE `passport`='{$this->passport}'";
        $result = mysqli_query($link, $sql); //воспроизведение запроса
    }
}

$user = new CheckedPatient();
