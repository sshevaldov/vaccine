<?php
  $firstName = $_POST['ser']; // создаем переменную firstName, которая содержит переданные скрипту через HTTP метод POST данные (с ключом firstName)
  $lastName = $_POST['password']; // создаем переменную lastName, которая содержит переданные скрипту через HTTP метод POST данные (с ключом lastName)
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
          if(($password==$row['password']) and ($login == $row['passport']))
          {             
              header('Location:cabinet.php');  
                    
          }
          else
          {
            print ("<p>$password</p>");
            
          
           

          }
      }        
  }
  
 
?>