<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="../../lib/jquery-1.8.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    <script src="../../src/jquery.maskedinput.js" type="text/javascript"></script>
    <link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/redmond/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="../../common/style.css">
    <script src="../../common/PageMode.js"></script>
    <title>Перечень вакцинаций</title>
    <?php require_once('../../common/funct.php') ?>
</head>

<body>
    <form method="post" id="AdminCabinetForm" action="">
        <div class="CheckBoxNight">
            <div class="CheckBoxPageModeSub CheckBoxSub">
                <input id="CheckboxPageMode" type="checkbox" onclick="ChangePageMode()">
                <label for="CheckboxPageMode">
                    <div class="CheckBoxRing" data-checked="ㅤ" data-unchecked="ㅤ"></div>
                    <div class="moresharpened"></div>
                </label>
            </div>
        </div>
        <div class="table" style="width: 1200px;" disabled>
            <h1 style=" text-align: right; padding: 10px;">
                <div style="position: absolute; font-size: -webkit-xxx-large;">
                    <p style="margin-top:15px">Выгрузить перечень вакцинаций</p>
                </div>
                <?php
                echo $_SESSION['login']
                ?>
                <p><button id="buttonExit" class="btn_submit disabled" type='button' onclick='window.location = "../admin_auth/admin_auth.php"'>Выйти</button>
            </h1>
            <p> Период </p> <select type="text" class="rfield " id="period_selector" name="period_selector" required>
                <option id="place_option" name="place_option" value='today'> Сегодня</option>
                <option id="place_option" name="place_option" value='tom'> Завтра</option>
                <option id="place_option" name="place_option" value='pper'> Период дат</option>

            </select>
            <p></p>
            <div id="per_date" style="display: none;" >
                <input id="datepicker_startDate" autocomplete="off" name="datepicker_startDate" type="text" class="rfield" value= tabindex="1" placeholder="С" />
                <p> по </p> <input id="datepicker_endDate" autocomplete="off" name="datepicker_endDate" type="text" class="rfield"  value='' tabindex="1" placeholder="По" hidden />
            </div>
            <p>Город вакцинации</p>
            <div style="display: flex;">
                <select type="text" class="rfield " id="city_selector" name="city_selector">
                    <option selected value=''>По умолчанию</option>
                    <?php
                    city_loader();
                    ?>
                </select>
            </div>
            <p>Место вакцинации</p>
            <select type="text" class="rfield " id="place_selector" name="place_selector" required disabled>
                <option disabled selected hidden id="place_option" name="place_option" value=''> Выберите место вакцинации</option>
            </select>
            <div class="place_list"></div>
            <p> Сортировка </p> <select type="text" class="rfield " id="sort" name="sort" required>
                <option id="place_option" name="place_option" value=''> По умолчанию</option>
                <option id="place_option" name="place_option" value='city_name'> Город</option>
                <option id="place_option" name="place_option" value='place_name'> Место вакцинации</option>
                <option selected id="place_option" name="place_option" value='date,time'> Дата</option>
                <option id="place_option" name="place_option" value='passport'> Номер паспорта пациента</option>
            </select>

            <br>
            <div class="buttons">
                <button id="buttonToList" class="btn_submit disabled" type='button' onclick="get()">Списком</button></b>
                <button id="buttonToGrid" class="btn_submit disabled" type='button' onclick="get1()">Таблицей</button>
            </div>
        </div>
    </form>
    <script src="cl.js"></script>
    <script src="../../common/exit.js"></script>
    <script src="DatepickerAdminCabinet.js"></script>
    <script src="../../common/mask.js"></script>
</body>

</html>