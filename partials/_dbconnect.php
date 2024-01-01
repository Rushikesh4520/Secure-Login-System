<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "crud";

$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
    die("database is not connected".mysqli_connect_error());
}else{
    echo " database is connected";
}



?>