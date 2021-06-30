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
                  <form method="post" >
                  <p><input id="ser" name="ser" type="text" class="mask-pasport-number form-control rfield" placeholder="Серия, номер паспорта">
                  </p>
                  <script>
                    $('.mask-pasport-number').mask('9999 999999');
                  </script>
                  <p><input id="password" type="password" class="rfield" name="password" value="" placeholder="Пароль"></p>
                  <button type="submit" id="button" class="btn_submit disabled">Войти</button>
                  </form>                  
              </div>
              
              <!--<script type="text/javascript">
                  $('document').ready(function () {                  
                    $('#button').on('click', function () {                      
                      var pass = document.getElementById("password"); 
                      var num = document.getElementById("ser");                                        
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
                        location.href = 'cabinet.php';            
                        }                    
                      });
                    });
                  });
              </script>-->
              <div class="table-help">
                  <a href="index.php">Регистрация</a>
              </div>
              <?php
                  /*function sql_exec($login,$password){

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
                    $row = mysqli_fetch_array($result);
                    $total = $row[0];    
                    mysqli_close($conn);
                    return $total;  }*/
               
    if(isset($_POST['ser']) and isset($_POST['password']))
    {
        $login = trim($_POST['ser']);
        $password = $_POST['password'];

        $servername = "localhost";
                    $uname = "root";
                    $pword = "";
                    $dbname = "vaccine";                  
                    $link = mysqli_connect($servername, $uname, $pword, $dbname);
        
        $sql = "SELECT * FROM `users`";
        $result=mysqli_query($link,"SELECT * FROM `users`");

        while($row = mysqli_fetch_array($result))
        {
            if((password_verify($password, $row['password']) == true) and ($login == $row['passport']))
            {
                echo '<script>window.location.href = "index.php";</script>';
                header("Location:index.php");
                print ("<p>$password</p>")
                ?>
                
<p>верно</p>
               <?php
            }
            else
            {
              print ("<p>$password</p>")
               ?>
<p>ошибка</p>
               <?php
            }
        }
    }
?>                    
            </body>
        </html>