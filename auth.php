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
<input type="checkbox" id="toggle" class="toggle--checkbox">
    <label for="toggle" class="toggle--label">
        <span class="toggle--label-background"></span>
    </label>
    <div class="background"></div>
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
  <style>:root {
  /** sunny side **/
  --blue-background: #C2E9F6;
  --blue-border: #72cce3;
  --blue-color: #96dcee;
  --yellow-background: #fffaa8;
  --yellow-border: #f5eb71;
  /** dark side **/
  --indigo-background: #808fc7;
  --indigo-border: #5d6baa;
  --indigo-color: #6b7abb;
  --gray-border: #e8e8ea;
  --gray-dots: #e8e8ea;
  /** general **/
  --white: #fff;
}

* {
  margin: 0;
  padding: 0;
}



.background {
  position: absolute;
  left: 0;
  top: 0;
  background: var(--blue-background);
  z-index: -1;
  width: 100%;
  height: 100%;
  transition: all 250ms ease-in;
}

.toggle--checkbox {
  display: none;
}
.toggle--checkbox:checked {
  /** This will all flip from sun to moon **/
  /** Change the label color **/
}
.toggle--checkbox:checked ~ .background {
  background: var(--indigo-background);
}
.toggle--checkbox:checked + .toggle--label {
  background: var(--indigo-color);
  border-color: var(--indigo-border);
  /** Change the cloud to stars **/
  /** Change the sun into the moon **/
  /** Show the dimples on the moon **/
}
.toggle--checkbox:checked + .toggle--label .toggle--label-background {
  left: 60px;
  width: 5px;
}
.toggle--checkbox:checked + .toggle--label .toggle--label-background:before {
  width: 5px;
  height: 5px;
  top: -25px;
}
.toggle--checkbox:checked + .toggle--label .toggle--label-background:after {
  width: 5px;
  height: 5px;
  left: -30px;
  top: 20px;
}
.toggle--checkbox:checked + .toggle--label:before {
  background: var(--white);
  border-color: var(--gray-border);
  animation-name: switch;
  animation-duration: 350ms;
  animation-fill-mode: forwards;
}
.toggle--checkbox:checked + .toggle--label:after {
  transition-delay: 350ms;
  opacity: 1;
}
.toggle--label {
  /** Placeholder element, starting at blue **/
  width: 200px;
  height: 100px;
  background: var(--blue-color);
  border-radius: 100px;
  border: 5px solid var(--blue-border);
  display: flex;
  position: relative;
  transition: all 350ms ease-in;
  /** The sun cloud and moon stars **/
  /** Sun/Moon element **/
  /** Gray dots on the moon **/
}
.toggle--label-background {
  width: 10px;
  height: 5px;
  border-radius: 5px;
  position: relative;
  background: var(--white);
  left: 135px;
  top: 45px;
  transition: all 150ms ease-in;
}
.toggle--label-background:before {
  content: "";
  position: absolute;
  top: -5px;
  width: 40px;
  height: 5px;
  border-radius: 5px;
  background: var(--white);
  left: -20px;
  transition: all 150ms ease-in;
}
.toggle--label-background:after {
  content: "";
  position: absolute;
  top: 5px;
  width: 40px;
  height: 5px;
  border-radius: 5px;
  background: var(--white);
  left: -10px;
  transition: all 150ms ease-in;
}
.toggle--label:before {
  animation-name: reverse;
  animation-duration: 350ms;
  animation-fill-mode: forwards;
  transition: all 350ms ease-in;
  content: "";
  width: 82px;
  height: 82px;
  border: 5px solid var(--yellow-border);
  top: 4px;
  left: 4px;
  position: absolute;
  border-radius: 82px;
  background: var(--yellow-background);
}
.toggle--label:after {
  transition-delay: 0ms;
  transition: all 250ms ease-in;
  position: absolute;
  content: "";
  box-shadow: var(--gray-dots) -13px 0 0 2px, var(--gray-dots) -24px 14px 0 -2px;
  left: 143px;
  top: 23px;
  width: 10px;
  height: 10px;
  background: transparent;
  border-radius: 50%;
  opacity: 0;
}

@keyframes switch {
  0% {
    left: 4px;
  }
  60% {
    left: 4px;
    width: 112px;
  }
  100% {
    left: 104px;
    width: 82px;
  }
}
@keyframes reverse {
  0% {
    left: 104px;
    width: 82px;
  }
  60% {
    left: 72px;
    width: 112px;
  }
  100% {
    left: 4px;
  }
}</style>
 
</body>

</html>