<html>

<head>

	<!--<script src="lib/jquery-1.8.3.min.js" type="text/javascript" charset="utf-8"></script>--->
		
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	
	<link type="text/css" rel="stylesheet"
		href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/redmond/jquery-ui.css" />--->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  
  <script src="ajax1.js"></script>
<script src="lib/jquery-1.8.3.min.js" type="text/javascript" charset="utf-8"></script>
  <script src="src/jquery.maskedinput.js" type="text/javascript"></script>
  
  <link rel="stylesheet" type="text/css" href="style.css">


	
	
	<title>Регистрация</title>
	<!--<script >
		$.datepicker.regional['ru'] = {
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
		$(function () {
			$.mask.definitions['~'] = '[]';
			$("#date")
				.datepicker({ nextText: "", prevText: "", dateFormat: 'dd.mm.yy', changeMonth: true, changeYear: true, maxDate: 0, maxYear: 0, showAnim: "fold", yearRange: '1900:2030', firstDay: 1 })
				.mask("~~.~~.~~~~", { placeholder: "дд.мм.гггг" });
		});
		
	</script>-->
</head>
<!--<script>
   
        window.onload = function() {
            switch (localStorage.getItem('mode')) {               
                case "dark":
                    document.body.style.backgroundColor = "#040040";
                    document.getElementById("toggle").checked = true;

                    break;
                default:
                    document.body.style.backgroundColor = "lightblue";
                    document.getElementById("toggle").checked = false;
            }
        }
</script>--->
<body>
<form method="post" id="ajax_form1" action="" >
<?php session_start();  ?>
	<div class="table">
		<form method="post">
			<h1>Регистрация</h1>
			<p>Личные данные
			<p> <input id="fam" name="fam" type="text" class="rfield" onkeyup="limitInput( 'ru', this );"
					placeholder="Фамилия" style="text-transform: capitalize;" required >
			<p><input id="name" name="name" type="text" class="rfield" onkeyup="limitInput( 'ru', this );"
					placeholder="Имя" style="text-transform: capitalize;" required />
			<p><input type="text" id="otch" name="otch" onkeyup="limitInput( 'ru', this );"
					placeholder="Отчество (при наличии)" style="text-transform:capitalize;" />
			<p><input id="date" name="date" autocomplete="off" type="text" class="rfield" tabindex="1"
					placeholder="Дата рождения" required />
	</div>
	
	<div class="table">
		<p>Паспорт
		<p id="sererror" name="sererror" hidden style="color: red;">Паспорт уже зарегистрирован</p>
			<input id="ser" name="ser" type="text" value="" class="mask-pasport-number form-control rfield"
				placeholder="Серия, номер паспорта" required>
		<p><input id="code" name="code" type="text" class="mask-pasport-division form-control rfield"
				placeholder="Код подразделения" required>

			<script>
				$('.mask-pasport-number').mask('9999 999999');
				$('.mask-pasport-division').mask('999-999');
			</script>
		<p>Номер полиса ОМС
		<p><input id="omc" name="omc" type="text" class="number form-control rfield" placeholder="Номер полиса ОМС"
				required>
			<script>
				$('.number').mask("9999 9999 9999 9999", { placeholder: "**** **** **** ****" })
			</script>
	</div>
	<div class="table">
		<p>Данные аккаунта
		<p><input id="phone" name="phone" type="text" class="rfield mask-phone form-control"
				placeholder="Номер телефона" required>
			<script>
				$('.mask-phone').mask('+7 (999) 999-99-99');
			</script>
			<input id="password" type="password" class="rfield" name="password" value="" placeholder="Пароль" required>
			<button type="submit" id="button" class="btn_submit disabled">Зарегистрироваться</button>
			</form>
	</div>
	<script type="text/javascript">
		$('document').ready(function () {
			$('#button').on('click', function () {
				var pass = document.getElementById("password");
				var num = document.getElementById("ser");
				$('.table .rfield').each(function () {
					if ($(this).val() != '') {
						console.log(35);
						$(this).removeClass('empty_field');
					} else {
						console.log(36);
						$(this).addClass('empty_field');
					}
				});
			});
		});
		function limitInput(k, obj) {
			obj.value = obj.value.replace(/[^а-яА-ЯёЁ -]/ig, '');
		}
		
	</script>
	
	<?php/*
	 		require_once('php/funct.php');
			if(isset($_POST['ser']) and isset($_POST['password']) and isset($_POST['fam']) and isset($_POST['name']) and isset($_POST['date']) and isset($_POST['code']) and isset($_POST['omc']) and isset($_POST['phone']) )
			{
				$name= (trim($_POST['name']));
				$otch="отсутствует";
				if (isset($_POST['otch'])){
					$otch= (trim($_POST['otch']));
					if ($otch=="") {$otch="-";}
				}
				$_SESSION['fam']= (trim($_POST['fam']));				
				$date=trim($_POST['date']);	
				$code = trim($_POST['code']);
				$phone = trim($_POST['phone']);
				$login = ($_POST['ser']);				
				$oms = trim($_POST['omc']);
				
				$password = $_POST['password'];	
				$password=password_hash($password,PASSWORD_DEFAULT);
				$link=dbconnect();				
				$sql = "SELECT * FROM `accounts` where `passport`='{$login}'";
        		$result=mysqli_query($link,$sql);    
				$rows = mysqli_num_rows($result);
				echo $rows;
				if ($rows == 0){
					mysqli_set_charset($link, "utf8");
					$sql="INSERT INTO `users`(`name`, `secondname`, `surname`, `birthdate`, `district_code`, `phone`, `passport`, `oms`) VALUES ('$name','$otch','{$_SESSION['fam']}','$date','$code','$phone','$login','$oms');";
					$result=mysqli_query($link,$sql);				
				
					$sql="INSERT INTO `accounts` (`passport`, `password`) VALUES ('$login', '$password');";
					$result=mysqli_query($link,$sql);			
					echo "    all is good    ";
				}else{
					echo " user already create";
				}
								
			}    
		*/?>
		 </form>
		 <div id="result_form"></div> 
</body>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js">var jQuery_2_0_3 = $.noConflict(true);</script>
<script type="text/javascript">
var jQuery_2_0_3 = $.noConflict(true);
</script>

</html>