<?php include('db.php');
?><p>ошибка1</p>
<?php
if(isset($_POST['ser']) and isset($_POST['password']))
    {
        ?><p>ошибка1</p>
               <?php
        $login = trim($_POST['ser']);
        $password = $_POST['password'];
        echo 'Entry Added';
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
                echo '<script>window.location.href = "index.php";</script>';              
            }
            else
            {
              print ("<p>$password</p>")       
              echo '<script>window.location.href = "index.php";</script>';           
            }
        }                
    }
?>        