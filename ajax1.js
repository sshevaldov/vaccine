//вызывается в registration.php
//используется для проверки и сохранения данных регистрации
/* Article FructCode.com */
$(document).ready(function () {
	$("#buttonRegistration").click(
		function () {
			ser = document.getElementById('ser').value;
			code = document.getElementById('code').value;
			fam = document.getElementById('fam').value;
			var name = document.getElementById('name').value;
			date = document.getElementById('date').value;
			code = document.getElementById('code').value;
			omc = document.getElementById('omc').value;
			phone = document.getElementById('phone').value;
			password = document.getElementById('password').value;
			if (ser != '' && code != '' && fam != '' && name != '' && date != '' && code != '' && omc != '' && phone != '' && password != '') {
				sendAjaxForm('result_form', 'RegistrationForm', 'action_ajax_form1.php');
			}
			else { $("#ErrorRegistration").hide(); }
			return false;
		}
	);
});
function sendAjaxForm(result_form, ajax_form, url) {
	$.ajax({
		url: url, //url страницы (action_ajax_form1.php)
		type: "POST", //метод отправки
		dataType: "html", //формат данных
		data: $("#" + ajax_form).serialize(),  // Сеарилизуем объект
		success: function (response) { //Данные отправлены успешно
			result = $.parseJSON(response);
			$('#result_form').html('Имя: ' + result.name);
			ser = document.getElementById('ser').value;

			if (result.name != 0) {
				$("#ErrorRegistration").show();
			}
		},
		error: function (response) { // Данные не отправлены
			$('#LoginErrorMessage').html('Ошибка. Данные не отправлены.');
		}
	});
}

window.onload = function () {
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

function limitInput(k, obj) {
	obj.value = obj.value.replace(/[^а-яА-ЯёЁ -]/ig, '');
}

