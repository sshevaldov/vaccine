<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="lib/jquery-1.8.3.min.js" type="text/javascript" charset="utf-8"></script>
    <!-- <script src="ajax.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    <script src="src/jquery.maskedinput.js" type="text/javascript"></script>
    <link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/redmond/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Перечень вакцинаций</title>
    <?php require_once('php/funct.php') ?>

</head>

<body>
    <form method="post" id="CabinetForm1" action="">
        <div class="tableyktyk" style="margin-left: 15px; margin-top:15px">
            <div class="reating-arkows zatujgdsanuk">
                <input id="e" type="checkbox" onclick="SetPageMode()">
                <label for="e">
                    <div class="trianglesusing" data-checked="ㅤ" data-unchecked="ㅤ"></div>
                    <div class="moresharpened"></div>
                </label>
            </div>
        </div>
        <div class="table" style="width: 1200px;" disabled>
            <h1 style=" text-align: right; padding: 10px;">
                <div>
                    <div style="position: absolute; font-size: -webkit-xxx-large;">
                        <p style="margin-top:15px">Составить перечень вакцинаций</p>
                    </div>
                    <?php
                    echo $_SESSION['login']
                    ?>
                    <form action="auth.php">
                        <p><button class="btn_submit disabled">Выйти</button>
                    </form>
                </div>
            </h1>

            <p id="ErrorRegistration" name="ErrorRegistration" style="color: red;"></p>
            <p>Период</p>
            <p><input id="datepicker1" autocomplete="off" name="datepicker1" type="text" class="rfield" tabindex="1" placeholder="С" />
            <p><input id="datepicker2" autocomplete="off" name="datepicker2" type="text" class="rfield" tabindex="1" placeholder="По" />
            <p>Город вакцинации</p>
            <div style="display: flex;">
                <select type="text" class="rfield " id="city_selector" name="city_selector">
                    <option selected value=''>Выберите город</option>
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

            <p>Время вакцинации </p>
            <select type="text" class="rfield " id="time_selector" name="time_selector">
                <option disabled selected hidden value=''>Выберите время</option>
                <?php
                time_loader();
                ?>
            </select>
            <div class="time_list">
            </div>
            <p>Незабывайте о необходимости приходить заранее.</p>
            <div>
                <button id="buttonSubmit1" class="btn_submit disabled" type='button' onclick="get()">Списком</button>

            </div>
            <div>
                <button id="buttonSubmit2" class="btn_submit disabled" type='button' onclick="get1()">Таблицей</button>

            </div>
        </div>
    </form>

    <script>
        function get() {
            AjaxLoadList('CabinetForm1', 'action_ajax_form6.php');
            console.clear();
            console.log(document.getElementById('datepicker1').value);
            console.log(document.getElementById('datepicker2').value);
            console.log(document.getElementById('city_selector').value);
            console.log(document.getElementById('place_selector').value);
            console.log(document.getElementById('time_selector').value);
            console.log(" /");
        }
        function get1() {
            AjaxLoadList1('CabinetForm1', 'action_ajax_form6.php');
            console.clear();
            console.log(document.getElementById('datepicker1').value);
            console.log(document.getElementById('datepicker2').value);
            console.log(document.getElementById('city_selector').value);
            console.log(document.getElementById('place_selector').value);
            console.log(document.getElementById('time_selector').value);
            console.log(" /");
        }

        $(function() {
            $("#datepicker1").datepicker({
                beforeShowDay: function(date) {
                    var dayOfWeek = date.getDay();
                    if (dayOfWeek == 0 || dayOfWeek == 6) {
                        return [false];
                    } else {
                        return [true];
                    }
                }
            });
        });
        $(function() {
            $("#datepicker2").datepicker({
                beforeShowDay: function(date) {
                    var dayOfWeek = date.getDay();
                    if (dayOfWeek == 0 || dayOfWeek == 6) {
                        return [false];
                    } else {
                        return [true];
                    }
                }
            });
        });


        $("#datepicker1").change(
            function() {
                min = document.getElementById('datepicker1').value;

                $("#datepicker2").datepicker("option", "minDate", min);
            }
        );
        $("#datepicker2").change(
            function() {
                var max = document.getElementById('datepicker2').value;
                $("#datepicker1").datepicker("option", "maxDate", max);
            }
        );

        $.datepicker.regional['ru'] = {
            closeText: 'Закрыть',
            prevText: 'Предыдущий',
            nextText: 'Следующий',
            dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
            dateFormat: 'yy.mm.dd',
            monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
            firstDay: 1,
            changeMonth: true,
            changeYear: true,
            maxDate: 0,
            yearRange: '2021:2021'
        };
        $.datepicker.setDefaults($.datepicker.regional['ru']);

        function AjaxLoadList(ajax_form, url) {
            $.ajax({
                url: url, //url страницы (action_ajax_form1.php)
                type: "POST", //метод отправки
                dataType: "html", //формат данных
                data: $("#" + ajax_form).serialize(), // Сеарилизуем объект
                success: function(response) { //Данные отправлены успешно
                    window.location = "test.php";
                }
            });
        }
        function AjaxLoadList1(ajax_form, url) {
            $.ajax({
                url: url, //url страницы (action_ajax_form1.php)
                type: "POST", //метод отправки
                dataType: "html", //формат данных
                data: $("#" + ajax_form).serialize(), // Сеарилизуем объект
                success: function(response) { //Данные отправлены успешно
                    window.location = "admintopdf.php";
                }
            });
        }

        function AjaxLoadPlaces(ajax_form, url) {
            $.ajax({
                url: url, //url страницы (action_ajax_form1.php)
                type: "POST", //метод отправки
                dataType: "html", //формат данных
                data: $("#" + ajax_form).serialize(), // Сеарилизуем объект
                success: function(response) { //Данные отправлены успешно
                    result = $.parseJSON(response);
                    const select = document.getElementById('place_selector');
                    $(".place_options_class").remove();
                    document.querySelector('.place_list').insertAdjacentElement('afterBegin', select);
                    for (let index in result) {
                        const content = result[index];
                        const option = document.createElement('option');
                        option.classList.add('place_options_class');
                        option.textContent = content;
                        option.value = content;
                        select.appendChild(option);
                    }
                    document.getElementById("place_selector").disabled = false;
                }
            });
        }
        $("#city_selector").change(
            function() {
                AjaxLoadPlaces('CabinetForm1', 'action_ajax_form2.php');
                return false;
            }
        );
    </script>
</body>

</html>