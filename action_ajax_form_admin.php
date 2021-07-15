<?php
session_start();
//используется в ajax.js, вызванном из auth.php
//проверка введенного логина и пароля
if (isset($_POST["login"]) && isset($_POST["password"])) {
    $servername = "localhost";
    $uname = "root";
    $pword = "";
    $dbname = "vaccine";
    $psw = 0;
    $rows = 0;
    $link = mysqli_connect($servername, $uname, $pword, $dbname);
    $sql = "SELECT * FROM `admins` where `login`='{$_POST["login"]}'";
    $result = mysqli_query($link, $sql);
    $rows = mysqli_num_rows($result);
    if ($rows != 0) //если есть строки с подходящим логином
    {
        while ($row = mysqli_fetch_array($result)) {
            if ((password_verify($_POST["password"], $row['password']))) {
                $psw = 1;
                $_SESSION['login'] = $_POST["login"];
            }
        }
    }
    // Формируем массив для JSON ответа
    $result = array(
        'name' => $rows,
        'psw' => $psw
    );

    // Переводим массив в JSON
    echo json_encode($result);
}
