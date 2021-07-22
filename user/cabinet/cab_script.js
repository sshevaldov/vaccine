
$("#buttonSubmit").click(
    function () {
        if (document.getElementById('city_selector').value != '' &&
            document.getElementById('place_selector').value != '' &&
            document.getElementById('datepickerVak').value != '' &&
            document.getElementById('time_selector').value != '' &&
            document.getElementById('city_selector1').value != '' &&
            document.getElementById('place_selector1').value != '' &&
            document.getElementById('datepickerVak1').value != '' &&
            document.getElementById('time_selector1').value != '') {
            AjaxSendInputLabel('CabinetForm', 'action_ajax_form4.php');
            window.location = "label.php";
        }
        return false;
    }
);

function AjaxSendInputLabel(ajax_form, url) {//запись данных о вакцинациях в бд
    $.ajax({
        url: url,//скрипт-файл php
        type: "POST",//тип метода
        dataType: "html",//тип данных
        data: $("#" + ajax_form).serialize(),//собираем данные со страницы
        success: function () { }
    });
}

window.onload = AjaxShowStatus('CabinetForm', 'action_ajax_form5.php');//проверка статуса вакцинации при загрузке

function AjaxShowStatus(ajax_form, url) {//функция проверки статуса вакцинации пользователя
    $.ajax({
        url: url,//скрипт-файл php
        type: "POST",//тип метода
        dataType: "html",//тип данных
        data: $("#" + ajax_form).serialize(),//собираем данные со страницы
        success: function (response) {//действия при корректной отработке скрипта
            result = $.parseJSON(response);//получаем данные от php-скрипта      
            if (result.date != "0000-00-00") {//если дата первой вакцинации есть 
                $('#ErrorVaccinated').html(`Вакцинация недоступна.`);//Сообщение о недоступности записи на вакцинацию
                $("#buttonToList").show();//отображение кнопки для загрузки сертификата о прививке
                // блокировка элементов управления
                document.getElementById('city_selector').disabled = true;
                document.getElementById('city_selector1').disabled = true;
                document.getElementById('buttonSubmit').disabled = true;
            }
        }
    });
}

$("#city_selector").change(//при изменении города вакцинации
    function () {
        AjaxLoadPlaces('CabinetForm', 'action_ajax_form2.php');//фукциция подгрузки мест вакцинации по городу
        if (document.getElementById("datepickerVak").value != '') {//если указана дата вакцинации
            AjaxLoadTimes('CabinetForm', 'action_ajax_form3.php');//сразу подгружаем свободное время 
        }
        else {//если день вакцинации не задан
            document.getElementById("time_selector").disabled = true;//выбоо времени блокируется до выбора даты
        }
        document.getElementById("datepickerVak").disabled = false;//разблокируется календарь
        return false;//отмена перезагрузки
    }
);

function AjaxLoadTimes(ajax_form, url) {//функция подгрузки свободного времени вакцинации
    $.ajax({
        url: url,//скрипт-файл php
        type: "POST",//тип метода
        dataType: "html",//тип данных
        data: $("#" + ajax_form).serialize(),//собираем данные со страницы
        success: function (response) {//действия при корректной отработке скрипта
            result = $.parseJSON(response);//получение данных от php-скрипта
            const select = document.getElementById('time_selector');//обращаемся к селектору с временами
            $(".time_options_class").remove();//удаляем устарые значения селектора         
            for (let index in result) {//проход по полученному массиву
                const content = result[index];//содержимое ячейки селектора
                const option = document.createElement('option');//создаем ячейку селектора
                option.classList.add('time_options_class');//запись класса к созданной ячейке
                option.textContent = content;//запись содержимого в ячейку
                option.value = content;//запись значения в ячейку
                select.appendChild(option);//запись эелемента в конец
            }
        }
    });
}
function AjaxLoadPlaces(ajax_form, url) {//функция подгрузки мест вакцинации в городе
    $.ajax({
        url: url,//скрипт-файл php
        type: "POST",//тип метода
        dataType: "html",//тип данных
        data: $("#" + ajax_form).serialize(),//собираем данные со страницы
        success: function (response) {//если скрипт отработал
            result = $.parseJSON(response);//получение данных от php-скрипта
            const select = document.getElementById('place_selector');//обращение к селектору адресов
            $(".place_options_class").remove();//удаление старых записей в селекторе
            for (let index in result) {//проход по массиву
                const content = result[index];//содержимое ячейки селектора
                const option = document.createElement('option');//создаем ячейку
                option.classList.add('place_options_class');//запись класса к созданной ячейке
                option.textContent = content;//запись содержимого в ячейку
                option.value = content;//запись значения в ячейку
                select.appendChild(option);//запись эелемента в конец
            }
            document.getElementById("place_selector").disabled = false;//селектор дат разблокирован
        }
    });
}

$("#city_selector1").change(//изменен город второй вакцинации
    function () {
        AjaxLoadPlaces1('CabinetForm', 'action_ajax_form7.php');//подгрузка адресов в городе
        if (document.getElementById("datepickerVak1").value != '') {//если дата задана
            //   AjaxLoadTimes1('CabinetForm', 'action_ajax_form8.php');//то подгружаем времена
        }
        else { }
        document.getElementById("time_selector1").disabled = true;//если дата не задана, времена блокируются до установки даты
        return false;//отмена обновления
    }
);

function AjaxLoadPlaces1(ajax_form, url) {//функция подгрузки адресов по второй вакцинации
    $.ajax({
        url: url,//скрипт-файл php
        type: "POST",//тип метода
        dataType: "html",//тип данных
        data: $("#" + ajax_form).serialize(),//собираем данные со страницы
        success: function (response) {//если скрипт отработал
            result = $.parseJSON(response);//получение данных от php-скрипта
            const select = document.getElementById('place_selector1');//обращение к селектору адресов второй вакцинации
            $(".place_options_class1").remove();//удаление существующих значений
            for (let index in result) {//проход по массиву адресов
                const content = result[index];//содержимое ячейки селектора
                const option = document.createElement('option');//создаем ячейку
                option.classList.add('place_options_class1');//запись класса к созданной ячейке
                option.textContent = content;//запись содержимого в ячейку
                option.value = content;//запись значения в ячейку
                select.appendChild(option);//запись эелемента в конец
            }
            document.getElementById("place_selector1").disabled = false;//разблокировка селектора адресов
        }
    });
}

function AjaxLoadTimes1(ajax_form, url) {//функция подгрузки времен второй вакцинации
    $.ajax({
        url: url,//скрипт-файл php
        type: "POST",//тип метода
        dataType: "html",//тип данных
        data: $("#" + ajax_form).serialize(),//собираем данные со страницы
        success: function (response) {//если скрипт отработал
            result = $.parseJSON(response);//получение данных от php-скрипта
            const select = document.getElementById('time_selector1');//обращение к селектору времен
            $(".time_options_class1").remove();//удаление старых значений          
            for (let index in result) {//проход по массиву времен
                const content = result[index];//содержимое ячейки селектора
                const option = document.createElement('option');//создаем ячейку
                option.classList.add('time_options_class1');//запись класса к созданной ячейке
                option.textContent = content;//запись содержимого в ячейку
                option.value = content;//запись значения в ячейку
                select.appendChild(option);//запись эелемента в конец
            }
        }
    });
}

$("#place_selector").change(//изменение места первой вакцинации
    function () {
        if (document.getElementById("datepickerVak").value != '') {//если дата задана
            AjaxLoadTimes('CabinetForm', 'action_ajax_form3.php');//обновляем время
        }
        else {//если дата не задана
            document.getElementById("time_selector").disabled = true;//время блокируется
        }
        document.getElementById("datepickerVak").disabled = false;//календарь разблокируется
    }
);

//измение места второй вакцинации
//если дата не задана->ничего не происходит
//если дата задана
//то обновляем время

$("#place_selector1").change(//измение места второй вакцинации
    function () {
        if (document.getElementById("datepickerVak1").value != '') {//если дата задана
            AjaxLoadTimes1('CabinetForm', 'action_ajax_form8.php');//то обновляем время
            document.getElementById("time_selector1").disabled = false;//время разблокируется
        }
        else {
            document.getElementById("time_selector1").disabled = true;//иначе время блокируется
        }
    }
);

$("#datepickerVak").change(//если изменилась дата первой вакцинации
    function () {
        AjaxLoadTimes('CabinetForm', 'action_ajax_form3.php');//обновляем времена
        var date = new Date(document.getElementById('datepickerVak').value);//дата второй вакцинации
        date.setDate(date.getDate() + 20);//плюс 3 недели от первой вакцинации
        var Msg = date.getFullYear() + '.' + ('0' + (date.getMonth() + 1)).slice(-2) + '.' + ('0' + (date.getDate() + 1)).slice(-2);//дата во второй календарь
        //если заданы город и место второй вакцинации
        document.getElementById('datepickerVak1').value = Msg;//устанавливаем дату второй вакцинации
        if (document.getElementById('city_selector1').value != '' && document.getElementById('place_selector1').value != '') {

            AjaxLoadTimes1('CabinetForm', 'action_ajax_form8.php');//загружаем времена второй вакцинации
            document.getElementById("time_selector1").disabled = false;//времена второй вакцинации разблокируются
        }

    }
);

$("#datepickerVak").change(//изменилась дата первой вакцинации
    function () {
        if (document.getElementById('datepickerVak').value != '') {//если изменилась в ненулевое значение
            document.getElementById("time_selector").disabled = false;//времена разблокируются
        }
        else {
            document.getElementById("time_selector").disabled = true;//иначе блокируются
        }
    }
);


function get() {//функция установки глобальных переменных сессии
    AjaxLoadList('AdminCabinetForm', 'action_ajax_form6.php');
    window.location = "order_list.php";//перенаправление на вывод сертификата о прививке
}

function AjaxLoadList(ajax_form, url) {//функция установки глобальных переменных сессии
    $.ajax({
        url: url,//скрипт-файл php
        type: "POST",//тип метода
        dataType: "html",//тип данных
        data: $("#" + ajax_form).serialize(),//собираем данные со страницы
        success: function (response) {//если скрипт отработал
        }
    });
}




