<?php
$host = 'localhost';
$user = 'root';
$pass = 'root';
$database = 'registros-yc';
$db = mysqli_connect($host, $user, $pass, $database);
mysqli_query($db, "SET NAMES 'utf8'");
?>
