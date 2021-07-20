<?php

require_once('php/funct.php');
if (isset($_POST['ser']) and isset($_POST['password']) and isset($_POST['fam']) and isset($_POST['name']) and isset($_POST['date']) and isset($_POST['code']) and isset($_POST['omc']) and isset($_POST['phone'])) {
  $servername = "localhost";
  $uname = "root";
  $pword = "";
  $dbname = "vaccine";
  $link = mysqli_connect($servername, $uname, $pword, $dbname);
  $sql = "SELECT * FROM `accounts` where `passport`='{$_POST["ser"]}'";
  $result = mysqli_query($link, $sql);
  $rows = mysqli_num_rows($result);
  if ($rows == 0)  
  {
    $name = (trim($_POST['name']));
    $otch = "отсутствует";
    if (isset($_POST['otch'])) {
      $otch = (trim($_POST['otch']));
      if ($otch == "") {
        $otch = "-";
      }
    }
    $_SESSION['fam'] = (trim($_POST['fam']));
  
    $phone = ($_POST['phone']);
    $login = ($_POST['ser']);
    $oms = ($_POST['omc']);
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_set_charset($link, "utf8");
    $sql = "INSERT INTO `users`(`name`, `secondname`, `surname`, `birthdate`, `district_code`, `phone`, `passport`, `oms`, `access`) VALUES ('$name','$otch','{$_POST['fam']}','{$_POST['date']}','{$_POST['code']}','$phone','$login','$oms','user');";
    $result = mysqli_query($link, $sql);
    $sql = "INSERT INTO `accounts` (`passport`, `password`) VALUES ('$login', '$password');";
    $result = mysqli_query($link, $sql);
   
  }
 
  $result = array(
    'name' => $rows
  );
 
  echo json_encode($result);
}
