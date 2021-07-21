$('.mask-pasport-division').mask('999-999');
	$('.mask-phone').mask('+7 (999) 999-99-99');
	$('.mask-pasport-number').mask('9999 999999');
	$('.number').mask("9999 9999 9999 9999", {
		placeholder: "**** **** **** ****"
	})


    $(function () {
        $.mask.definitions['~'] = '[]';
        $("#datepicker")
            .mask("~~.~~.~~", {
                placeholder: "гг.мм.дд"
            });
    });
    