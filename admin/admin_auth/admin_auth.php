<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="../../common/ShowHidePassword.js"></script>
  <script src="../../src/jquery.maskedinput.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="../../common/style.css">
  <title>Административный интерфейс</title>
</head>

<body>
  <form method="post" id="AdminАuthorizationForm" action="">
    <div class="CheckBoxNight">
      <div class="CheckBoxPageModeSub CheckBoxSub">
        <input id="CheckboxPageMode" type="checkbox" onclick="ChangePageMode()">
        <label for="CheckboxPageMode">
          <div class="CheckBoxRing" data-checked="ㅤ" data-unchecked="ㅤ"></div>         
        </label>
      </div>
    </div>
    <div class="table">
      <h1>Войти как администратор</h1>
      <p id="LoginErrorMessage" name="LoginErrorMessage" style="color: red;"></p>
      <input id="login" name="login" type="text" value="" class="rfield" placeholder="Логин" required>
      <div class="password">
        <input id="password" name="password" type="password" value="" class="rfield" placeholder="Пароль" required>
      </div>
      <p> <input type="checkbox" id="passhide" onclick=" show_hide_password(this)">Показать пароль</p>
      <button type="submit" id="buttonToAdminCabinet" class="btn_submit disabled">Войти</button>
    </div>
  </form>
  <div class="table_help">
    <a id="role" href="../../user/auth/auth.php">Пользовательский интерфейс</a>
  </div>
  <script src="../../common/PageMode.js"></script>
  <script src="../../common/RedError.js"></script>
  <script src="admin_auth.js"></script>
</body>

</html>