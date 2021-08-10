<?php
class Dbconnect
{
    public function __construct()
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "vaccine";
    }
    public function dbconnect()
    {      
        return mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
    }
}
