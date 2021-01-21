<?php
$servername = "127.0.0.1:3306";
$database = "u210807845_registrosyc";
$username = "u210807845_fcb_usr_rwx";
$password = "R3gistro@you74";
// Create connection
$db = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
