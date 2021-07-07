<?php

if (isset($_POST["passport"]) && isset($_POST["password"])) { 
    
  

    $servername = "localhost";
    $uname = "root";
    $pword = "";
    $dbname = "vaccine";    
    $psw=0;
    $link=mysqli_connect($servername, $uname, $pword, $dbname);  			
    $sql = "SELECT * FROM `accounts` where `passport`='{$_POST["passport"]}'";
    $result=mysqli_query($link,$sql);    
    $rows = mysqli_num_rows($result);   
    if($rows!=0) //если есть строки с подходящим логином
    {
       while($row = mysqli_fetch_array($result))
        {
            if((password_verify($_POST["password"],$row['password'])))
            {              
                $psw=1;               
            }                      
        } 
    }
	// Формируем массив для JSON ответа
    $result = array(
    	'name' => $rows,
        'psw' => $psw,
        'h' =>password_hash("{$_POST["password"]}",PASSWORD_DEFAULT);
    ); 

    // Переводим массив в JSON
    echo json_encode($result); 
}

?>