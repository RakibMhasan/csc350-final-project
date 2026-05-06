<?php

$host = "sql5.freesqldatabase.com";
$username = "sql5825646";
$password = "PvS5NikKig";
$database = "sql5825646";

$conn = mysqli_connect($host, $username, $password, $database, 3306);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
