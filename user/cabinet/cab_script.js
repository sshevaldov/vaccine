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
        url: url,
        type: "POST",
        dataType: "html",
        data: $("#" + ajax_form).serialize(),
        success: function (response) {
            result = $.parseJSON(response);
            alert(result.name);
        }
    }); 
}
$("#buttonSubmit").click(
    function () {

        if (document.getElementById('city_selector').value != '' &&
            document.getElementById('place_selector').value != '' &&
            document.getElementById('datepickerVak').value != '' &&
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

            $(this).removeClass('empty_field');
        } else {

            $(this).addClass('empty_field');
        }
    });
});






function AjaxShowStatus(ajax_form, url) {
    $.ajax({
        url: url,
        type: "POST",
        dataType: "html",
        data: $("#" + ajax_form).serialize(),
        success: function (response) {
            result = $.parseJSON(response);

            if (result.date != "0000-00-00") {
                $('#ErrorRegistration').html(`Дата первой вакцинации: ${result.date}`);
                if (result.date2 != "0000-00-00") {
                    $('#ErrorRegistration1').html(`Дата второй вакцинации: ${result.date2}`);
                    $('#ErrorRegistration3').html(`Вакцинация недоступна.`);
                    document.getElementById('city_selector').disabled = true;
                    document.getElementById('buttonSubmit').disabled = true;
                } else {
                    $('#ErrorRegistration1').html(`Доступна вторая вакцинация, начиная с ${result.date3}`);
                    $("#datepickerVak").datepicker("option", "minDate", result.date3.trim());


                }


            } else {

            }
        }
    });
}


$(function () {
    $("#datepickerVak").datepicker({
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
        if (document.getElementById("datepickerVak").value != '') {
            AjaxLoadTimes('CabinetForm', 'action_ajax_form3.php');
        }
        else { document.getElementById("time_selector").disabled = true; }
        document.getElementById("datepickerVak").disabled = false;

        return false;
    }
);
$("#city_selector1").change(
    function () {
        AjaxLoadPlaces1('CabinetForm', 'action_ajax_form7.php');
        if (document.getElementById("datepickerVak1").value != '') {
            AjaxLoadTimes1('CabinetForm', 'action_ajax_form3.php');
        }
        else { document.getElementById("time_selector1").disabled = true; }


        return false;
    }
);



function AjaxLoadPlaces(ajax_form, url) {
    $.ajax({
        url: url,
        type: "POST",
        dataType: "html",
        data: $("#" + ajax_form).serialize(),
        success: function (response) {
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
function AjaxLoadPlaces1(ajax_form, url) {
    $.ajax({
        url: url,
        type: "POST",
        dataType: "html",
        data: $("#" + ajax_form).serialize(),
        success: function (response) {
            result = $.parseJSON(response);
            const select = document.getElementById('place_selector1');
            $(".place_options_class1").remove();
            document.querySelector('.place_list1').insertAdjacentElement('afterBegin', select);

            for (let index in result) {
                const content = result[index];
                const option = document.createElement('option');
                option.classList.add('place_options_class1');
                option.textContent = content;
                option.value = content;
                select.appendChild(option);
            }
            document.getElementById("place_selector1").disabled = false;
        }
    });
}

$("#place_selector").change(
    function () {
        if (document.getElementById("datepickerVak").value != '') {
            AjaxLoadTimes('CabinetForm', 'action_ajax_form3.php');
        }
        else { document.getElementById("time_selector").disabled = true; }
        document.getElementById("datepickerVak").disabled = false;
    }
);
$("#place_selector1").change(
    function () {
        if (document.getElementById("datepickerVak1").value != '') {
            AjaxLoadTimes1('CabinetForm', 'action_ajax_form8.php');
            document.getElementById("time_selector1").disabled = false;
        }
        else { document.getElementById("time_selector1").disabled = true; }

    }
);


$("#datepickerVak").change(
    function () {
        AjaxLoadTimes('CabinetForm', 'action_ajax_form3.php');
        var date = new Date(document.getElementById('datepickerVak').value);
        date.setDate(date.getDate() + 20);
        var Msg = date.getFullYear() + '.' + ('0' + (date.getMonth() + 1)).slice(-2) + '.' + ('0' + (date.getDate() + 1)).slice(-2);
        if (document.getElementById('city_selector1').value != '' && document.getElementById('place_selector1').value != '') {
            AjaxLoadTimes1('CabinetForm', 'action_ajax_form8.php');
            document.getElementById("time_selector1").disabled = false;
        }
        document.getElementById('datepickerVak1').value = Msg;

    }
);






$("#datepickerVak").change(
    function () {
        if (document.getElementById('datepickerVak').value != '') {
            document.getElementById("time_selector").disabled = false;
        }
        else { document.getElementById("time_selector").disabled = true; }
    }
);
// $("#datepickerVak").change(
//     function () {
//         if (document.getElementById('place_selector1').value != '' && document.getElementById('city_selector1').value != '') {
//             document.getElementById("time_selector1").disabled = false;
//             AjaxLoadTimes1('CabinetForm', 'action_ajax_form8.php');
//         }
//     }
// );





function AjaxLoadTimes(ajax_form, url) {
    $.ajax({
        url: url,
        type: "POST",
        dataType: "html",
        data: $("#" + ajax_form).serialize(),
        success: function (response) {
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
function AjaxLoadTimes1(ajax_form, url) {
    $.ajax({
        url: url,
        type: "POST",
        dataType: "html",
        data: $("#" + ajax_form).serialize(),
        success: function (response) {
            result = $.parseJSON(response);
            const select = document.getElementById('time_selector1');
            $(".time_options_class1").remove();
            document.querySelector('.time_list1').insertAdjacentElement('afterBegin', select);
            for (let index in result) {
                const content = result[index];
                const option = document.createElement('option');
                option.classList.add('time_options_class1');
                option.textContent = content;
                option.value = content;
                select.appendChild(option);
            }

        }
    });
}


