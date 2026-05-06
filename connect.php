<?php
$host = "127.0.0.1";
$username = "root";
$password = "2002";
$database = "final_project";
$port = 3306;

$conn = mysqli_connect($host, $username, $password, $database, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
