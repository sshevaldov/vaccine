<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="lib/jquery-1.8.3.min.js" type="text/javascript" charset="utf-8"></script>
    <!-- <script src="ajax.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    <script src="src/jquery.maskedinput.js" type="text/javascript"></script>
    <link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/redmond/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="PageMode.js"></script>
    <title>Перечень вакцинаций</title>
    <?php require_once('php/funct.php') ?>

</head>

<body>
    <form method="post" id="AdminCabinetForm" action="">
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
                <div style="position: absolute; font-size: -webkit-xxx-large;">
                    <p style="margin-top:15px">Выгрузить перечень вакцинаций</p>
                </div>
                <?php
                echo $_SESSION['login']
                ?>
                <p><button id="buttonExit" class="btn_submit disabled" type='button' onclick="exit()">Выйти</button>
            </h1>

            <p>Период</p>
            <p><input id="datepicker_startDate" autocomplete="off" name="datepicker_startDate" type="text" class="rfield" tabindex="1" placeholder="С" />
            <p><input id="datepicker_endDate" autocomplete="off" name="datepicker_endDate" type="text" class="rfield" tabindex="1" placeholder="По" />
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


            <br>
            <div class="buttons">
                <button id="buttonToList" class="btn_submit disabled" type='button' onclick="get()">Списком</button></b>
                <button id="buttonToGrid" class="btn_submit disabled" type='button' onclick="get1()">Таблицей</button>

            </div>
        </div>
    </form>

    <script>
        function exit() {
            window.location = "admin_auth.php"
        }

        function get() {
            AjaxLoadList('AdminCabinetForm', 'action_ajax_form6.php');           
            window.location = "order_list.php";
        }

        function get1() {
            AjaxLoadList('AdminCabinetForm', 'action_ajax_form6.php');           
            window.location = "admin_topdf.php";
        }

        $(function() {
            $("#datepicker_startDate").datepicker({
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
            $("#datepicker_endDate").datepicker({
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
        $("#datepicker_startDate").change(
            function() {
                min = document.getElementById('datepicker_startDate').value;

                $("#datepicker_endDate").datepicker("option", "minDate", min);
            }
        );
        $("#datepicker_endDate").change(
            function() {
                var max = document.getElementById('datepicker_endDate').value;
                $("#datepicker_startDate").datepicker("option", "maxDate", max);
            }
        );
       

        function AjaxLoadList(ajax_form, url) {
            $.ajax({
                url: url, //url страницы (action_ajax_form1.php)
                type: "POST", //метод отправки
                dataType: "html", //формат данных
                data: $("#" + ajax_form).serialize(), // Сеарилизуем объект
                success: function(response) { //Данные отправлены успешно

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
                AjaxLoadPlaces('AdminCabinetForm', 'action_ajax_form2.php');
                return false;
            }
        );
        
        $(function() {
            $.mask.definitions['~'] = '[]';
            $("#datepicker_startDate").datepicker().mask("~~.~~.~~", {
                placeholder: "гг.мм.дд"
            });
        });
        $(function() {
            $.mask.definitions['~'] = '[]';
            $("#datepicker_endDate").datepicker().mask("~~.~~.~~", {
                placeholder: "гг.мм.дд"
            });
        });
    </script>
     <script src="DatepickerAdminCabinet.js"></script>
     <script src="Masks.js"></script>
</body>
</html>