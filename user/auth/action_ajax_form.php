<?php
session_start();

if (isset($_POST["passport"]) && isset($_POST["password"])) {
    $servername = "localhost";
    $uname = "root";
    $pword = "";
    $dbname = "vaccine";
    $psw = 0;
    $link = mysqli_connect($servername, $uname, $pword, $dbname);
    $sql = "SELECT * FROM `accounts` where `passport`='{$_POST["passport"]}'";
    $result = mysqli_query($link, $sql);
    $rows = mysqli_num_rows($result);
    if ($rows != 0) 
    {
        while ($row = mysqli_fetch_array($result)) {
            if ((password_verify($_POST["password"], $row['password']))) {
                $psw = 1;
                $_SESSION['passport'] = $_POST["passport"];
            }
        }
    }
   
    $result = array(
        'name' => $rows,
        'psw' => $psw
    );

  
    echo json_encode($result);
}
