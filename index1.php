<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Article FRUCTCODE.COM. How to send html-form with Ajax.</title>
  <meta name="description" content="Article FRUCTCODE.COM. How to send ajax form.">
  <meta name="author" content="fructcode.com">

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="ajax.js"></script>
<script src="lib/jquery-1.8.3.min.js" type="text/javascript" charset="utf-8"></script>
  <script src="src/jquery.maskedinput.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
  
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
    <form method="post">
      <input id="passport" name="passport" type="text" value="" class="mask-pasport-number form-control rfield"
        placeholder="Серия, номер паспорта" required>
      <input id="password" type="password" class="rfield" name="password" value="" placeholder="Пароль" required>

      <button type="submit" id="button" class="btn_submit disabled" onclick=sendAjaxForm('result_form', 'ajax_form', 'action_ajax_form.php');>Войти</button>
      
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
            sendAjaxForm('result_form', 'ajax_form', 'action_ajax_form.php');
          } else {
            $(this).addClass('empty_field');
           
          }
        });
      });
    });
    function sendAjaxForm(result_form, ajax_form, url) {
    $.ajax({
        url:     url, //url страницы (action_ajax_form.php)
        type:     "POST", //метод отправки
        dataType: "html", //формат данных
        data: $("#"+ajax_form).serialize(),  // Сеарилизуем объект
        success: function(response) { //Данные отправлены успешно
        	result = $.parseJSON(response);
			if(result.name==0)
			{$("#excp").show();  }
			else {$("#excp").hide(); }
        	$('#result_form').html('Имя: '+result.name+'<br>Телефон: '+result.phonenumber);
			  
    	},
    	error: function(response) { // Данные не отправлены
            $('#excp').html('Ошибка. Данные не отправлены.');
    	}
 	});
}
  </script>
  
  

</body>
</html>