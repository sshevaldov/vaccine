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

<body>
  <div class="table">
    <h1>Войти в личный кабинет</h1>
    <p id="excp" name="excp" hidden style="color: red;">Неверна серия, номер паспорта и/или пароль</p>
    <form method="post">
      <input id="ser" name="ser" type="text" value="" class="mask-pasport-number form-control rfield"
        placeholder="Серия, номер паспорта" required>
      <input id="password" type="password" class="rfield" name="password" value="" placeholder="Пароль" required>

      <button type="submit" id="button" class="btn_submit disabled">Войти</button>
    </form>
  </div>
  <div class="table-help">
    <a href="index.php">Регистрация</a>
  </div>


  <style type="text/css">



  </style>


  <script>
    $('.mask-pasport-number').mask('9999 999999');
  </script>
  <script type="text/javascript">
    $('document').ready(function () {
      $('#button').on('click', function () {
        var pass = document.getElementById("password");
        var num = document.getElementById("ser");
        $('.table .rfield').each(function () {
          if ($(this).val() != '') {
            console.log(35);
            $(this).removeClass('empty_field');
          } else {
            console.log(36);
            $(this).addClass('empty_field');
          }
        });
      });
    });
  </script>

  <?php
  session_start();
  
   if(isset($_POST['ser']) and isset($_POST['password']))
    {
      
        $login = trim($_POST['ser']);
        $password = $_POST['password'];
     
        $servername = "localhost";
        $uname = "root";
        $pword = "";
        $dbname = "vaccine";                  
        $link = mysqli_connect($servername, $uname, $pword, $dbname);
        
        $sql = "SELECT * FROM `accounts`";
        $result=mysqli_query($link,"SELECT * FROM `accounts`");
      $flag=false;
    
        while($row = mysqli_fetch_array($result))
        {
            if((password_verify($password,$row['password'])) and ($login == $row['passport']))
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
  <div></div>
</body>

</html>