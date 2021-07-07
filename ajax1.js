/* Article FructCode.com */
$(document).ready(function () {
	$("#button").click(
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
			if (ser != '' && code != '' && fam != '' && name != '' && date != '' && code != '' && omc != '' && phone != '' && password!='') {
				sendAjaxForm('result_form', 'ajax_form1', 'action_ajax_form1.php');
			}
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
			if (ser != '') {
				if (result.name != 0) {
					$("#sererror").show();
				}
			}
			else {
				$("#sererror").hide();
			}

		},
		error: function (response) { // Данные не отправлены
			$('#excp').html('Ошибка. Данные не отправлены.');
		}
	});
}