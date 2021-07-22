
$("#buttonToCabinet").click(//событие клинка
    function () {
        AjaxCheckInputAccount('АuthorizationForm', 'action_ajax_form.php');//функция проверки наличия введенных данных
        return false;//false для избавления от обновления страницы
    }
);



function AjaxCheckInputAccount(ajax_form, url) {
    $.ajax({//ajax запрос к файлу php
        url: url,//php файл
		type: "POST",//метод запроса
		dataType: "html",//тип данных
        data: $("#" + ajax_form).serialize(),
        success: function (response) {
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
                    window.location = "../cabinet/cabinet1.php";
                }
            }
        }
    });
}