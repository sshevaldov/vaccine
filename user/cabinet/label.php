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
<div class="tableyktyk" style="margin-left: 15px; margin-top:15px">
    <div class="reating-arkows zatujgdsanuk">
        <input id="CheckboxPageMode" type="checkbox" onclick="ChangePageMode()">
        <label for="CheckboxPageMode">
            <div class="trianglesusing" data-checked="ㅤ" data-unchecked="ㅤ"></div>
            <div class="moresharpened"></div>
        </label>
    </div>
</div>

<body>

    <div class="table" style="width: max-content;">
        <h1>Заявка отправлена</h1>
        <?php
        session_start();


        echo "<h2 style=\"font-weight:bold\">Пациент:</h2>";
        echo "<ins>{$_SESSION['fio']} </ins>";
        echo "<p>Дата рождения: <ins> {$_SESSION['birthdate']}";
        echo "<p>ОМС: <ins>{$_SESSION['oms']}";
        echo "<p>Серия/номер паспорта: <ins>{$_SESSION['passport']} <p>Код подразделения: <ins>{$_SESSION['district_code']}";
        echo "<p>Телефон: <ins>{$_SESSION['phone']}";
        echo "<h2 style=\"font-weight:bold\">Записан на вакцинацию:</h2>";
        echo "<p>Адрес вакцинации: {$_SESSION['adress1']}";
        echo "<p>Дата и время вакцинации: {$_SESSION['datetime1']}";
        echo "<h2 style=\"font-weight:bold\">вторая на вакцинацию:</h2>";
        echo "<p>Адрес вакцинации: {$_SESSION['adress2']}";
        echo "<p>Дата и время вакцинации: {$_SESSION['datetime2']}";
        ?>
        <p><a href="topdf.php"><button id="button" class="btn_submit disabled">Скачать</button></a>
    </div>
    <script src="../../common/PageMode.js"></script>
</body>

</html>