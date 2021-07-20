
$(document).ready(function () {
	$("#buttonToCabinet").click(
		function () {
			AjaxCheckInputAccount('АuthorizationForm', 'action_ajax_form.php');

			return false;

		}
	);
	$("#buttonToAdminCabinet").click(
		function () {
			AjaxCheckInputAccount1('АuthorizationForm1', 'action_ajax_form_admin.php');
			return false;

		}
	);

	$("#city_selector").change(
		function () {
			AjaxLoadPlaces('CabinetForm', 'action_ajax_form2.php');
			return false;
		}
	);
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
				AjaxSendInputUserData('RegistrationForm', 'action_ajax_form1.php');

			}
			else { $("#ErrorRegistration").html(''); }

			return false;
		}
	);
	$("#place_selector").change(
		function () {
			if (document.getElementById("datepicker").value != '') {
				AjaxLoadTimes('CabinetForm', 'action_ajax_form3.php');
			}
			else { document.getElementById("time_selector").disabled = true; }
			document.getElementById("datepicker").disabled = false;
		}
	);
	$("#datepicker").change(
		function () {
			AjaxLoadTimes('CabinetForm', 'action_ajax_form3.php');
		}
	);
	$("#buttonSubmit").click(
		function () {

			if (document.getElementById('city_selector').value != '' &&
				document.getElementById('place_selector').value != '' &&
				document.getElementById('datepicker').value != '' &&
				document.getElementById('time_selector').value != '') {
				AjaxSendInputLabel('CabinetForm', 'action_ajax_form4.php');
				window.location = "label.php";
			}

			return false;
		}
	);
	$('#buttonSubmit').on('click', function () {
		$('.table .rfield').each(function () {
			if ($(this).val() != '' && $(this).val() != null) {
				// Если поле не пустое удаляем класс-указание
				$(this).removeClass('empty_field');
			} else {
				// Если поле пустое добавляем класс-указание
				$(this).addClass('empty_field');
			}
		});
	});
	$('#buttonToCabinet').on('click', function () {
		$('.table .rfield').each(function () {
			if ($(this).val() != '') {
				$(this).removeClass('empty_field');
			} else {
				$(this).addClass('empty_field');
				$("#LoginErrorMessage").html('');
			}
		});
	});
	$('#buttonToAdminCabinet').on('click', function () {
		$('.table .rfield').each(function () {
			if ($(this).val() != '') {
				$(this).removeClass('empty_field');
			} else {
				$(this).addClass('empty_field');
				$("#LoginErrorMessage").html('');
			}
		});
	});

	$("#datepicker").change(
		function () {
			if (document.getElementById('datepicker').value != '') {
				document.getElementById("time_selector").disabled = false;
			}
			else { document.getElementById("time_selector").disabled = true; }
		}
	);
	$('#buttonRegistration').on('click', function () {
		$('.table .rfield').each(function () {
			if ($(this).val() != '') {
				$(this).removeClass('empty_field');
			} else {
				$(this).addClass('empty_field');
			}
		});
	});

	
});

function AjaxLoadTimes(ajax_form, url) {
	$.ajax({
		url: url, //url страницы
		type: "POST", //метод отправки
		dataType: "html", //формат данных
		data: $("#" + ajax_form).serialize(), //сеарилизуем объект
		success: function (response) { //данные отправлены успешно
			result = $.parseJSON(response);
			const select = document.getElementById('time_selector');
			$(".time_options_class").remove();
			document.querySelector('.time_list').insertAdjacentElement('afterBegin', select);
			for (let index in result) {
				const content = result[index];
				const option = document.createElement('option');
				option.classList.add('time_options_class');
				option.textContent = content;
				option.value = content;
				select.appendChild(option);
			}
		}
	});
}

function AjaxCheckInputAccount(ajax_form, url) {
	$.ajax({
		url: url, //url страницы (action_ajax_form.php)
		type: "POST", //метод отправки
		dataType: "html", //формат данных
		data: $("#" + ajax_form).serialize(),  // Сеарилизуем объект
		success: function (response) { //Данные отправлены успешн
			result = $.parseJSON(response);
			log = document.getElementById('passport').value;
			pass = document.getElementById('password').value;

			if (log != '' && pass != '') {
				if (result.name == 0) {
					$("#LoginErrorMessage").html('Пользователь не существует');
				}
				else if (result.psw == 0) {
					$("#LoginErrorMessage").html('Неверный пароль');
				} else {
					window.location = "cabinet.php";
				}
			}
		}
	});
}
function AjaxCheckInputAccount1(ajax_form, url) {
	$.ajax({
		url: url, //url страницы (action_ajax_form.php)
		type: "POST", //метод отправки
		dataType: "html", //формат данных
		data: $("#" + ajax_form).serialize(),  // Сеарилизуем объект
		success: function (response) { //Данные отправлены успешн
			result = $.parseJSON(response);
			log = document.getElementById('login').value;
			pass = document.getElementById('password').value;
			console.log(log);
			console.log(pass);
			if (log != '' && pass != '') {
				if (result.name == 0) {
					$("#LoginErrorMessage").html("Пользователь не существует");
				}
				else if (result.psw == 0) {
					$("#LoginErrorMessage").html("Неверный пароль");

				} else {
					window.location = "create_list.php";
				}
			}
		}
	});
}


function show_hide_password(target) {
	var input = document.getElementById('password');
	if (input.getAttribute('type') == 'password') {
		target.classList.add('view');
		input.setAttribute('type', 'text');
	} else {
		target.classList.remove('view');
		input.setAttribute('type', 'password');
	}
	return false;
}
function AjaxSendInputUserData(ajax_form, url) {
	$.ajax({
		url: url, //url страницы (action_ajax_form1.php)
		type: "POST", //метод отправки
		dataType: "html", //формат данных
		data: $("#" + ajax_form).serialize(),  // Сеарилизуем объект
		success: function (response) { //Данные отправлены успешно
			result = $.parseJSON(response);
			if (result.name != 0) {
				$("#ErrorRegistration").html('Паспорт уже зарегистрирован');;
			}
			else {

				window.location = "auth.php";
			}
		}
	});
}

function AjaxLoadPlaces(ajax_form, url) {
	$.ajax({
		url: url, //url страницы (action_ajax_form1.php)
		type: "POST", //метод отправки
		dataType: "html", //формат данных
		data: $("#" + ajax_form).serialize(),  // Сеарилизуем объект
		success: function (response) { //Данные отправлены успешно
			result = $.parseJSON(response);
			const select = document.getElementById('place_selector');
			$(".place_options_class").remove();
			document.querySelector('.place_list').insertAdjacentElement('afterBegin', select);
			for (let index in result) {
				const content = result[index];
				const option = document.createElement('option');
				option.classList.add('place_options_class');
				option.textContent = content;
				option.value = content;
				select.appendChild(option);
			}
			document.getElementById("place_selector").disabled = false;
		}
	});
}
function AjaxSendInputLabel(ajax_form, url) {
	$.ajax({
		url: url, //url страницы (action_ajax_form1.php)
		type: "POST", //метод отправки
		dataType: "html", //формат данных
		data: $("#" + ajax_form).serialize(),  // Сеарилизуем объект
		success: function (response) { //Данные отправлены успешно
			result = $.parseJSON(response);
			//$('#result_form').html('Имя: |' + result.name + '|');
		}
	});
}



window.onload = function () {

	AjaxShowStatus('CabinetForm', 'action_ajax_form5.php');
}

function AjaxShowStatus(ajax_form, url) {
	$.ajax({
		url: url, //url страницы (action_ajax_form1.php)
		type: "POST", //метод отправки
		dataType: "html", //формат данных
		data: $("#" + ajax_form).serialize(),  // Сеарилизуем объект
		success: function (response) { //Данные отправлены успешно
			result = $.parseJSON(response);
			console.log(result.name);
			if (result.name == 'vaccinated') {
				document.getElementById('city_selector').disabled = true;
				document.getElementById('buttonSubmit').disabled = true;
				$('#ErrorRegistration').html('Вы уже вакицнированы. Запись на вакцинацию недоступна.');

			}
		}
	});
}

$(function () {
	$("#datepicker").datepicker({
		beforeShowDay: function (date) {
			var dayOfWeek = date.getDay();
			if (dayOfWeek == 0 || dayOfWeek == 6) {
				return [false];
			} else {
				return [true];
			}
		}
	});
});
$(function () {
	$("#datepicker1").datepicker({
		beforeShowDay: function (date) {
			var dayOfWeek = date.getDay();
			if (dayOfWeek == 0 || dayOfWeek == 6) {
				return [false];
			} else {
				return [true];
			}
		}
	});
});
$(function () {
	$("#datepicker2").datepicker({
		beforeShowDay: function (date) {
			var dayOfWeek = date.getDay();
			if (dayOfWeek == 0 || dayOfWeek == 6) {
				return [false];
			} else {
				return [true];
			}
		}
	});
});

