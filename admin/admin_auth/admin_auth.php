<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="../common/ShowHidePassword.js"></script>
  
  <script src="../src/jquery.maskedinput.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="../common/style.css">
  <title>Административный интерфейс</title>
</head>

<body>
  <form method="post" id="АuthorizationForm1" action="">
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
      <h1>Войти как администратор</h1>
      <p id="LoginErrorMessage" name="LoginErrorMessage"  style="color: red;"></p>
      <input id="login" name="login" type="text" value="" class="rfield" placeholder="Логин" required>
      <div class="password">
        <input id="password" name="password" type="password" value="" class="rfield" placeholder="Пароль" required>
        <a href="#" class="password-control" onclick="return show_hide_password(this);"></a>
      </div>

      <button type="submit" id="buttonToAdminCabinet" class="btn_submit disabled">Войти</button>
    </div>      
  </form>
  <div class="table-help">
      <a href="../user/auth.php">Пользовательский интерфейс</a>
    </div>
  <script src="../common/PageMode.js"></script>
  <script src="admin_auth.js"></script>
</body>

</html>