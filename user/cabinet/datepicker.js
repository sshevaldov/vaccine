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

