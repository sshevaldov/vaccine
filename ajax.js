//вызывается в index1.php
//исп для проверки введеных логина и пароля
/* Article FructCode.com */

$(document).ready(function () {
	$("#buttonToCabinet").click(
		function () {
			sendAjaxForm0('result_form', 'АuthorizationForm', 'action_ajax_form.php');
			return false;
		}
	);
});
function sendAjaxForm0(result_form, ajax_form, url) {
	$.ajax({
		url: url, //url страницы (action_ajax_form.php)
		type: "POST", //метод отправки
		dataType: "html", //формат данных
		data: $("#" + ajax_form).serialize(),  // Сеарилизуем объект
		success: function (response) { //Данные отправлены успешн
			result = $.parseJSON(response);
			log = document.getElementById('passport').value;
			pass = document.getElementById('password').value;
			$('#result_form').html('Имя: ' + result.name + '<br>Телефон: ' + result.psw + '<br>Телефон: ' + result.h);

			if (log != '' && pass != '')
				if (result.name == 0) { $("#LoginErrorMessage").show(); }
				else if (result.psw == 0) {
					$("#LoginErrorMessage").hide();
					$("#PasswordErrorMessage").show();
				} else {
					$("#PasswordErrorMessage").hide();
					$("#ToCabinetMessage").show();
				}
		},
		error: function (response) { // Данные не отправлены
			$('#LoginErrorMessage').html('Ошибка. Данные не отправлены.');
		}
	});
}

