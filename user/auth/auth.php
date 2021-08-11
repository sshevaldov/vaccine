<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="../../common/ShowHidePassword.js"></script>
  <script src="../../src/jquery.maskedinput.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="../../common/style.css">
  <title>Добро пожаловать!</title>
</head>

<body>
  <form method="post" id="АuthorizationForm" action="">
    <div class=" CheckBoxPageModeSub CheckBoxSub">
      <input id="CheckboxPageMode" type="checkbox" onclick="ChangePageMode()">
      <label for="CheckboxPageMode">
        <div class="CheckBoxRing" data-checked="ㅤ" data-unchecked="ㅤ"></div>
      </label>
    </div>
    <div class="table" >
      <h1>Войти в личный кабинет</h1>
      <p id="LoginErrorMessage" name="LoginErrorMessage" style="color: red;"></p>
      <input id="passport" name="passport" type="text" value="" class="mask-pasport-number form-control rfield" placeholder="Серия, номер паспорта" required>
      <div class="password">
        <input id="password" name="password" type="password" value="" class="rfield" placeholder="Пароль" required>
      </div>
      <p> <input type="checkbox" id="passhide" onclick=" show_hide_password(this)">Показать пароль</p>
      <div>
        <button type="submit" id="buttonToCabinet" class="btn_submit disabled">Войти</button>
      </div>
    </div>
    <div class="table_help">
      <a id="reg" href="../registration/registration.php">Регистрация</a>
    </div>
    <div class="table_help">
      <a id="adm" href="../../admin/admin_auth/admin_auth.php">Административный интерфейс</a>
    </div>
  </form>
  <script src="../../common/PageMode.js"></script>
  <script src="../../common/mask.js"></script>
  <script src="../../common/RedError.js"></script>
  <script src="auth.js"></script>

</body>


</html>