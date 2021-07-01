<html>

<head>
	<script src="lib/jquery-1.8.3.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="src/jquery.maskedinput.js" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<script>
		/* Локализация datepicker */
		$.datepicker.regional['ru'] = {
			monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
			dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
			dateFormat: 'dd.mm.yy',
			monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
			firstDay: 1,
			changeMonth: true,
			changeYear: true,
			maxDate: 0,
			yearRange: '1900:2021'
		};
		$.datepicker.setDefaults($.datepicker.regional['ru']);


	</script>
	<link type="text/css" rel="stylesheet"
		href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/redmond/jquery-ui.css" />
	<title>Регистрация</title>

	<script type="text/javascript">
		$(function () {
			$.mask.definitions['~'] = '[1 2 3]';
			$.mask.definitions['m'] = '[0 1]';
			$.mask.definitions['y'] = '[1 2]';
			$.mask.definitions['d'] = '[0 9]';
			$("#date")
				.datepicker({ nextText: "", prevText: "", dateFormat: 'dd.mm.yy', changeMonth: true, changeYear: true, maxDate: 0, maxYear: 0, showAnim: "fold", yearRange: '1900:2030', firstDay: 1 })
				.mask("~9.m9.yd99", { placeholder: "ДД.ММ.ГГГГ" });
		});
	</script>
	<script>
		function limitInput(k, obj) {
			obj.value = obj.value.replace(/[^а-яА-ЯёЁ -]/ig, '');
		}
	</script>
	
</head>

<body>
	<section class="container">



		<div class="table">
		<form method="post">
			<h1>Регистрация</h1>
			<p>Личные данные</p>
			<p> <input id="fam" name="fam" type="text" class="rfield" onkeyup="limitInput( 'ru', this );" placeholder="Фамилия"
					style="text-transform: capitalize;" required />
			<p>
				<input id="name" name="name" type="text" class="rfield" onkeyup="limitInput( 'ru', this );" placeholder="Имя"
					style="text-transform: capitalize;" required />
			<p> <input type="text" id="otch" name="otch" onkeyup="limitInput( 'ru', this );" placeholder="Отчество (при наличии)"
					style="text-transform:capitalize;"  />
			</p>

			<p> <input id="date" name="date" type="text" class="rfield" tabindex="1" placeholder="Дата рождения" required />
			</p>
		</div>

		<div class="table">
			<p>Паспорт</p>
			<input id="ser" name="ser" type="text" value="" class="mask-pasport-number form-control rfield"
          placeholder="Серия, номер паспорта" required>      
			<p><input id="code" name="code" type="text" class="mask-pasport-division form-control rfield"
					placeholder="Код подразделения" required></p>


			<script>
				$('.mask-pasport-number').mask('99-99 999999');
				$('.mask-pasport-division').mask('999-999');
			</script>
			<p>Номер полиса ОМС</p>
			<p> <input id="omc"  name="omc" type="text" class="number form-control rfield" placeholder="Номер полиса ОМС" required>
				<script>
					$('.number').mask("9999 9999 9999 9999", { placeholder: "**** **** **** ****" })
				</script>
			</p>
			</p>
		</div>

		<div class="table">

			<p>Данные аккаунта</p>
			<p> <input id="phone"  name="phone" type="text" class="rfield mask-phone form-control" placeholder="Номер телефона" required>
				<script>
					$('.mask-phone').mask('+7 (999) 999-99-99');
				</script>
			</p>
			<p>
			<p id="exept" hidden style="color: red;">Пароли не совпадают</p>
			
			<input id="password" type="password" class="rfield" name="password" value="" placeholder="Пароль" required>
			
	
    <p id="excp" name="excp" hidden style="color: red;">Неверна серия, номер паспорта и/или пароль</p>
  
         <button type="submit" id="button" class="btn_submit disabled">Зарегистрироваться</button>
    </form>
  </div>
  
  </section>
  
<style type="text/css">



</style>


  <script>
        $('.mask-pasport-number').mask('9999 999999');
      </script>
  <script type="text/javascript">
    $('document').ready(function () {
      $('#button').on('click', function () {
        var pass = document.getElementById("password");
        var num = document.getElementById("ser");
        $('.table .rfield').each(function () {
			var fam = document.getElementById("fam").value;
          var name = document.getElementById("name").value;
          var date = document.getElementById("date").value;
          var ser = document.getElementById("ser").value;
          var code = document.getElementById("code").value;
          var omc = document.getElementById("omc").value;
          var phone = document.getElementById("phone").value;
          var pass1 = document.getElementById("password").value;
          
          if ($(this).val() != '') {
            console.log(35);
            $(this).removeClass('empty_field');
          } else {console.log(36);
            $(this).addClass('empty_field');
			
          }         
        });
      });
    });
  </script> 
<?php
   if(isset($_POST['ser']) and isset($_POST['password'])  and isset($_POST['fam']) and isset($_POST['name']) and isset($_POST['date']) and isset($_POST['code']) and isset($_POST['omc']) and isset($_POST['phone'])  )
    {
		
		$fam= (trim($_POST['fam']));
		$name= (trim($_POST['name']));
		$otch="отсутствует";
		if (isset($_POST['otch'])){
			$otch= (trim($_POST['otch']));
			if ($otch=="") {$otch="-";}

		}
		
		$date=trim($_POST['date'])	;	
        $login = ($_POST['ser']);
		$code = trim($_POST['code']);
		$oms = trim($_POST['omc']);
		$phone = trim($_POST['phone']);
        $password = $_POST['password'];	
		$password=password_hash($password,PASSWORD_DEFAULT);
		
		
        $servername = "localhost";
        $uname = "root";
        $pword = "";
        $dbname = "vaccine";                  
        $link = mysqli_connect($servername, $uname, $pword, $dbname);
		mysqli_set_charset($link, "utf8");
      	$result=mysqli_query($link,"INSERT INTO `users`(`name`, `secondname`, `surname`, `birthdate`, `district_code`, `phone`, `passport`, `oms`) VALUES ('$name','$otch','$fam','$date','$code','$phone','$login','$oms');");
		mysqli_set_charset($link, "utf8");
		$result=mysqli_query($link,"INSERT INTO `accounts` (`passport`, `password`) VALUES ('$login', '$password');");

		echo "<script>window.location = \"first.php\"</script>";
        
            
                         
             echo "<script>$(\"#excp\").show();</script>";              
                        
            
    }    
?>
  
  <div></div>


</body>


</html>