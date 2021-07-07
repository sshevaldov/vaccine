<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">

  
 

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  
  <script src="ajax.js"></script>
<script src="lib/jquery-1.8.3.min.js" type="text/javascript" charset="utf-8"></script>
  <script src="src/jquery.maskedinput.js" type="text/javascript"></script>
  
  <link rel="stylesheet" type="text/css" href="style.css">
 
  
  
  <title>Добро пожаловать!</title>
</head>

<body>
    <form method="post" id="ajax_form" action="" >
      
    
      
<div class="reating-arkows zatujgdsanuk">
 <input id="e" type="checkbox" onclick="Page()">
 <label for="e">
 <div class="trianglesusing" data-checked="Yes" data-unchecked="No"></div>
 <div class="moresharpened"></div>
 </label>
</div>

    
  <div class="table">
  
    <h1>Войти в личный кабинет</h1>
    <p id="excp" name="excp" hidden style="color: red;">Пользователь не существует</p>
    <p id="excp1" name="excp1" hidden style="color: red;">Неверный пароль</p>
    <p id="excp2" name="excp2" hidden style="color: red;">Переход в личный кабинет</p>
    <form method="post">
      <input id="passport" name="passport" type="text" value="" class="mask-pasport-number form-control rfield"
        placeholder="Серия, номер паспорта" required>
      <input id="password" type="password" class="rfield" name="password" value="" placeholder="Пароль" required>

      <button type="submit" id="button" class="btn_submit disabled" >Войти</button>
      
    </form>
  </div>
  <div class="table-help">
    <a href="registration.php">Регистрация</a>
  </div>
  </form>
  <script>
    $('.mask-pasport-number').mask('9999 999999');
  </script>
  <script type="text/javascript">
    $('document').ready(function () {
      $('#button').on('click', function () {     
        $('.table .rfield').each(function () {
          if ($(this).val() != '') {           
            $(this).removeClass('empty_field');         
          } else {
            $(this).addClass('empty_field');
            $("#excp").hide();
          }
        });
      });
    });
    
  </script>
  
  <div id="result_form"></div> 

</body>
</html>