function ToList() {
    AjaxLoadList('AdminCabinetForm', 'AjaxSetSessionVars.php');
    window.location = "list_tolist.php";
}

function ToPdf() {
    a = document.getElementById("period_selector").value;
    switch (a) {
        case "dayy":
            if (document.getElementById("dayy").value != '') {
                AjaxLoadList('AdminCabinetForm', 'AjaxSetSessionVars.php');
                window.location = "list_topdf.php";
            }
            break;
        default:
            AjaxLoadList('AdminCabinetForm', 'AjaxSetSessionVars.php');
            window.location = "list_topdf.php";
    }
}

$(function () {
    $("#datepicker_startDate").datepicker({
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
$(function () {
    $("#dayy").datepicker({
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
$(function () {
    $("#datepicker_endDate").datepicker({
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
$(function () {
    $("#datepicker_day").datepicker({
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
$("#datepicker_startDate").change(
    function () {
        min = document.getElementById('datepicker_startDate').value;
        $("#datepicker_endDate").datepicker("option", "minDate", min);
    }
);
$("#datepicker_endDate").change(
    function () {
        var max = document.getElementById('datepicker_endDate').value;
        $("#datepicker_startDate").datepicker("option", "maxDate", max);
    }
);

function AjaxLoadList(ajax_form, url) {
    $.ajax({
        url: url,
        type: "POST",
        dataType: "html",
        data: $("#" + ajax_form).serialize(),
        success: function (response) {

        }
    });
}

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
$("#city_selector").change(
    function () {
        AjaxLoadPlaces('AdminCabinetForm', 'AjaxLoadPlaces.php');
        return false;
    }
);

$("#period_selector").change(
    function () {
        a = document.getElementById("period_selector").value;

        switch (a) {
            case "dayy":
                $("#dayyp").show();
                document.getElementById("dayyp").style.display = 'flex';

                document.getElementById("dayyp").disabled = true;
                document.getElementById("per_date").style.display = 'none';
                break;
            case "pper":
                $("#datepicker_day").show();
                document.getElementById("per_date").style.display = 'flex';

                document.getElementById("per_date").disabled = true;
                document.getElementById("dayyp").style.display = 'none';
                break;
            default:
                document.getElementById("per_date").style.display = 'none';
                document.getElementById("dayyp").style.display = 'none';

        }
        return false;
    }
);

$(function () {
    $.mask.definitions['~'] = '[]';
    $("#datepicker_startDate").datepicker().mask("~~.~~.~~", {
        placeholder: "гг.мм.дд"
    });
});
$(function () {
    $.mask.definitions['~'] = '[]';
    $("#datepicker_endDate").datepicker().mask("~~.~~.~~", {
        placeholder: "гг.мм.дд"
    });
});
$(function () {
    $.mask.definitions['~'] = '[]';
    $("#datepicker_day").datepicker().mask("~~.~~.~~", {
        placeholder: "гг.мм.дд"
    });
});
$(function () {
    $.mask.definitions['~'] = '[]';
    $("#dayy").datepicker().mask("~~.~~.~~", {
        placeholder: "гг.мм.дд"
    });
});