
$("#buttonToCabinet").click(//событие клинка
    function () {
        AjaxCheckInputAccount('АuthorizationForm', 'AjaxCheckInputAccount.php');//функция проверки наличия введенных данных
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
            log = document.getElementById('passport').value;//получаем введенный логин
            pass = document.getElementById('password').value;//получаем введенный пароль
            if (log != '' && pass != '') {//если логин и пароль введены
                result = $.parseJSON(response);//получаем данные от php-скрипта
                if (result.NumRows == 0) {//если записи с логином не найдены
                    $("#LoginErrorMessage").html('Пользователь не существует');
                }
                else if (result.IsMatch == 0) {//если записи с логином найдены, но пароль не подходит
                    $("#LoginErrorMessage").html('Неверный пароль');
                } else {
                    window.location = "../cabinet/cabinet1.php";//переход в кабинет администратора
                }
            }
            else $("#LoginErrorMessage").html('');
        }
    });
}