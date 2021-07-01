<?php
   if(isset($_POST['ser']) and isset($_POST['password']) and isset($_POST['pass2']) and $_POST['password']==$_POST['pass2']  )
    {
		
		$fam= trim(trim($_POST['fam']));
		$name= trim(trim($_POST['name']));
		$otch= trim(trim($_POST['otch']));
		$date= trim(trim($_POST['date']))	;	
        $login = trim($_POST['ser']);
		$code = trim($_POST['code']);
		$oms = trim($_POST['oms']);
		$phone = trim($_POST['phone']);
        $password = $_POST['password'];	
		$password=password_hash($password,PASSWORD_DEFAULT);
		$pass=$_POST['pass2'];
		

        $servername = "localhost";
        $uname = "root";
        $pword = "";
        $dbname = "vaccine";                  
        $link = mysqli_connect($servername, $uname, $pword, $dbname);
        
        $sql = "SELECT * FROM `accounts`";
        $result=mysqli_query($link,"INSERT INTO `accounts` (`passport`, `password`) VALUES ('$login', '$password');");

		echo "<script>window.location = \"first.php\"</script>";
        
            
                         
             echo "<script>$(\"#excp\").show();</script>";              
                        
            
    }    
?>