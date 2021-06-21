<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
<!--<![endif]-->

<head>
  <script src="lib/jquery-1.8.3.min.js" type="text/javascript" charset="utf-8"></script>
  <script src="src/jquery.maskedinput.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Добро пожаловать!</title>
</head>

<body>


  <div class="table">
    <h1>Войти в личный кабинет</h1>

    <p><input id="ser" type="text" class="mask-pasport-number form-control rfield" placeholder="Серия, номер паспорта">
    </p>
    <script>
      $('.mask-pasport-number').mask('9999 999999');    
    </script>


    <p><input id="password" type="password" class="rfield" name="password" value="" placeholder="Пароль"></p>


    <button type="submit" id="button" class="btn_submit disabled">Войти</button>

  </div>

  <script type="text/javascript">
  
    $('document').ready(function () {
      $('#button').on('click', function () {
        var pass  = document.getElementById("password")
         var num  = document.getElementById("ser")
        $('.table .rfield').each(function () {
         
         
          if ($(this).val() != '') {
            console.log(32);        
            
            // Если поле не пустое удаляем класс-указание
            $(this).removeClass('empty_field');
          } else {
            console.log(33);
           
            // Если поле пустое добавляем класс-указание
            $(this).addClass('empty_field');
           
          }
          if (pass.value !='' && num.value!=''){
            location.href = 'cabinet.html';            
          }

         
        }); 
      }); 
    }); 
  </script>
  <div class="table-help">
    <a href="index.html">Регистрация</a>
  </div>
  <button type="button" id="btn">Button</button>
  <script>
    document.getElementById('btn').onclick = function(){
      var val=document.getElementById('ser').value;      
      alert(val);
    }
  </script>


<?php
$servername = "localhost";

$uname = "root";
$pword = "";
$dbname = "vaccine";
$conn = mysqli_connect($servername, $uname, $pword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<ul>
<?php for($i=1;$i<=5;$i++){ ?>
<li>Menu Item <?php echo $i; ?></li>
<?php } ?>


</body>

</html>