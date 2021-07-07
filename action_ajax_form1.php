<?php
require_once('php/funct.php');
if (isset($_POST['ser']) and isset($_POST['password']) and isset($_POST['fam']) and isset($_POST['name']) and isset($_POST['date']) and isset($_POST['code']) and isset($_POST['omc']) and isset($_POST['phone'])) { 

  $servername = "localhost";
    $uname = "root";
    $pword = "";
    $dbname = "vaccine"; 
    $link=mysqli_connect($servername, $uname, $pword, $dbname);  			
    $sql = "SELECT * FROM `accounts` where `passport`='{$_POST["ser"]}'";
    $result=mysqli_query($link,$sql);    
    $rows = mysqli_num_rows($result);
    if ($rows==0)   //созданяем
    {
      	$name= (trim($_POST['name']));
				$otch="отсутствует";
				if (isset($_POST['otch'])){
					$otch= (trim($_POST['otch']));
					if ($otch=="") {$otch="-";}
				}
				$_SESSION['fam']= (trim($_POST['fam']));				
				$date=trim($_POST['date']);	
				$code = trim($_POST['code']);
				$phone = trim($_POST['phone']);
				$login = ($_POST['ser']);				
				$oms = trim($_POST['omc']);
				
				$password = $_POST['password'];	
				$password=password_hash($password,PASSWORD_DEFAULT);
						
				
        mysqli_set_charset($link, "utf8");
        $sql="INSERT INTO `users`(`name`, `secondname`, `surname`, `birthdate`, `district_code`, `phone`, `passport`, `oms`) VALUES ('$name','$otch','{$_SESSION['fam']}','$date','$code','$phone','$login','$oms');";
        $result=mysqli_query($link,$sql);				
      
        $sql="INSERT INTO `accounts` (`passport`, `password`) VALUES ('$login', '$password');";
        $result=mysqli_query($link,$sql);			
        echo "    all is good    ";
				
								
			  

    }
	// Формируем массив для JSON ответа
    $result = array(
    	'name' => $_POST['password']   
    ); 

    // Переводим массив в JSON
    echo json_encode($result); 
}

?>