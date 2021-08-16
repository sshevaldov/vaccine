$('#buttonToAdminCabinet').on('click', function () {
    RedError();
});
$('#buttonToCabinet').on('click', function () {
    RedError();
});
$('#buttonRegistration').on('click', function () {
    RedError();
});
$('#buttonSubmit').on('click', function () {
    RedError();
});
$('#buttonToGrid').on('click', function () {
    RedError();
});




//функция подсветки поля красным если оно пустое
function RedError() {
    $('.table .rfield').each(function () {
        if ($(this).val() != '' && $(this).val() != null) {
            $(this).removeClass('empty_field');
        } else {
            $(this).addClass('empty_field');
        }
    });
}
