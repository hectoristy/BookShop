<?php

$host = "bdmnt4lojlwmhmh84sde-mysql.services.clever-cloud.com";
$dbName = "bdmnt4lojlwmhmh84sde";
$user = "u6vfjlrvzxku2itk";
$pass = "u6vfjlrvzxku2itk";

try {
    $conn = new PDO("mysql:host=$host; dbname=$dbName", $user, $pass);
   
} catch (Exception $err) {
    echo "error: " . $err->getMessage();
}

?>