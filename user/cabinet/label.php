<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../common/style.css">
    <script src="../../lib/jquery-1.8.3.min.js" type="text/javascript" charset="utf-8"></script>
    <title>Табель записи на вакцинацию</title>

</head>
<div class="CheckBoxNight" style="margin-left: 15px; margin-top:15px">
    <div class="CheckBoxPageModeSub CheckBoxSub">
        <input id="CheckboxPageMode" type="checkbox" onclick="ChangePageMode()">
        <label for="CheckboxPageMode">
            <div class="CheckBoxRing" data-checked="ㅤ" data-unchecked="ㅤ"></div>
            <div class="moresharpened"></div>
        </label>
    </div>
</div>

<body>
    <div class="table" style="width: max-content;">
        <h1>Заявка отправлена</h1>
        <?php
        session_start();
        echo "<h3 style=\"font-weight:bold\">Персональный данные:</h2>";
        echo "{$_SESSION['fio']}";
        echo "<p>Дата рождения: {$_SESSION['birthdate']}";
        echo "<p>Пол: {$_SESSION['sex']}";
        echo "<p>Телефон: {$_SESSION['phone']}";
        echo "<p>ОМС: {$_SESSION['oms']}";
        echo "<p>Серия/номер паспорта: {$_SESSION['passport']}";
        echo "<h3 style=\"font-weight:bold\">Первая вакинация:</h3>";
        echo "<p>Адрес вакцинации: {$_SESSION['adress1']}";
        echo "<p>Дата и время вакцинации: {$_SESSION['datetime1']}";
        echo "<h3 style=\"font-weight:bold\">Вторая вакцинация:</h3>";
        echo "<p>Адрес вакцинации: {$_SESSION['adress2']}";
        echo "<p>Дата и время вакцинации: {$_SESSION['datetime2']}";
        ?>
        <p><a href="order_list.php"><button id="button" class="btn_submit disabled">Скачать</button></a>
        <p><button id="buttonExit" class="btn_submit disabled" type='button' onclick='window.location = "../auth/auth.php"'>Выйти</button>
    </div>
    <script src="../../common/PageMode.js"></script>
</body>

</html>