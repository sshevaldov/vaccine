<?php

if (isset($_POST["passport"])) { 
    
    $servername = "localhost";
    $uname = "root";
    $pword = "";
    $dbname = "vaccine";    

    $link=mysqli_connect($servername, $uname, $pword, $dbname);  			
    $sql = "SELECT * FROM `accounts` where `passport`='{$_POST["passport"]}'";
    $result=mysqli_query($link,$sql);    
    $rows = mysqli_num_rows($result);

	// Формируем массив для JSON ответа
    $result = array(
    	'name' => $rows    	
    ); 

    // Переводим массив в JSON
    echo json_encode($result); 
}

?>