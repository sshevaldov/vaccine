$.datepicker.regional['ru'] = {
    dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
    dateFormat: 'dd.mm.yy',
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
            dateFormat: 'dd.mm.yy',
            changeMonth: true,
            changeYear: true,
            maxDate: 0,
            maxYear: 0,
            showAnim: "fold",
            yearRange: '1900:2030',
            firstDay: 1
        })
        .mask("~~.~~.~~~~", {
            placeholder: "дд.мм.гггг"
        });
});

function limitInput(_k, obj) {
    obj.value = obj.value.replace(/[^а-яА-ЯёЁ -]/ig, '');
}