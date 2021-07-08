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
$('.number').mask("9999 9999 9999 9999", {
    placeholder: "**** **** **** ****"
})
$('.mask-pasport-number').mask('9999 999999');
$('.mask-pasport-division').mask('999-999');
$('.mask-phone').mask('+7 (999) 999-99-99');
$('document').ready(function () {
    $('#buttonRegistration').on('click', function () {
        var pass = document.getElementById("password");
        var num = document.getElementById("ser");
        $('.table .rfield').each(function () {
            if ($(this).val() != '') {
                console.log(35);
                $(this).removeClass('empty_field');
            } else {
                console.log(36);
                $(this).addClass('empty_field');
            }
        });
    });
});