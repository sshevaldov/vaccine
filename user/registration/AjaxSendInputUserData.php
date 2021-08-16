<?php
require_once('../../common/dbfunct.php');
if (isset($_POST['ser']) && isset($_POST['sex']) && isset($_POST['password']) && isset($_POST['fam']) && isset($_POST['name']) && isset($_POST['date']) && isset($_POST['omc']) && isset($_POST['phone'])) {
  $link = dbconnect();
  $sql = "SELECT * FROM `accounts` where `passport`='{$_POST["ser"]}'";
  $result = mysqli_query($link, $sql);
  $rows = mysqli_num_rows($result);
  if ($rows == 0) {
    $name = (trim($_POST['name']));
    $otch = "отсутствует";
    if (isset($_POST['otch'])) {
      $otch = (trim($_POST['otch']));
      if ($otch == "") {
        $otch = "-";
      }
    }
    $_SESSION['fam'] = (trim($_POST['fam']));
    $sex = ($_POST['sex']);
    $phone = ($_POST['phone']);
    $login = ($_POST['ser']);
    $oms = ($_POST['omc']);
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_set_charset($link, "utf8");
    $sql = "INSERT INTO `users`(`name`, `secondname`, `surname`, `birthdate`, `phone`, `passport`, `oms`,`sex`) VALUES ('$name','$otch','{$_POST['fam']}','{$_POST['date']}','$phone','$login','$oms','$sex');";
    $result = mysqli_query($link, $sql);
    $sql = "INSERT INTO `accounts` (`passport`, `password`) VALUES ('$login', '$password');";
    $result = mysqli_query($link, $sql);
  }

  $result = array(
    'NumRows' => $rows
  );

  echo json_encode($result);
}
