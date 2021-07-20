<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="ShowHidePassword.js"></script>

  <script src="src/jquery.maskedinput.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Добро пожаловать!</title>
</head>

<body>
  <form method="post" id="АuthorizationForm" action="">
    <div class="tableyktyk" style="margin-left: 15px; margin-top:15px">
      <div class="reating-arkows zatujgdsanuk">
        <input id="CheckboxPageMode" type="checkbox" onclick="ChangePageMode()">
        <label for="CheckboxPageMode">
          <div class="trianglesusing" data-checked="ㅤ" data-unchecked="ㅤ"></div>
          <div class="moresharpened"></div>
        </label>
      </div>
    </div>
    <div class="table">
      <h1>Войти в личный кабинет</h1>
      <p id="LoginErrorMessage" name="LoginErrorMessage" style="color: red;"></p>
      <input id="passport" name="passport" type="text" value="" class="mask-pasport-number form-control rfield" placeholder="Серия, номер паспорта" required>
      <div class="password">
        <input id="password" name="password" type="password" value="" class="rfield" placeholder="Пароль" required>
        <a href="#" class="password-control" onclick="return show_hide_password(this);"></a>
      </div>
      <button type="submit" id="buttonToCabinet" class="btn_submit disabled">Войти</button>
    </div>
    <div class="table-help">
      <a href="registration.php">Регистрация</a>
    </div>
    <div class="table-help">
      <a href="admin_auth.php">Административный интерфейс</a>
    </div>
  </form>
  <script src="PageMode.js"></script>
  <script src="Mask.js"></script>
  <script src="auth.js"></script>

</body>


</html>