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
	<script type="text/javascript">
		$('document').ready(function () {
			$('#button').on('click', function () {
				$('.table .rfield').each(function () {
					var fam = document.getElementById("fam").value;
					var name = document.getElementById("name").value;
					var date = document.getElementById("date").value;
					var ser = document.getElementById("ser").value;
					var code = document.getElementById("code").value;
					var omc = document.getElementById("omc").value;
					var phone = document.getElementById("phone").value;
					var pass1 = document.getElementById("pass1").value;
					var pass2 = document.getElementById("pass2").value;
					if ($(this).val() != '') {
						console.log(32);
						// Если поле не пустое удаляем класс-указание
						$(this).removeClass('empty_field');
					} else {
						console.log(33);
						// Если поле пустое добавляем класс-указание
						$(this).addClass('empty_field');
					}
					if (pass1 == pass2) {
						$("#exept").hide();
					} else { $("#exept").show(); }
					if (name != '' && date != '' && ser != '' && code != '' && omc != '' && phone != '' && pass1 != '' && pass1 == pass2) {
						location.href = 'first.php';
					}
				});
			});
		});
	</script>
</head>

<body>
	<section class="container">



		<div class="table">
			<h1>Регистрация</h1>
			<p>Личные данные</p>
			<p> <input id="fam" type="text" class="rfield" onkeyup="limitInput( 'ru', this );" placeholder="Фамилия"
					style="text-transform: capitalize;" />
			<p>
				<input id="name" type="text" class="rfield" onkeyup="limitInput( 'ru', this );" placeholder="Имя"
					style="text-transform: capitalize;" />
			<p> <input type="text" onkeyup="limitInput( 'ru', this );" placeholder="Отчество (при наличии)"
					style="text-transform:capitalize;" />
			</p>

			<p> <input id="date" type="text" class="rfield" tabindex="1" placeholder="Дата рождения" />
			</p>
		</div>

		<div class="table">
			<p>Паспорт</p>
			<p><input id="ser" type="text" class="mask-pasport-number form-control rfield" placeholder="Серия, номер">
			</p>
			<p><input id="code" type="text" class="mask-pasport-division form-control rfield"
					placeholder="Код подразделения"></p>


			<script>
				$('.mask-pasport-number').mask('99-99 999999');
				$('.mask-pasport-division').mask('999-999');
			</script>
			<p>Номер полиса ОМС</p>
			<p> <input id="omc" type="text" class="number form-control rfield" placeholder="Номер полиса ОМС">
				<script>
					$('.number').mask("9999 9999 9999 9999", { placeholder: "**** **** **** ****" })
				</script>
			</p>
			</p>
		</div>

		<div class="table">

			<p>Данные аккаунта</p>
			<p> <input id="phone" type="text" class="rfield mask-phone form-control" placeholder="Номер телефона">
				<script>
					$('.mask-phone').mask('+7 (999) 999-99-99');
				</script>
			</p>
			<p>
			<p id="exept" hidden style="color: red;">Пароли не совпадают</p>
			<p><input id="pass1" class="rfield" type="password" name="password" placeholder="Пароль"></p>

			<p><input id="pass2" class="rfield" type="password" name="password" placeholder="Повторите пароль"></p>
			<div>
				<button type="submit" id="button" class="btn_submit disabled">Зарегистрироваться</button>

			</div>
		</div>
	</section>




</body>


</html>