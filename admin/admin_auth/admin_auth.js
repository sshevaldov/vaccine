// событие клика на кнопку
// запускает проверку введенный логина и пароля в бд
$("#buttonToAdminCabinet").click(
	function () {
		AjaxCheckInputAccount('AdminАuthorizationForm', 'AjaxCheckInputAccount.php');//функция проверки наличия введенных данных
		return false;//false для избавления от обновления страницы
	}
);

// функция обрабатывает ответ от бд на введеный логин и пароль
// выводит соответствующие сообщения, если пароль и/или логин введены неверно или не существуют
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
				}
				else {//если логин и пароль подошли
					window.location = "../admin_cabinet/admin_cabinet.php";//переход в кабинет администратора
				}
			} else {
				$("#LoginErrorMessage").html("");
			}
		}
	});
}