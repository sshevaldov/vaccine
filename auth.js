
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
        url: url, 
        type: "POST", 
        dataType: "html", 
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
                    window.location = "cabinet.php";
                }
            }
        }
    });
}