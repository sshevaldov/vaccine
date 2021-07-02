<?php
function dbconnect()
{
    $servername = "localhost";
    $uname = "root";
    $pword = "";
    $dbname = "vaccine";                  
    return mysqli_connect($servername, $uname, $pword, $dbname);
}
?>