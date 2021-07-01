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
                    <p style="margin-top:15px">Сервис записи на вакцинацию</p>
                </div>
                <div>
                    <p>
                        <?php
                    session_start();
                    $name=$_SESSION['name'];
                    $servername = "localhost";
        $uname = "root";
        $pword = "";
        $dbname = "vaccine";                  
        $link = mysqli_connect($servername, $uname, $pword, $dbname);
        mysqli_set_charset($link, "utf8");       
        $result=mysqli_query($link,"SELECT * FROM `users` where `passport`='$name'");     
        mysqli_set_charset($link, "utf8");
              
        while($row = mysqli_fetch_array($result))
        {
            echo ("${row['surname']} ${row['name']} ${row['secondname']}");
            $_SESSION['surname']=$row['surname'];
            $_SESSION['name']=$row['name'];
            $_SESSION['secondname']= $row['secondname'];
        } 
                    ?>
                    </p>
                    <form action="first.php">
                        <button class="btn_submit disabled">Выйти</button>
                    </form>
                </div>
            </div>
        </h1>
        <form method="post">
        <p>Город вакцинации</p>
        <div style="display: flex;">
            <script>
                function chplace(selectObject) {
                    var value = selectObject.value;
                    $(document).ready(function () {
                        $("form").submit(function () {
                            var formData = $(this).serialize(); // создаем переменную, которая содержит закодированный набор элементов формы в виде строки
                            $.post("cabinet.php", city: value)
                        });
                    });

                    console.log(value);
                }

            </script>
            <?php

        $servername = "localhost";
        $uname = "root";
        $pword = "";
        $dbname = "vaccine";                  
        $link = mysqli_connect($servername, $uname, $pword, $dbname);
        mysqli_set_charset($link, "utf8");
        $sql = "SELECT * FROM `cities`";
        $result=mysqli_query($link,"SELECT * FROM `cities`");
      $flag=false;
      mysqli_set_charset($link, "utf8");
      ?> <select type="text" class="rfield " id="city" name="city" onchange="chplace(this)" required>

                <?php  
        while($row = mysqli_fetch_array($result))
        {
            echo '<option>'.$row['city_name'].'</option>';
        } 
        ?>
            </select>



        </div>
        <p>Место вакцинации</p>
        <!--https://stackoverflow.com/questions/4579570/jquery-loading-data-from-database-and-inserting-it-to-select-->

        <?php

        $servername = "localhost";
              
        $uname = "root";
        $pword = "";
        $dbname = "vaccine"; 
        
        $link = mysqli_connect($servername, $uname, $pword, $dbname);
        mysqli_set_charset($link, "utf8");
       
        $result=mysqli_query($link,"SELECT * FROM `places`");
      $flag=false;
      mysqli_set_charset($link, "utf8");
      ?> <select type="text" class="rfield" id="place" name="place" required>
            <?php  
        while($row = mysqli_fetch_array($result))
        {

            echo '<option>'.$row['place_name'].'</option>';
        } 
        ?>
        </select>



        <p>Дата вакцинации</p>
        <p><input id="datepicker" name="datepicker" type="text" class="rfield" tabindex="1"
                placeholder="Дата вакцинации" required />
        </p>

        <p>Время вакцинации</p>
        <select type="text" class="rfield" id="time" name="time" required>
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
    </form>
    <?php
if (isset($_POST['city']) and isset($_POST['place']) and isset($_POST['datepicker']) and isset($_POST['time'])){
    $_SESSION['city']=$_POST['city'];
    $_SESSION['place']=$_POST['place'];
    $_SESSION['date']=$_POST['datepicker'];
    $_SESSION['time']=$_POST['time'];
    echo "<script>window.location = \"sel.php\"</script>";
}
?>
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