$('document').ready(function () {
    $('#buttonSubmit').on('click', function () {
        $('.table .rfield').each(function () {
            if ($(this).val() != '' && $(this).val() != null) {
                console.log(32);
                // Если поле не пустое удаляем класс-указание
                $(this).removeClass('empty_field');
            } else {
                console.log(33);
                // Если поле пустое добавляем класс-указание
                $(this).addClass('empty_field');
            }
        });
    });
});
$(function () {
    $.mask.definitions['~'] = '[]';
    $("#datepicker")
        .mask("~~.~~.~~", {
            placeholder: "дд.мм.гггг"
        });
});
$.datepicker.regional['ru'] = {
    closeText: 'Закрыть',
    prevText: 'Предыдущий',
    nextText: 'Следующий',
    dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
    dateFormat: 'dd.mm.yy',
    monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
    firstDay: 1,
    changeMonth: true,
    changeYear: true,
    minDate: 0,
    yearRange: '2021:2021'
};
$.datepicker.setDefaults($.datepicker.regional['ru']);
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
window.onload = function () {
    switch (localStorage.getItem('mode')) {
        case "dark":
            document.body.style.backgroundColor = "#040040";
            document.getElementById("e").checked = true;
            break;
        default:
            document.body.style.backgroundColor = "lightblue";
            document.getElementById("e").checked = false;
    }
}
var mode;
console.log(localStorage.getItem('mode'));

function Page() {
    mode = localStorage.getItem('mode');
    if (mode == "dark") {
        TolightMode();
        console.log("TolightMode");
    } else {
        TodarkMode();
        console.log("TodarkMode");
    }
    console.log(mode);
}

function TodarkMode() {
    document.body.style.backgroundColor = "#040040";
    localStorage.setItem('mode', 'dark');
    mode = localStorage.getItem('mode');
}

function TolightMode() {
    document.body.style.backgroundColor = "lightblue";
    localStorage.setItem('mode', 'light');
    mode = localStorage.getItem('mode');
}