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
			$('#result_form').html('Имя: |' + result.length + '|');

		
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
				option.value = key;
				select.appendChild(option);

			}



		},
		error: function (response) { // Данные не отправлены
			$('#excp').html('Ошибка. Данные не отправлены.');
		}
	});
}