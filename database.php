<?php 

$hostname = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "login-register";

$connect = mysqli_connect($hostname, $dbUser, $dbPassword, $dbName);

if (!$connect){
    die("db not connected");
}

?>