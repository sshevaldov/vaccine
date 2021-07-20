
$("#buttonToCabinet").click(
    function () {
        AjaxCheckInputAccount('АuthorizationForm', 'action_ajax_form.php');

        return false;

    }
);
$('#buttonToCabinet').on('click', function () {
    $('.table .rfield').each(function () {
        if ($(this).val() != '') {
            $(this).removeClass('empty_field');
        } else {
            $(this).addClass('empty_field');
            $("#LoginErrorMessage").html('');
        }
    });
});


function AjaxCheckInputAccount(ajax_form, url) {
    $.ajax({
        url: url, //url страницы (action_ajax_form.php)
        type: "POST", //метод отправки
        dataType: "html", //формат данных
        data: $("#" + ajax_form).serialize(),  // Сеарилизуем объект
        success: function (response) { //Данные отправлены успешн
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
                    window.location = "cabinet.php";
                }
            }
        }
    });
}