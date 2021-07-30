function limitInput(_k, obj) {//функция замены неподходящих вводимых символов
    obj.value = obj.value.replace(/[^а-яА-ЯёЁ -]/ig, '');//замена английских букв и цифр
    obj.value = obj.value.replace(/ /ig, '');//замена пробела
}
$("#buttonRegistration").click(
    function () {//производим проверку введенного паспорта
        ser = document.getElementById('ser').value;
       
        fam = document.getElementById('fam').value;
        var name = document.getElementById('name').value;
        date = document.getElementById('date').value;
        sex = document.getElementById('sex').value;
        omc = document.getElementById('omc').value;
        phone = document.getElementById('phone').value;
        password = document.getElementById('password').value;
        document.getElementById('fam').disabled = false;
        console.log(ser);
        // если все поля введены
        if (ser != '' && fam != '' && name != '' && sex != '' && date != '' && omc != '' && phone != '' && password != '') {
            AjaxSendInputUserData('RegistrationForm', 'action_ajax_form1.php');
        }
        else {
            $("#ErrorRegistration").html('');
        }
        return false;
    }
);

function AjaxSendInputUserData(ajax_form, url) {//проверка уникальности пароля и записи данных в бд
    $.ajax({
        url: url,//скрипт-файл php
        type: "POST",//тип метода
        dataType: "html",//тип данных
        data: $("#" + ajax_form).serialize(),//собираем данные со страницы
        success: function (response) {//если скрипт отработал успешно
            result = $.parseJSON(response);//получаем данные от php-скрипта          
            if (result.NumRows != 0) {//если введеный паспорт уже существует               
                $("#ErrorRegistration").html('Паспорт уже зарегистрирован');//выводим сообщение
            }
            else {//если введеный паспорт не существует
                window.location = "../auth/auth.php";//переход на страницу авторизации
            }
        }
    });
}