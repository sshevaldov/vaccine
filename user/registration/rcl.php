<?php

require_once('../../common/funct.php');

class NewUser
{
    public function __construct()
    {
        $this->fam = $_POST['fam'];
        $this->name = $_POST['name'];
        $this->otch = "-";
        if (isset($_POST['otch'])) {
            $this->otch = (trim($_POST['otch']));
            if ($this->otch == "") {
                $this->otch = "-";
            }
        }
        $this->ser = $_POST['ser'];
        $this->sex = $_POST['sex'];
        $this->password = $_POST['password'];
        $this->date = $_POST['date'];
        $this->omc = $_POST['omc'];
        $this->phone = $_POST['phone'];

        $this->CheckUsers();
    }

    public function CheckUsers()
    {

        // $link = dbconnect();
        include("../../f.php");
        $link = new Dbconnect();
        $link = $link->dbconnect();
        mysqli_set_charset($link, "utf8");
        $rows = $this->SelectWherePassportIs();
        if ($rows == 0) {
            $_SESSION['fam'] = $this->fam;
            $this->password = password_hash($this->password, PASSWORD_DEFAULT);
            $this->InsertIntoUsers();
            $this->InsertIntoAccounts();
        }
        $result = array(
            'NumRows' => $rows
        );
        echo json_encode($result);
    }

    public function InsertIntoUsers()
    {
        $link = new Dbconnect();
        $link = $link->dbconnect();
        mysqli_set_charset($link, "utf8");
        $sql = "INSERT INTO `users`(`name`, `secondname`, `surname`, `birthdate`, `phone`, `passport`, `oms`,`sex`) VALUES
        ('$this->name','$this->otch','$this->fam','$this->date','$this->phone', '$this->ser', '$this->omc','$this->sex');";
        $result = mysqli_query($link, $sql);
    }

    public function InsertIntoAccounts()
    {
        $link = new Dbconnect();
        $link = $link->dbconnect();
        mysqli_set_charset($link, "utf8");
        $sql = "INSERT INTO `accounts` (`passport`, `password`) VALUES ('$this->ser', '$this->password');";
        $result = mysqli_query($link, $sql);
    }

    public function SelectWherePassportIs()
    {

        $link = new Dbconnect();
        $link = $link->dbconnect();

        $sql = "SELECT * FROM `accounts` where `passport`='$this->ser'";
        mysqli_set_charset($link, "utf8");
        $result = mysqli_query($link, $sql);
        $rows = mysqli_num_rows($result);
        return $rows;
    }
}

$user = new NewUser();
