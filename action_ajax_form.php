<?php

if (isset($_POST["passport"]) фтв isset($_POST["password"])) { 
    
    $servername = "localhost";
    $uname = "root";
    $pword = "";
    $dbname = "vaccine";    
$rows1=0;
    $link=mysqli_connect($servername, $uname, $pword, $dbname);  			
    $sql = "SELECT * FROM `accounts` where `passport`='{$_POST["passport"]}'";
    $result=mysqli_query($link,$sql);    
    $rows = mysqli_num_rows($result);
    if($rows!=0){//если строки с логином(паспортом) существуют, то...
    $sql = "SELECT * FROM `accounts` where `passport`='{$_POST["passport"]}' and `password`='{$_POST["password"]}'";
    $result1=mysqli_query($link,$sql);    
    $rows1 = mysqli_num_rows($result);//кол-во строк, где логин и пароль сопали
}


	// Формируем массив для JSON ответа
    $result = array(
    	'name' => $rows, 	
        'vallog' =>$rows1
    ); 

    // Переводим массив в JSON
    echo json_encode($result); 
}

?>