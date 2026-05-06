<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "PHP is running<br>";

$host = "127.0.0.1";
$username = "root";
$password = "2002";
$database = "final_project";
$port = 3306;

$conn = mysqli_connect($host, $username, $password, $database, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Database connected<br>";

$sql1 = "CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255)
)";

$sql2 = "CREATE TABLE IF NOT EXISTS judges (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255)
)";

$sql3 = "CREATE TABLE IF NOT EXISTS scores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    group_no VARCHAR(50),
    group_members TEXT,
    project_title VARCHAR(100),
    c1 INT,
    c2 INT,
    c3 INT,
    c4 INT,
    total INT,
    judge_name VARCHAR(100),
    comments TEXT
)";

mysqli_query($conn, $sql1) or die("Admin table error: " . mysqli_error($conn));
mysqli_query($conn, $sql2) or die("Judges table error: " . mysqli_error($conn));
mysqli_query($conn, $sql3) or die("Scores table error: " . mysqli_error($conn));

echo "done";
?>
