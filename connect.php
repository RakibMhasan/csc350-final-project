<?php

$host = "turntable.proxy.rlwy.net";
$username = "root";
$password = "OHkBpLPYgnWuIQBBMXmpZHmqTYREAefl";
$database = "railway";
$port = 38844;

$conn = mysqli_connect($host, $username, $password, $database, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
