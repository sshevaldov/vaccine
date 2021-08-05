<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="../../lib/jquery-1.8.3.min.js" type="text/javascript" charset="utf-8"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    <script src="../../src/jquery.maskedinput.js" type="text/javascript"></script>
    <link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/redmond/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="../../common/style.css">
    <title>Личный кабинет</title>
    <?php require_once('../../common/funct.php') ?>
    <?php require_once('showuser.php') ?>

</head>

<body>
    <form method="post" id="CabinetForm" action="">
        <div class="tableyktyk" style="margin-left: 15px; margin-top:15px">
            <div class="reating-arkows zatujgdsanuk">
                <input id="CheckboxPageMode" type="checkbox" onclick="ChangePageMode()">
                <label for="CheckboxPageMode">
                    <div class="trianglesusing" data-checked="ㅤ" data-unchecked="ㅤ"></div>
                    <div class="moresharpened"></div>
                </label>
            </div>
        </div>
        <div class="table" style="width: 1200px;" disabled>
            <h1 style=" text-align: right; padding: 10px;">
                <div>
                    <div style="position: absolute; font-size: -webkit-xxx-large;">
                        <p style="margin-top:5px">Сервис записи на вакцинацию</p>
                    </div>
                    <?php
                    showuser();
                    ?>
                    <p><button id="buttonExit" class="btn_submit disabled" type='button' onclick='window.location = "../auth/auth.php"'>Выйти</button>
                </div>
            </h1>
            <p id="ErrorVaccinated" name="ErrorVaccinated" style="color: red;"></p>
            <button id="buttonToList" class="btn_submit disabled" type='button' onclick="get()" hidden>Загрузить отчет</button></b>
            <h3 style=" border-bottom: 1px solid black;">Первая вакцинация</h3>
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
                <option selected hidden id="place_option" name="place_option" value=''> Выберите место вакцинации</option>
            </select>
            <div class="place_list"></div>
            <div style="display: flex;">
                <div>
                    <p>Дата вакцинации</p>
                    <p><input id="datepickerVak" autocomplete="off" name="datepickerVak" type="text" class="rfield" tabindex="1" placeholder="Дата первой вакцинации" required />
                </div>
                <div style="margin-left: 15px;">
                    <p>Время вакцинации </p>
                    <select type="text" class="rfield " id="time_selector" name="time_selector" required disabled>
                        <option selected hidden value=''>Время вакцинации</option>
                    </select>
                </div>
            </div>
            <div class="time_list">
            </div>
            <h3 style=" border-bottom: 1px solid black;">Вторая вакцинация</h3>
            <p>Город вакцинации</p>
            <div style="display: flex;">
                <select type="text" class="rfield " id="city_selector1" name="city_selector1" required>
                    <option disabled selected hidden value=''>Выберите город</option>
                    <?php
                    city_loader();
                    ?>
                </select>
            </div>
            <p>Место вакцинации</p>
            <select type="text" class="rfield " id="place_selector1" name="place_selector1" required disabled>
                <option selected hidden id="place_option1" name="place_option1" value=''> Выберите место вакцинации</option>
            </select>
            <div class="place_list1"></div>
            <div style="display: flex;">
                <div>
                    <p>Дата вакцинации</p>
                    <input id="datepickerVak1" name="datepickerVak1" class="datepickerVak1" type="text" readonly require placeholder="Дата второй вакцинации">
                </div>
                <div style="margin-left: 15px;">
                    <p>Время вакцинации </p>
                    <select type="text" class="rfield " id="time_selector1" name="time_selector1" required disabled>
                        <option selected hidden id="time_options_class1" name="time_options_class1" value=''>Время вакцинации</option>
                    </select>
                </div>
            </div>
            <div class="time_list1">
            </div>
            <p>Незабывайте о необходимости приходить заранее.</p>
            <div>
                <button id="buttonSubmit" class="btn_submit disabled">Записаться</button>
            </div>
        </div>
    </form>
    <script src="cab_script.js"></script>
    <script src="datepicker.js"></script>
    <script src="../../common/RedError.js"></script>
    <script src="../../common/PageMode.js"></script>
    <script src="../../common/mask.js"></script>
</body>

</html>