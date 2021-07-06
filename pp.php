<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button id="button" name="button" onclick=click(event)>click</button>
    <script>
   
		function onclick(event){
			event.preventDefault();
			var	name = $('#name').val();
			var	mobile = $('#mobile').val();
			var	address = $('#address').val();
			var	city = $('#city').val();
			$.ajax({
			    type: "POST",
			    url: "upload.php",
			    data: { name:name, mobile:mobile, address:address, city:city },		    
			    dataType: "json",
			    success: function(result){
			        alert("ok")			    }
			});
		};
	
    </script>
</body>
</html>