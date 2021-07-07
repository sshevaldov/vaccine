
/* Article FructCode.com */
$( document ).ready(function() {
    $("#button").click(
		function(){		
			sendAjaxForm('result_form', 'ajax_form', 'action_ajax_form.php');
			return false;						
		}
	);
});
 
function sendAjaxForm(result_form, ajax_form, url) {
    $.ajax({
        url:     url, //url страницы (action_ajax_form.php)
        type:     "POST", //метод отправки
        dataType: "html", //формат данных
        data: $("#"+ajax_form).serialize(),  // Сеарилизуем объект
        success: function(response) { //Данные отправлены успешно
        	result = $.parseJSON(response);
			log=document.getElementById('passport').value;
			pass=document.getElementById('password').value;	
			$('#result_form').html('Имя: '+result.name+'<br>Телефон: '+result.psw+'<br>Телефон: '+result.h);	
			
			if(log !='' && pass !='')
			if(result.name==0 )
			{	$("#excp").show();  }
			else if(result.psw==0) 
			{
				$("#excp").hide(); 
				$("#excp1").show();	
			} else {$("#excp1").hide(); 
			$("#excp2").show();	}
			  
    	},
    	error: function(response) { // Данные не отправлены
            $('#excp').html('Ошибка. Данные не отправлены.');
    	}
 	});
}