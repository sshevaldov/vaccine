<?php
// функция отображения пользователя по введенному номеру паспорта
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
    }

    echo ("{$_SESSION['fio']}");
}