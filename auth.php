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





.toggle--checkbox {
  display: none;
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
 <style>
    .reating-arkows {
 position: relative;
}
.reating-arkows *, .reating-arkows *:before, .reating-arkows *:after {
 -moz-box-sizing: border-box;
 box-sizing: border-box;
  cursor:pointer;
}
.reating-arkows input[type="checkbox"] {
 opacity: 0;
 position: absolute;
 top: 0;
 left: 0;
}
.reating-arkows input[type="checkbox"][disabled] ~ label {
 pointer-events: none;
}
.reating-arkows input[type="checkbox"][disabled] ~ label .trianglesusing {
 opacity: 0.4;
}
.reating-arkows input[type="checkbox"]:checked ~ label .trianglesusing:before {
 content: attr(data-unchecked);
 left: 0;
}
.reating-arkows input[type="checkbox"]:checked ~ label .trianglesusing:after {
 content: attr(data-checked);
}
.reating-arkows label {
 -webkit-user-select: none;
 -moz-user-select: none;
 -ms-user-select: none;
 user-select: none;
 position: relative;
 display: -webkit-flex;
 display: -ms-flexbox;
 display: flex;
 -webkit-align-items: center;
 -ms-flex-align: center;
 align-items: center;
}
.reating-arkows label .moresharpened {
 -webkit-flex: 1;
 -ms-flex: 1;
 flex: 1;
 padding-left: 32px;
}
.reating-arkows label .trianglesusing {
 position: relative;
}
.reating-arkows label .trianglesusing:before {
 content: attr(data-checked);
 position: absolute;
 top: 0;
 text-transform: uppercase;
 text-align: center;
}
.reating-arkows label .trianglesusing:after {
 content: attr(data-unchecked);
 position: absolute;
 z-index: 5;
 text-transform: uppercase;
 text-align: center;
 background: white;
 -webkit-transform: translate3d(0, 0, 0);
 transform: translate3d(0, 0, 0);
}
.reating-arkows input[type="checkbox"][disabled] ~ label {
 color: rgba(119, 119, 119, 0.5);
}
.reating-arkows input[type="checkbox"]:focus ~ label .trianglesusing, .reating-arkows input[type="checkbox"]:hover ~ label .trianglesusing {
 background-color: var(--blue-color);
}
.reating-arkows input[type="checkbox"]:focus ~ label .trianglesusing:after, .reating-arkows input[type="checkbox"]:hover ~ label .trianglesusing:after {
 color: #484242;
}
.reating-arkows input[type="checkbox"]:hover ~ label {
 color: #615b5b;
}
.reating-arkows input[type="checkbox"]:checked ~ label:hover {
 color: var(--indigo-color);
}
.reating-arkows input[type="checkbox"]:checked ~ label .trianglesusing {
  background-color: var(--indigo-color);
  border: 30px var(--indigo-border);
}
.reating-arkows input[type="checkbox"]:checked ~ label .trianglesusing:after {
 color: #6b7abb;
}
.reating-arkows input[type="checkbox"]:checked:focus ~ label .trianglesusing, .reating-arkows input[type="checkbox"]:checked:hover ~ label .trianglesusing {
 background-color: var(--indigo-color);
}
.reating-arkows input[type="checkbox"]:checked:focus ~ label .trianglesusing:after, .reating-arkows input[type="checkbox"]:checked:hover ~ label .trianglesusing:after {
 color: var(--indigo-color);
}
.reating-arkows label .moresharpened {
 -webkit-flex: 1;
 -ms-flex: 1;
 flex: 1;
}
.reating-arkows label .trianglesusing {
 -webkit-transition: background-color 0.3s cubic-bezier(0, 1, 0.5, 1);
 transition: background-color 0.3s cubic-bezier(0, 1, 0.5, 1);
 background: #736d6d;
}
.reating-arkows label .trianglesusing:before {
 color: rgba(255, 255, 255, 0.5);
}
.reating-arkows label .trianglesusing:after {
 -webkit-transition: -webkit-transform 0.3s cubic-bezier(0, 1, 0.5, 1);
 transition: transform 0.3s cubic-bezier(0, 1, 0.5, 1);
 color: #6b6565;
}
.reating-arkows input[type="checkbox"]:focus ~ label .trianglesusing:after, .reating-arkows input[type="checkbox"]:hover ~ label .trianglesusing:after {
 box-shadow: 0 3px 3px rgba(0, 0, 0, 0.4);
}
.reating-arkows input[type="checkbox"]:checked ~ label .trianglesusing:after {
 -webkit-transform: translate3d(65px, 0, 0);
 transform: translate3d(65px, 0, 0);
}
.reating-arkows input[type="checkbox"]:checked:focus ~ label .trianglesusing:after, .reating-arkows input[type="checkbox"]:checked:hover ~ label .trianglesusing:after {
 box-shadow: 0 3px 3px rgba(0, 0, 0, 0.4);
}
.reating-arkows label {
 font-size: 14px;
}
.reating-arkows label .trianglesusing {
 height: 36px;
 -webkit-flex: 0 0 134px;
 -ms-flex: 0 0 134px;
 flex: 0 0 134px;
 border-radius: 4px;
}
.reating-arkows label .trianglesusing:before {
 left: 67px;
 font-size: 12px;
 line-height: 36px;
 width: 67px;
 padding: 0 12px;
}
.reating-arkows label .trianglesusing:after {
 top: 2px;
 left: 2px;
 border-radius: 2px;
 width: 65px;
 line-height: 32px;
 font-size: 12px;
}
.reating-arkows label .trianglesusing:hover:after {
 box-shadow: 0 3px 3px rgba(0, 0, 0, 0.4);
}
.reating-arkows.twokadjacent input[type="checkbox"]:focus ~ label .trianglesusing:after, .reating-arkows.twokadjacent input[type="checkbox"]:hover ~ label .trianglesusing:after {
 box-shadow: 0 2px 2px rgba(0, 0, 0, 0.4);
}
.reating-arkows.twokadjacent input[type="checkbox"]:checked ~ label .trianglesusing:after {
 -webkit-transform: translate3d(44px, 0, 0);
 transform: translate3d(44px, 0, 0);
}
.reating-arkows.twokadjacent input[type="checkbox"]:checked:focus ~ label .trianglesusing:after, .reating-arkows.twokadjacent input[type="checkbox"]:checked:hover ~ label .trianglesusing:after {
 box-shadow: 0 2px 2px rgba(0, 0, 0, 0.4);
}
.reating-arkows.twokadjacent label {
 font-size: 13px;
}
.reating-arkows.twokadjacent label .trianglesusing {
 height: 28px;
 -webkit-flex: 0 0 90px;
 -ms-flex: 0 0 90px;
 flex: 0 0 90px;
 border-radius: 2px;
}
.reating-arkows.twokadjacent label .trianglesusing:before {
 left: 45px;
 font-size: 10px;
 line-height: 28px;
 width: 45px;
 padding: 0 12px;
}
.reating-arkows.twokadjacent label .trianglesusing:after {
 top: 1px;
 left: 1px;
 border-radius: 1px;
 width: 44px;
 line-height: 26px;
 font-size: 10px;
}
.reating-arkows.twokadjacent label .trianglesusing:hover:after {
 box-shadow: 0 2px 2px rgba(0, 0, 0, 0.4);
}
.reating-arkows.transparentin input[type="checkbox"]:focus ~ label .trianglesusing:after, .reating-arkows.transparentin input[type="checkbox"]:hover ~ label .trianglesusing:after {
 box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
}
.reating-arkows.transparentin input[type="checkbox"]:checked ~ label .trianglesusing:after {
 -webkit-transform: translate3d(78px, 0, 0);
 transform: translate3d(78px, 0, 0);
}
.reating-arkows.transparentin input[type="checkbox"]:checked:focus ~ label .trianglesusing:after, .reating-arkows.transparentin input[type="checkbox"]:checked:hover ~ label .trianglesusing:after {
 box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
}
.reating-arkows.transparentin label {
 font-size: 14px;
}
.reating-arkows.transparentin label .trianglesusing {
 height: 50px;
 -webkit-flex: 0 0 160px;
 -ms-flex: 0 0 160px;
 flex: 0 0 160px;
 border-radius: 4px;
}
.reating-arkows.transparentin label .trianglesusing:before {
 left: 80px;
 font-size: 14px;
 line-height: 50px;
 width: 80px;
 padding: 0 12px;
}
.reating-arkows.transparentin label .trianglesusing:after {
 top: 2px;
 left: 2px;
 border-radius: 2px;
 width: 78px;
 line-height: 46px;
 font-size: 14px;
}
.reating-arkows.transparentin label .trianglesusing:hover:after {
 box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
}
.reating-arkows.imagexplains input[type="checkbox"][disabled] ~ label {
 color: rgba(181, 62, 116, 0.5);
}
.reating-arkows.imagexplains input[type="checkbox"]:focus ~ label .trianglesusing, .reating-arkows.imagexplains input[type="checkbox"]:hover ~ label .trianglesusing {
 background-color: #b53e74;
}
.reating-arkows.imagexplains input[type="checkbox"]:focus ~ label .trianglesusing:after, .reating-arkows.imagexplains input[type="checkbox"]:hover ~ label .trianglesusing:after {
 color: #82224d;
}
.reating-arkows.imagexplains input[type="checkbox"]:hover ~ label {
 color: #8e2a58;
}
.reating-arkows.imagexplains input[type="checkbox"]:checked ~ label:hover {
 color: #2d825c;
}
.reating-arkows.imagexplains input[type="checkbox"]:checked ~ label .trianglesusing {
 background-color: #379a6e;
}
.reating-arkows.imagexplains input[type="checkbox"]:checked ~ label .trianglesusing:after {
 color: #368a65;
}
.reating-arkows.imagexplains input[type="checkbox"]:checked:focus ~ label .trianglesusing, .reating-arkows.imagexplains input[type="checkbox"]:checked:hover ~ label .trianglesusing {
 background-color: #3d9c72;
}
.reating-arkows.imagexplains input[type="checkbox"]:checked:focus ~ label .trianglesusing:after, .reating-arkows.imagexplains input[type="checkbox"]:checked:hover ~ label .trianglesusing:after {
 color: #2f7757;
}
.reating-arkows.imagexplains label .moresharpened {
 -webkit-flex: 1;
 -ms-flex: 1;
 flex: 1;
}
.reating-arkows.imagexplains label .trianglesusing {
 -webkit-transition: background-color 0.3s ease-in-out;
 transition: background-color 0.3s ease-in-out;
 background: #c14b81;
}
.reating-arkows.imagexplains label .trianglesusing:before {
 color: rgba(255, 255, 255, 0.6);
}
.reating-arkows.imagexplains label .trianglesusing:after {
 -webkit-transition: -webkit-transform 0.3s ease-in-out;
 transition: transform 0.3s ease-in-out;
 color: #b53e74;
}
.reating-arkows.zatujgdsanuk input[type="checkbox"][disabled] ~ label {
 color: rgba(68, 68, 68, 0.5);
}
.reating-arkows.zatujgdsanuk input[type="checkbox"]:focus ~ label .trianglesusing, .reating-arkows.zatujgdsanuk input[type="checkbox"]:hover ~ label .trianglesusing {
 background-color: ##96dcee;
}
.reating-arkows.zatujgdsanuk input[type="checkbox"]:focus ~ label .trianglesusing:after, .reating-arkows.zatujgdsanuk input[type="checkbox"]:hover ~ label .trianglesusing:after {
 color: #2b2b2b;
}
.reating-arkows.zatujgdsanuk input[type="checkbox"]:hover ~ label {
 color: #373737;
}
.reating-arkows.zatujgdsanuk input[type="checkbox"]:checked ~ label:hover {
 color: var(--indigo-color);
}
.reating-arkows.zatujgdsanuk input[type="checkbox"]:checked ~ label .trianglesusing {
 background-color: #6b7abb;
 border: 5px solid var(--indigo-border);
}
.reating-arkows.zatujgdsanuk input[type="checkbox"]:checked ~ label .trianglesusing:after {
 color: #6b7abb;
}
.reating-arkows.zatujgdsanuk input[type="checkbox"]:checked:focus ~ label .trianglesusing, .reating-arkows.zatujgdsanuk input[type="checkbox"]:checked:hover ~ label .trianglesusing {
 background-color: var(--indigo-color);
}
.reating-arkows.zatujgdsanuk input[type="checkbox"]:checked:focus ~ label .trianglesusing:after, .reating-arkows.zatujgdsanuk input[type="checkbox"]:checked:hover ~ label .trianglesusing:after {
 color: var(--indigo-color);
}
.reating-arkows.zatujgdsanuk label .moresharpened {
 -webkit-flex: 1;
 -ms-flex: 1;
 flex: 1;
}
.reating-arkows.zatujgdsanuk label .trianglesusing {
 -webkit-transition: background-color 0.3s cubic-bezier(0.86, 0, 0.07, 1);
 transition: background-color 0.3s cubic-bezier(0.86, 0, 0.07, 1);
 background: var(--blue-color);
 border: 5px solid var(--blue-border);
}
.reating-arkows.zatujgdsanuk label .trianglesusing:before {
 color: rgba(255, 255, 255, 0.7);
}
.reating-arkows.zatujgdsanuk label .trianglesusing:after {
 -webkit-transition: -webkit-transform 0.3s cubic-bezier(0.86, 0, 0.07, 1);
 transition: transform 0.3s cubic-bezier(0.86, 0, 0.07, 1);
 color: #444;
}
.reating-arkows.zatujgdsanuk input[type="checkbox"]:focus ~ label .trianglesusing:after, .reating-arkows.zatujgdsanuk input[type="checkbox"]:hover ~ label .trianglesusing:after {
 box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
}
.reating-arkows.zatujgdsanuk input[type="checkbox"]:checked ~ label .trianglesusing:after {
 -webkit-transform: translate3d(58px, 0, 0);
 transform: translate3d(58px, 0, 0);
}
.reating-arkows.zatujgdsanuk input[type="checkbox"]:checked:focus ~ label .trianglesusing:after, .reating-arkows.zatujgdsanuk input[type="checkbox"]:checked:hover ~ label .trianglesusing:after {
 box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
}
.reating-arkows.zatujgdsanuk label {
 font-size: 13px;
}
.reating-arkows.zatujgdsanuk label .trianglesusing {
 height: 60px;
 -webkit-flex: 0 0 120px;
 -ms-flex: 0 0 120px;
 flex: 0 0 120px;
 border-radius: 60px;
}
.reating-arkows.zatujgdsanuk label .trianglesusing:before {
 left: 60px;
 font-size: 13px;
 line-height: 60px;
 width: 60px;
 padding: 0 12px;
}
.reating-arkows.zatujgdsanuk label .trianglesusing:after {
 top: 2px;
 left: 2px;
 border-radius: 30px;
 width: 58px;
 line-height: 56px;
 font-size: 13px;
}
.reating-arkows.zatujgdsanuk label .trianglesusing:hover:after {
 box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
}
  </style>
</body>

</html>