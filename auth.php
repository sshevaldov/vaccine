<!DOCTYPE html>
<html lang="en">

<head>
  <script src="lib/jquery-1.8.3.min.js" type="text/javascript" charset="utf-8"></script>
  <script src="src/jquery.maskedinput.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Добро пожаловать!</title>
  
</head>

    <script>
        window.onload = function() {
            switch (localStorage.getItem('mode')) {               
                case "dark":
                   document.body.style.backgroundColor = "#040040";
                    document.getElementById("e").checked = true;

                    break;
                default:
                    document.body.style.backgroundColor = "lightblue";
                    document.getElementById("e").checked = false;
            }
        }

       
        var mode;
        console.log(localStorage.getItem('mode'));

        function Page() {
            mode = localStorage.getItem('mode');
            if (mode == "dark") {
                TolightMode();
                console.log("TolightMode");
            } else {
                TodarkMode();
                console.log("TodarkMode");
            }
            console.log(mode);
        }
        function TodarkMode() {
            document.body.style.backgroundColor = "#040040";
            localStorage.setItem('mode', 'dark');
            mode = localStorage.getItem('mode');
        }

        function TolightMode() {
            document.body.style.backgroundColor = "lightblue";
            localStorage.setItem('mode', 'light');
            mode = localStorage.getItem('mode');
        }
    </script>
<body>
  
<div class="reating-arkows zatujgdsanuk">
 <input id="e" type="checkbox" onclick="Page()">
 <label for="e">
 <div class="trianglesusing" data-checked="Yes" data-unchecked="No"></div>
 <div class="moresharpened"></div>
 </label>
</div>

    
  <div class="table">
  
    <h1>Войти в личный кабинет</h1>
    <p id="excp" name="excp" hidden style="color: red;">Неверна серия, номер паспорта и/или пароль</p>
    <form method="post">
      <input id="passport" name="passport" type="text" value="" class="mask-pasport-number form-control rfield"
        placeholder="Серия, номер паспорта" required>
      <input id="password" type="password" class="rfield" name="password" value="" placeholder="Пароль" required>

      <button type="submit" id="button" class="btn_submit disabled">Войти</button>
    </form>
  </div>
  <div class="table-help">
    <a href="registration.php">Регистрация</a>
  </div>
  <script>
    $('.mask-pasport-number').mask('9999 999999');
  </script>
  <script type="text/javascript">
    $('document').ready(function () {
      $('#button').on('click', function () {     
        $('.table .rfield').each(function () {
          if ($(this).val() != '') {           
            $(this).removeClass('empty_field');
          } else {
            $(this).addClass('empty_field');
          }
        });
      });
    });
  </script>
  
  <?php
  require_once('php/funct.php');
  session_start();  
   if(isset($_POST['passport']) and isset($_POST['password']))
    {      
        $passport = $_POST['passport'];
        $password = $_POST['password'];        
        $link=dbconnect();               
        $sql = "SELECT * FROM `accounts`";
        $result=mysqli_query($link,$sql);     
        while($row = mysqli_fetch_array($result))
        {
            if((password_verify($password,$row['password'])) and ($passport == $row['passport']))
            {              
                $_SESSION['passport']=$row['passport'];              
                header('Location:cabinet.php');                    
            }
            else
            {             
             echo "<script>$(\"#excp\").show();</script>";           
            }            
        }      
    }    
?>
</body>

</html>