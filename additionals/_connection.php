<?php
$host = "localhost";
$user = "root";
$passwd = "";
$database = "datavalt";

$conn = mysqli_connect($host, $user, $passwd, $database);

if(!$conn){
    echo "Connection failed".mysqli_connect_error();
}

?>