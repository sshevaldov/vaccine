<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="lib/jquery-1.8.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="ajax2.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    <script src="src/jquery.maskedinput.js" type="text/javascript"></script>
    <link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/redmond/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Личный кабинет</title>
    <?php require_once('php/funct.php') ?>
    <script type="text/javascript">
    </script>
</head>

<body>
    <form method="post" id="CabinetForm" action="">
        <div class="reating-arkows zatujgdsanuk">
            <input id="e" type="checkbox" onclick="Page()">
            <label for="e">
                <div class="trianglesusing" data-checked="Yes" data-unchecked="No"></div>
                <div class="moresharpened"></div>
            </label>
        </div>
        <div class="table" style="width: 1200px;">
            <h1 style=" text-align: right; padding: 10px;">
                <div>
                    <div style="position: absolute; font-size: -webkit-xxx-large;">
                        <p style="margin-top:15px">Сервис записи на вакцинацию</p>
                    </div>
                    <?php
                    showuser();
                    ?>
                    <form action="auth.php">
                        <p><button class="btn_submit disabled">Выйти</button>
                    </form>
                </div>
            </h1>
            <p>Город вакцинации</p>
            <div style="display: flex;">
                <select type="text" class="rfield " id="city_selector" name="city_selector" required>
                    <option disabled selected hidden value=''>Выберите город</option>
                    <?php
                    city_loader();
                    ?>
                </select>
            </div>
            <p>Место вакцинации</p>
            <select type="text" class="rfield " id="place_selector" name="place_selector" required disabled>
                <option disabled selected hidden id="place_option" name="place_option" value=''> Выберите место вакцинации</option>
            </select>
            <div class="weather">
                <div class="weather__feature"></div>
                <div class="weather__deg"></div>
            </div>
            <p>Дата вакцинации</p>
            <p><input id="datepicker" autocomplete="off" name="datepicker" type="text" class="rfield" tabindex="1" placeholder="Дата вакцинации" required disabled />
            <p>Время вакцинации </p>
            <select type="text" class="rfield " id="time_selector" name="time_selector" required disabled>
                <option disabled selected hidden value=''>Время вакцинации</option>
            </select>
            <div class="temp">
                <div class="temp__feature1"></div>
                <div class="temp__deg1"></div>
            </div>
            <p>Незабывайте о необходимости приходить заранее.</p>
            <div>
                <button id="buttonSubmit" class="btn_submit disabled">Записаться</button>
            </div>
        </div>
    </form>
    <script src="cab_script.js"></script>
</body>

</html>