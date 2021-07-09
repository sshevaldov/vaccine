
$(document).ready(function () {
	$("#buttonToCabinet").click(
		function () {
			CheckInputAccount('АuthorizationForm', 'action_ajax_form.php');
			return false;
		}
	);
	$("#city_selector").change(
		function () {
			sendAjaxForm('result_form', 'CabinetForm', 'action_ajax_form2.php');
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
				SendInputUserData('RegistrationForm', 'action_ajax_form1.php');
			}
			else { $("#ErrorRegistration").hide(); }
			return false;
		}
	);
	$("#place_selector").change(
		function () {
			if (document.getElementById("datepicker").value != '') {
				LoadTimes('CabinetForm', 'action_ajax_form3.php');
			}
			else { document.getElementById("time_selector").disabled = true; }
			document.getElementById("datepicker").disabled = false;
		}
	);
	$("#datepicker").change(
		function () {
			LoadTimes('CabinetForm', 'action_ajax_form3.php');
		}
	);
	$("#buttonSubmit").click(
		function () {

			if (document.getElementById('city_selector').value != '' &&
				document.getElementById('place_selector').value != '' &&
				document.getElementById('datepicker').value != '' &&
				document.getElementById('time_selector').value != '') {
				sendAjaxForm4('result_form', 'CabinetForm', 'action_ajax_form4.php');
			}
			return false;
		}
	);
	$('#buttonSubmit').on('click', function () {
		$('.table .rfield').each(function () {
			if ($(this).val() != '' && $(this).val() != null) {
				console.log(32);
				// Если поле не пустое удаляем класс-указание
				$(this).removeClass('empty_field');
			} else {
				console.log(33);
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
				$("#LoginErrorMessage").hide();
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
				console.log(35);
				$(this).removeClass('empty_field');
			} else {
				console.log(36);
				$(this).addClass('empty_field');
			}
		});
	});

	$('.mask-pasport-division').mask('999-999');
	$('.mask-phone').mask('+7 (999) 999-99-99');
	$('.mask-pasport-number').mask('9999 999999');
	$('.number').mask("9999 9999 9999 9999", {
		placeholder: "**** **** **** ****"
	})
});

function LoadTimes(ajax_form, url) {
	$.ajax({
		url: url, //url страницы
		type: "POST", //метод отправки
		dataType: "html", //формат данных
		data: $("#" + ajax_form).serialize(), //сеарилизуем объект
		success: function (response) { //данные отправлены успешно
			result = $.parseJSON(response);
			const select = document.getElementById('time_selector');
			$(".options_class").remove();
			document.querySelector('.time_list').insertAdjacentElement('afterBegin', select);
			for (let index in result) {
				const content = result[index];
				const option = document.createElement('option');
				option.classList.add('options_class');
				option.textContent = content;
				option.value = content;
				select.appendChild(option);
			}
		}
	});
}

function CheckInputAccount(ajax_form, url) {
	$.ajax({
		url: url, //url страницы (action_ajax_form.php)
		type: "POST", //метод отправки
		dataType: "html", //формат данных
		data: $("#" + ajax_form).serialize(),  // Сеарилизуем объект
		success: function (response) { //Данные отправлены успешн
			result = $.parseJSON(response);
			log = $("#passport").value;
			pass = $("#password").value;
			if (log != '' && pass != '') {
				if (result.name == 0) {
					$("#LoginErrorMessage").show();
				}
				else if (result.psw == 0) {
					$("#LoginErrorMessage").hide();
					$("#PasswordErrorMessage").show();
				} else {
					$("#PasswordErrorMessage").hide();
					$("#ToCabinetMessage").show();
				}
			}
		}
	});
}

function SendInputUserData(ajax_form, url) {
	$.ajax({
		url: url, //url страницы (action_ajax_form1.php)
		type: "POST", //метод отправки
		dataType: "html", //формат данных
		data: $("#" + ajax_form).serialize(),  // Сеарилизуем объект
		success: function (response) { //Данные отправлены успешно
			result = $.parseJSON(response);
			if (result.name != 0) {
				$("#ErrorRegistration").show();
			}
			else {
				$("#ErrorRegistration").hide();
			}
		}
	});
}

function sendAjaxForm(_result_form, ajax_form, url) {
	$.ajax({
		url: url, //url страницы (action_ajax_form1.php)
		type: "POST", //метод отправки
		dataType: "html", //формат данных
		data: $("#" + ajax_form).serialize(),  // Сеарилизуем объект
		success: function (response) { //Данные отправлены успешно
			result = $.parseJSON(response);
			$('#result_form').html('Имя: |' + result[0] + '|');
			//const select = document.createElement('select');
			$(".pgh").remove();
			const select = document.getElementById('place_selector');
			document.querySelector('.place_list').insertAdjacentElement('afterBegin', select);
			select.classList.add('place__list');
			//select.id = 'content';
			for (let index in result) {
				const content = result[index];
				const option = document.createElement('option');
				option.classList.add('pgh');
				option.textContent = content;
				option.value = content;
				select.appendChild(option);
			}
			document.getElementById("place_selector").disabled = false;
		},
		error: function (_response) { // Данные не отправлены
			$('#LoginErrorMessage').html('Ошибка. Данные не отправлены.');
		}
	});
}
function sendAjaxForm4(_result_form, ajax_form, url) {
	$.ajax({
		url: url, //url страницы (action_ajax_form1.php)
		type: "POST", //метод отправки
		dataType: "html", //формат данных
		data: $("#" + ajax_form).serialize(),  // Сеарилизуем объект
		success: function (response) { //Данные отправлены успешно
			result = $.parseJSON(response);
			$('#result_form').html('Имя: |' + result.name + '|');
		},
		error: function (_response) { // Данные не отправлены
			$('#LoginErrorMessage').html('Ошибка. Данные не отправлены.');
		}
	});
}


function Page() {
	mode = localStorage.getItem('mode');
	if (mode == "dark") {
		TolightMode();
		console.log("TolightMode");
	} else {
		TodarkMode();
		console.log("TodarkMode");
	}
	console.log(mode);
}
function TodarkMode() {
	document.body.style.backgroundColor = "#040040";
	localStorage.setItem('mode', 'dark');
	mode = localStorage.getItem('mode');
}

function TolightMode() {
	document.body.style.backgroundColor = "lightblue";
	localStorage.setItem('mode', 'light');
	mode = localStorage.getItem('mode');
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
	$.mask.definitions['~'] = '[]';
	$("#datepicker")
		.mask("~~.~~.~~", {
			placeholder: "дд.мм.гггг"
		});
});
