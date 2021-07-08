<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="ajax.js"></script>
  <script src="src/jquery.maskedinput.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Добро пожаловать!</title>
</head>

<body>
  <form method="post" id="АuthorizationForm" action="">
    <div class="reating-arkows zatujgdsanuk">
      <input id="e" type="checkbox" onclick="Page()">
      <label for="e">
        <div class="trianglesusing" data-checked="Yes" data-unchecked="No"></div>
        <div class="moresharpened"></div>
      </label>
    </div>
    <div class="table">
      <h1>Войти в личный кабинет</h1>
      <p id="LoginErrorMessage" name="LoginErrorMessage" hidden style="color: red;">Пользователь не существует</p>
      <p id="PasswordErrorMessage" name="PasswordErrorMessage" hidden style="color: red;">Неверный пароль</p>
      <p id="ToCabinetMessage" name="ToCabinetMessage" hidden style="color: red;">Переход в личный кабинет</p>
      <input id="passport" name="passport" type="text" value="" class="mask-pasport-number form-control rfield" placeholder="Серия, номер паспорта" required>
      <input id="password" name="password" type="password" value="" class="rfield" placeholder="Пароль" required>
      <button type="submit" id="buttonToCabinet" class="btn_submit disabled">Войти</button>
    </div>
    <div class="table-help">
      <a href="registration.php">Регистрация</a>
    </div>
  </form>
  <script src="auth_script.js"></script>
</body>

</html>