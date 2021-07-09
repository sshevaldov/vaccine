<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script src="lib/jquery-1.8.3.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="src/jquery.maskedinput.js" type="text/javascript"></script>
	<script src="ajax.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/redmond/jquery-ui.css" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Регистрация</title>
</head>

<body>
	<form method="post" id="RegistrationForm" action="">
		<form method="post">
			<div class="table">
				<h1>Регистрация</h1>
				<p>Личные данные
				<p><input id="fam" name="fam" type="text" class="rfield" onkeyup="limitInput( 'ru', this );" placeholder="Фамилия" style="text-transform: capitalize;" required>
				<p><input id="name" name="name" type="text" class="rfield" onkeyup="limitInput( 'ru', this );" placeholder="Имя" style="text-transform: capitalize;" required />
				<p><input id="otch" name="otch" type="text" onkeyup="limitInput( 'ru', this );" placeholder="Отчество (при наличии)" style="text-transform:capitalize;" />
				<p><input id="date" name="date" autocomplete="off" type="text" class="rfield" tabindex="1" placeholder="Дата рождения" required />
			</div>
			<div class="table">
				<p>Паспорт
				<p id="ErrorRegistration" name="ErrorRegistration" hidden style="color: red;">Паспорт уже зарегистрирован</p>
				<input id="ser" name="ser" type="text" class="mask-pasport-number form-control rfield" value="" placeholder="Серия, номер паспорта" required>
				<input id="code" name="code" type="text" class="mask-pasport-division form-control rfield" value="" placeholder="Код подразделения" required>
				<p>Номер полиса ОМС
					<input id="omc" name="omc" type="text" class="number form-control rfield" placeholder="Номер полиса ОМС" required>
			</div>
			<div class="table">
				<p>Данные аккаунта</p>
				<input id="phone" name="phone" type="text" class="rfield mask-phone form-control" placeholder="Номер телефона" required>
				<input id="password" type="password" class="rfield" name="password" value="" placeholder="Пароль" required>
				<button type="submit" id="buttonRegistration" class="btn_submit disabled">Зарегистрироваться</button>
		</form>
		</div>
	</form>
	<script src="reg_script.js"></script>
</body>

</html>