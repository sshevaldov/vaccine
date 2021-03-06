
$("#buttonToAdminCabinet").click(//событие клинка
	function () {
		AjaxCheckInputAccount('АuthorizationForm1', 'action_ajax_form_admin.php');//функция проверки наличия введенных данных
		return false;//false для избавления от обновления страницы
	}
);

function AjaxCheckInputAccount(ajax_form, url) {
	$.ajax({//ajax запрос к файлу php
		url: url,//php файл
		type: "POST",//метод запроса
		dataType: "html",//тип данных
		data: $("#" + ajax_form).serialize(),//собираем данные со страницы
		success: function (response) {//если php-скрипт отработал успешно, вызываетс функция			
			login = document.getElementById('login').value;//получаем введенный логин
			password = document.getElementById('password').value;//получаем введенный пароль
			if (login != '' && password != '') {//если логин и пароль введены
				result = $.parseJSON(response);//получаем данные от php-скрипта
				if (result.NumRows == 0) {//если записи с логином не найдены
					$("#LoginErrorMessage").html("Пользователь не существует");
				}
				else if (result.IsMatch == false) {//если записи с логином найдены, но пароль не подходит
					$("#LoginErrorMessage").html("Неверный пароль");
				} else {//если логин и пароль подошли
					window.location = "../admin_cabinet/create_list.php";//переход в кабинет администратора
				}
			}
		}
	});
}