<?php
session_start();
function dbconnect()
{
    $servername = "localhost";
    $uname = "root";
    $pword = "";
    $dbname = "vaccine";
    return mysqli_connect($servername, $uname, $pword, $dbname);
}
function showuser()
{
    $link = dbconnect();
    mysqli_set_charset($link, "utf8");
    $result = mysqli_query($link, "SELECT * FROM `users` where `passport`='{$_SESSION['passport']}'");
    mysqli_set_charset($link, "utf8");
    while ($row = mysqli_fetch_array($result)) {
        $_SESSION['fio'] = "${row['surname']} ${row['name']} ${row['secondname']}";
        $_SESSION['birthdate'] = $row['birthdate'];
        $_SESSION['oms'] = $row['oms'];
        $_SESSION['district_code'] = $row['district_code'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['status']=$row['status'];
       
    }
   
    echo ("{$_SESSION['fio']}");
}

function city_loader()
{
    $link = dbconnect();
    $link->set_charset("utf8");
    $sql = "SELECT * FROM `cities`";
    $result = mysqli_query($link, $sql);
    $flag = false;
    mysqli_set_charset($link, "utf8");
    while ($row = mysqli_fetch_array($result)) {
        echo '<option>' . $row['city_name'] . '</option>';
    }
}
