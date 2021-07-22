$("#buttonToAdminCabinet").click(
    function () {
        $('.table .rfield').each(function () {
            if ($(this).val() != '') {
                $(this).removeClass('empty_field');
            } else {
                $(this).addClass('empty_field');
                $("#LoginErrorMessage").html('');
            }
        });
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
$('#buttonRegistration').on('click', function () {
    $('.table .rfield').each(function () {
        if ($(this).val() != '') {
            $(this).removeClass('empty_field');
        } else {
            $(this).addClass('empty_field');
        }
    });
});
$('#buttonSubmit').on('click', function () {
    $('.table .rfield').each(function () {
        if ($(this).val() != '' && $(this).val() != null) {
            $(this).removeClass('empty_field');
        } else {
            $(this).addClass('empty_field');
        }
    });
});
