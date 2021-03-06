function get() {
    AjaxLoadList('AdminCabinetForm', 'action_ajax_form6.php');
    window.location = "order_list.php";
}

function get1() {
    AjaxLoadList('AdminCabinetForm', 'action_ajax_form6.php');
    window.location = "admin_topdf.php";
}

$(function() {
    $("#datepicker_startDate").datepicker({
        beforeShowDay: function(date) {
            var dayOfWeek = date.getDay();
            if (dayOfWeek == 0 || dayOfWeek == 6) {
                return [false];
            } else {
                return [true];
            }
        }
    });
});
$(function() {
    $("#datepicker_endDate").datepicker({
        beforeShowDay: function(date) {
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
    function() {
        min = document.getElementById('datepicker_startDate').value;

        $("#datepicker_endDate").datepicker("option", "minDate", min);
    }
);
$("#datepicker_endDate").change(
    function() {
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
        success: function(response) {

        }
    });
}

function AjaxLoadPlaces(ajax_form, url) {
    $.ajax({
        url: url,
        type: "POST",
        dataType: "html",
        data: $("#" + ajax_form).serialize(),
        success: function(response) {
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
    function() {
        AjaxLoadPlaces('AdminCabinetForm', 'action_ajax_form2.php');
        return false;
    }
);

$(function() {
    $.mask.definitions['~'] = '[]';
    $("#datepicker_startDate").datepicker().mask("~~.~~.~~", {
        placeholder: "????.????.????"
    });
});
$(function() {
    $.mask.definitions['~'] = '[]';
    $("#datepicker_endDate").datepicker().mask("~~.~~.~~", {
        placeholder: "????.????.????"
    });
});