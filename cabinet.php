<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="lib/jquery-1.8.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="src/jquery.maskedinput.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <link type="text/css" rel="stylesheet"
        href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/redmond/jquery-ui.css" />
    <title>Личный кабинет</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <script type="text/javascript">
        $(function () {
            $.mask.definitions['~'] = '[1 2 3]';
            $.mask.definitions['m'] = '[0 1]';
            $.mask.definitions['y'] = '[1 2]';
            $.mask.definitions['d'] = '[0 9]';
            $("#datepicker")
                .mask("~9-m9-yd99", { placeholder: "ДД-ММ-ГГГГ" });
        });
    </script>
    <script>
        /* Локализация datepicker */
        $.datepicker.regional['ru'] = {
            closeText: 'Закрыть',
            prevText: 'Предыдущий',
            nextText: 'Следующий',
            monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
            dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
            dateFormat: 'dd.mm.yy',
            monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
            firstDay: 1,
            changeMonth: true,
            changeYear: true,
            minDate: 0,
            yearRange: '2021:2025'
        };
        $.datepicker.setDefaults($.datepicker.regional['ru']);

        $(function () {
            $("#datepicker").datepicker({
                beforeShowDay: function (date) {
                    var dayOfWeek = date.getDay();
                    if (dayOfWeek == 0 || dayOfWeek == 6) {
                        return [false];
                    } else {
                        return [true];
                    }
                }
            });
        });

    </script>
</head>


<body>
    <div class="table" style="width: auto;">
        <h1 style="    text-align: right;    padding: 10px;">
            <div>
                <div style="
                position: absolute;
                font-size: -webkit-xxx-large;">
                    <p>Сервис записи на вакцинацию</p>
                </div>
                <div>
                    <p>username</p>
                    <form action="first.php">
                        <button class="btn_submit disabled">Выйти</button>
                    </form>
                </div>
            </div>
        </h1>
        <p>Город вакцинации</p>
        <div style="
    display: flex;
">
            <select type="text" class="rfield " id="city">
                <option selected disabled="disabled" hidden value='test'>Выберите город</option>
                <option>Ульяновск</option>
                <option>Москва</option>
            </select>
        </div>
        <p>Место вакцинации</p>
        <!--https://stackoverflow.com/questions/4579570/jquery-loading-data-from-database-and-inserting-it-to-select-->
        <select type="text" class="rfield" id="place">
            <option disabled selected hidden>Выберите место вакцинации</option>
            <option>ЦГКБ, ул. Оренбургская, 27</option>
            <option>ГП №1, ул. Гагарина, 20</option>
            <option>ГП №5, пр. Созидателей, 11</option>
            <option>ГП №2, им. В.А. Егорова пр. 50-летия ВЛКСМ, 8а</option>
            <option>ГП № 175 Филиал № 2, Сиреневый бульвар, 30</option>
            <option>ГП № 8 Филиал № 2, улица 26-ти Бакинских Комиссаров, 10, корпус 5</option>
            <option>ГП № 66, Салтыковская улица, 11б</option>
            <option>Консультативно-диагностический центр № 2 Филиал № 3, Открытое шоссе, 24, корпус 9</option>
        </select>

        <p>Дата вакцинации</p>
        <p><input id="datepicker" type="text" class="rfield" tabindex="1" placeholder="Дата вакцинации" />
        </p>

        <p>Время вакцинации</p>
        <select type="text" class="rfield" id="time">
            <option disabled selected hidden> время</option>
            <option>12:00</option>
            <option>12:10</option>
            <option>12:20</option>
            <option>12:30</option>
            <option>12:40</option>
            <option>12:50</option>
            <option>13:00</option>
            <option>13:10</option>
            <option>13:20</option>
            <option>13:30</option>
            <option>13:40</option>
            <option>13:50</option>
            <option>14:00</option>
            <option>14:10</option>
            <option>14:20</option>
            <option>14:30</option>
            <option>14:40</option>
            <option>14:50</option>
            <option>15:00</option>
        </select>
        <p>Незабывайте о необходимости приходить заранее.</p>
        <div>
            <button type="submit" id="button" class="btn_submit disabled">Записаться</button>
        </div>
    </div>

</body>
<script type="text/javascript">
    $('document').ready(function () {
        $('#button').on('click', function () {
            $('.table .rfield').each(function () {
                if ($(this).val() != '' && $(this).val() != null) {
                    console.log(32);
                    // Если поле не пустое удаляем класс-указание
                    $(this).removeClass('empty_field');
                } else {
                    console.log(33);
                    // Если поле пустое добавляем класс-указание
                    $(this).addClass('empty_field');
                }
            });
        });
    });
</script>

</html>