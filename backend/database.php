<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "Samipthi7";
$dbName = "login_register";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

?>