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
  <link rel="stylesheet" type="text/css" href="style.css">
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
  <?php
function add($a,$b){
  $c=$a+$b;
  return $c;
}

?>
  <script type="text/javascript">
  console.log(31);  
    $('document').ready(function () {console.log(31);  
      $('#button').on('click', function () {console.log(31);  
        var pass  = document.getElementById("password");console.log(31);  
         var num  = document.getElementById("ser");
         console.log(31);   
         var ps=pass.value;
         
  var phpadd= "<?php echo sql_exec("1111 111111","admin");?>" //call the php add function

         alert(phpadd);
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
          /*if (pass.value !='' && num.value!=''){
            location.href = 'cabinet.php';            
          }*/
         

         
        }); 
      }); 
    }); 
  </script>
  <div class="table-help">
    <a href="index.php">Регистрация</a>
  </div>
<?php
  function sql_exec($login,$password){
    $servername = "localhost";
    $uname = "root";
    $pword = "";
    $dbname = "vaccine";

    $conn = mysqli_connect($servername, $uname, $pword, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql="SELECT * FROM users where password=$password"; 
    $result=mysqli_query($conn,"SELECT password FROM users where password='$password'");  
    mysqli_num_rows($result);
    
   $row = mysqli_fetch_array($result);
    $total = $row[0];
    
    mysqli_close($conn);
    return $total;
    

  }
 
    ?>
</body>

</html>