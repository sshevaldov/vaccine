$.datepicker.regional['ru'] = {
    closeText: 'Закрыть',
    prevText: 'Предыдущий',
    nextText: 'Следующий',
    dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
    dateFormat: 'yy.mm.dd',
    monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
    firstDay: 1,
    changeMonth: true,
    changeYear: true,
    minDate: 0,
    yearRange: '2021:2021'
};
$.datepicker.setDefaults($.datepicker.regional['ru']);
function AjaxSendInputLabel(ajax_form, url) {
    $.ajax({
        url: url, //url страницы (action_ajax_form1.php)
        type: "POST", //метод отправки
        dataType: "html", //формат данных
        data: $("#" + ajax_form).serialize(),  // Сеарилизуем объект
        success: function (response) { //Данные отправлены успешно
            result = $.parseJSON(response);
            //$('#result_form').html('Имя: |' + result.name + '|');
        }
    });
}
$("#buttonSubmit").click(
    function () {

        if (document.getElementById('city_selector').value != '' &&
            document.getElementById('place_selector').value != '' &&
            document.getElementById('datepicker').value != '' &&
            document.getElementById('time_selector').value != '') {
            AjaxSendInputLabel('CabinetForm', 'action_ajax_form4.php');
            window.location = "label.php";
        }

        return false;
    }
);

$('#buttonSubmit').on('click', function () {
    $('.table .rfield').each(function () {
        if ($(this).val() != '' && $(this).val() != null) {
            // Если поле не пустое удаляем класс-указание
            $(this).removeClass('empty_field');
        } else {
            // Если поле пустое добавляем класс-указание
            $(this).addClass('empty_field');
        }
    });
});

window.onload = function () {

    AjaxShowStatus('CabinetForm', 'action_ajax_form5.php');
}

function AjaxShowStatus(ajax_form, url) {
    $.ajax({
        url: url, //url страницы (action_ajax_form1.php)
        type: "POST", //метод отправки
        dataType: "html", //формат данных
        data: $("#" + ajax_form).serialize(),  // Сеарилизуем объект
        success: function (response) { //Данные отправлены успешно
            result = $.parseJSON(response);
            if (result.name == 'vaccinated') {
                document.getElementById('city_selector').disabled = true;
                document.getElementById('buttonSubmit').disabled = true;
                $('#ErrorRegistration').html('Вы уже вакицнированы. Запись на вакцинацию недоступна.');

            }
        }
    });
}


$(function () {
    $("#datepicker").datepicker({
        beforeShowDay: function (date) {
            var dayOfWeek = date.getDay();
            if (dayOfWeek == 0 || dayOfWeek == 6) {
                return [false];
            } else {
                return [true];
            }
        }
    });
});



$("#city_selector").change(
    function () {
        AjaxLoadPlaces('CabinetForm', 'action_ajax_form2.php');
        return false;
    }
);

function AjaxLoadPlaces(ajax_form, url) {
    $.ajax({
        url: url, //url страницы (action_ajax_form1.php)
        type: "POST", //метод отправки
        dataType: "html", //формат данных
        data: $("#" + ajax_form).serialize(),  // Сеарилизуем объект
        success: function (response) { //Данные отправлены успешно
            result = $.parseJSON(response);
            const select = document.getElementById('place_selector');
            $(".place_options_class").remove();
            document.querySelector('.place_list').insertAdjacentElement('afterBegin', select);
            for (let index in result) {
                const content = result[index];
                const option = document.createElement('option');
                option.classList.add('place_options_class');
                option.textContent = content;
                option.value = content;
                select.appendChild(option);
            }
            document.getElementById("place_selector").disabled = false;
        }
    });
}

$("#place_selector").change(
    function () {
        if (document.getElementById("datepicker").value != '') {
            AjaxLoadTimes('CabinetForm', 'action_ajax_form3.php');
        }
        else { document.getElementById("time_selector").disabled = true; }
        document.getElementById("datepicker").disabled = false;
    }
);
$("#datepicker").change(
    function () {
        AjaxLoadTimes('CabinetForm', 'action_ajax_form3.php');
    }
);





$("#datepicker").change(
    function () {
        if (document.getElementById('datepicker').value != '') {
            document.getElementById("time_selector").disabled = false;
        }
        else { document.getElementById("time_selector").disabled = true; }
    }
);





function AjaxLoadTimes(ajax_form, url) {
    $.ajax({
        url: url, //url страницы
        type: "POST", //метод отправки
        dataType: "html", //формат данных
        data: $("#" + ajax_form).serialize(), //сеарилизуем объект
        success: function (response) { //данные отправлены успешно
            result = $.parseJSON(response);
            const select = document.getElementById('time_selector');
            $(".time_options_class").remove();
            document.querySelector('.time_list').insertAdjacentElement('afterBegin', select);
            for (let index in result) {
                const content = result[index];
                const option = document.createElement('option');
                option.classList.add('time_options_class');
                option.textContent = content;
                option.value = content;
                select.appendChild(option);
            }
        }
    });
}


