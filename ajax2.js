/* Article FructCode.com */
$(document).ready(function () {
	$("#city").change(
		function () {
			sendAjaxForm('result_form', 'ajax_form2', 'action_ajax_form2.php');
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
			const select = document.getElementById('hh');

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
			document.getElementById("hh").disabled = false;


		},
		error: function (response) { // Данные не отправлены
			$('#excp').html('Ошибка. Данные не отправлены.');
		}
	});
}

//--------------------------
/* Article FructCode.com */
$(document).ready(function () {
	$("#hh").change(
		function () {
			sendAjaxForm1('result_form', 'ajax_form2', 'action_ajax_form3.php');
		}
	);
});

function sendAjaxForm1(result_form, ajax_form, url) {
	$.ajax({
		url: url, //url страницы (action_ajax_form1.php)
		type: "POST", //метод отправки
		dataType: "html", //формат данных
		data: $("#" + ajax_form).serialize(),  // Сеарилизуем объект
		success: function (response) { //Данные отправлены успешно
			result = $.parseJSON(response);
			$('#result_form').html('Имя: |' + result + '|');


			//const select = document.createElement('select');
			$(".pgp").remove();
			const select = document.getElementById('time');

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

			document.getElementById("time").disabled = false;

		},
		error: function (response) { // Данные не отправлены
			$('#excp').html('Ошибка. Данные не отправлены.');
		}
	});
}

