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
				sendAjaxForm11('result_form', 'RegistrationForm', 'action_ajax_form1.php');
			}
			else { $("#ErrorRegistration").hide(); }
			return false;
		}
	);
});
function sendAjaxForm11(result_form, ajax_form, url) {
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



//вызызывается в cabinet.php
/* Article FructCode.com */
$(document).ready(function () {
	$("#city_selector").change(
		function () {
			sendAjaxForm('result_form', 'CabinetForm', 'action_ajax_form2.php');
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
			$('#result_form').html('Имя: |' + result[0] + '|');
			//const select = document.createElement('select');
			$(".pgh").remove();
			const select = document.getElementById('place_selector');
			document.querySelector('.weather').insertAdjacentElement('afterBegin', select);
			select.classList.add('weather__list');
			//select.id = 'city';
			for (let key in result) {

				const city = result[key];
				const option = document.createElement('option');
				option.classList.add('pgh');
				option.textContent = city;
				option.value = city;
				select.appendChild(option);
			}
			document.getElementById("place_selector").disabled = false;
		},
		error: function (response) { // Данные не отправлены
			$('#LoginErrorMessage').html('Ошибка. Данные не отправлены.');
		}
	});
}
//--------------------------
/* Article FructCode.com */
$(document).ready(function () {
	$("#place_selector").change(
		function () {
			if (document.getElementById("datepicker").value != '') {
				sendAjaxForm1('result_form', 'CabinetForm', 'action_ajax_form3.php');
			}
			else { document.getElementById("time_selector").disabled = true; }
			document.getElementById("datepicker").disabled = false;
		}
	);
});
$(document).ready(function () {
	$("#datepicker").change(
		function () {
			sendAjaxForm1('result_form', 'CabinetForm', 'action_ajax_form3.php');
		}
	);
});
$(document).ready(function () {
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
});
function sendAjaxForm4(result_form, ajax_form, url) {
	$.ajax({
		url: url, //url страницы (action_ajax_form1.php)
		type: "POST", //метод отправки
		dataType: "html", //формат данных
		data: $("#" + ajax_form).serialize(),  // Сеарилизуем объект
		success: function (response) { //Данные отправлены успешно
			result = $.parseJSON(response);
			$('#result_form').html('Имя: |' + result.name + '|');
		},
		error: function (response) { // Данные не отправлены
			$('#LoginErrorMessage').html('Ошибка. Данные не отправлены.');
		}
	});
}
function sendAjaxForm1(result_form, ajax_form, url) {
	$.ajax({
		url: url, //url страницы (action_ajax_form1.php)
		type: "POST", //метод отправки
		dataType: "html", //формат данных
		data: $("#" + ajax_form).serialize(),  // Сеарилизуем объект
		success: function (response) { //Данные отправлены успешно
			result = $.parseJSON(response);
			$('#result_form').html('Имя: |' + result + '|');
			$('#result_form').html('Имя: |' + document.getElementById('datepicker').value + '|');
			//const select = document.createElement('select');
			$(".pgp").remove();
			const select = document.getElementById('time_selector');
			document.querySelector('.temp').insertAdjacentElement('afterBegin', select);
			select.classList.add('temp__list1');
			//select.id = 'city';
			for (let key in result) {
				const city = result[key];
				const option = document.createElement('option');
				option.classList.add('pgp');
				option.textContent = city;
				option.value = city;
				select.appendChild(option);
			}
			//	document.getElementById("time_selector").disabled = false;
		},
		error: function (response) { // Данные не отправлены
			$('#LoginErrorMessage').html('Ошибка. Данные не отправлены.');
		}
	});
}
$(document).ready(function () {
	$("#datepicker").change(
		function () {
			if (document.getElementById('datepicker').value != '') {
				document.getElementById("time_selector").disabled = false;
			}
			else { document.getElementById("time_selector").disabled = true; }
		}
	);
});



