$.datepicker.setDefaults($.datepicker.regional['ru'] = {
    dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
    dateFormat: 'yy.mm.dd',
    monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
    firstDay: 1,
    changeMonth: true,
    changeYear: true,
    maxDate: -1,
    yearRange: '2021'
});
$.datepicker.datepicker({
    beforeShowDay: function (date) {
        var dayOfWeek = date.getDay();
        if (dayOfWeek == 0 || dayOfWeek == 6) {
            return [false];
        } else {
            return [true];
        }
    }
});