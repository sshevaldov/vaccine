<?php
if(isset($_POST['city'])){

  $servername = "localhost";
    $uname = "root";
    $pword = "";
    $dbname = "vaccine";    
    
  $link=mysqli_connect($servername, $uname, $pword, $dbname); 
  $city=$_POST['city'];
  $sql = "SELECT `place_name` FROM `places` where `city_name`= '{$city}'";
  $result=mysqli_query($link,$sql); 
  $rows = mysqli_num_rows($result);
  $r=0;
  $items=[];
  $items[0]="teset";
  while($row = mysqli_fetch_array($result))
        {
           $items[$r]=$row['place_name']; 
           $r=$r+1;          
        }  
	// Формируем массив для JSON ответа
    $result = array(
    	'name' => $rows     
    );

    // Переводим массив в JSON
    echo json_encode($items); 

  }
?>