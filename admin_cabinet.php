<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="../lib/jquery-1.8.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src=".../commonShowHidePassword.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    <script src="../src/jquery.maskedinput.js" type="text/javascript"></script>
    <link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/redmond/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="../common/style.css">
    <title>Личный кабинет</title>
    <?php require_once('../common/funct.php') ?>

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
                        <p style="margin-top:15px">Сервис записи на вакцинацию</p>
                    </div>
                    <?php
                    echo $_SESSION['login']
                    ?>
                    <form action="admin_auth.php">
                        <p><button class="btn_submit disabled">Выйти</button>
                    </form>
                </div>
            </h1>

                
            <p> <a href="create_list.php">Перечень вакцинаций</a>
            <p> <a href="admin_auth.php">Создать аккаунт администратора</a>
            <p> <a href="admin_auth.php">Удалить пользователя</a>

            <p> <a href="admin_auth.php">Добавить место вакцинации</a>

        </div>
    </form>
    <script src="cab_script.js"></script>
</body>

</html>