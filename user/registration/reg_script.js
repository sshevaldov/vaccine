$.datepicker.regional['ru'] = {
    dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
    dateFormat: 'yy.mm.dd',
    monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
    firstDay: 1,
    changeMonth: true,
    changeYear: true,
    maxDate: 0,
    yearRange: '1900:2021'
};
$.datepicker.setDefaults($.datepicker.regional['ru']);
$(function () {
    $.mask.definitions['~'] = '[]';
    $("#date")
        .datepicker({
            nextText: "",
            prevText: "",
            dateFormat: 'yy.mm.dd',
            changeMonth: true,
            changeYear: true,
            maxDate: 0,
            maxYear: 0,
            showAnim: "fold",
            yearRange: '1900:2030',
            firstDay: 1
        })
        .mask("~~.~~.~~", {
            placeholder: "гг.мм.дд"
        });
});

function limitInput(_k, obj) {
    obj.value = obj.value.replace(/[^а-яА-ЯёЁ -]/ig, '');
}
$("#buttonRegistration").click(
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
        if (ser != '' && code != '' && fam != '' && name != '' && date != '' && code != '' && omc != '' && phone != '' && password != '') {
            AjaxSendInputUserData('RegistrationForm', 'action_ajax_form1.php');
console.log('ok');
        }
        else { $("#ErrorRegistration").html(''); }

        return false;
    }
);
$('#buttonRegistration').on('click', function () {
    $('.table .rfield').each(function () {
        if ($(this).val() != '') {
            $(this).removeClass('empty_field');
        } else {
            $(this).addClass('empty_field');
        }
    });
});
function AjaxSendInputUserData(ajax_form, url) {
    $.ajax({
        url: url,  
        type: "POST",  
        dataType: "html",  
        data: $("#" + ajax_form).serialize(),   
        success: function (response) { 
            result = $.parseJSON(response);
            if (result.name != 0) {
                $("#ErrorRegistration").html('Паспорт уже зарегистрирован');;
            }
            else {

                window.location = "../auth/auth.php";
            }
        }
    });
}