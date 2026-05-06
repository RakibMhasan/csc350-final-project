<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connect.php';
session_start();

// make sure admin table exists
mysqli_query($conn, "
CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255)
)
") or die(mysqli_error($conn));

// create admin user if not already there
$check = mysqli_query($conn, "SELECT * FROM admin WHERE username='admin'");

if (mysqli_num_rows($check) == 0) {
    $hash = password_hash("2002", PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO admin (username, password) VALUES ('admin', '$hash')")
    or die(mysqli_error($conn));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = $_POST["password"];

    $res = mysqli_query($conn, "SELECT * FROM admin WHERE username='$user'")
    or die(mysqli_error($conn));

    $row = mysqli_fetch_assoc($res);

    if ($row && password_verify($pass, $row["password"])) {
        $_SESSION["admin"] = true;
        header("Location: admin_results.php");
        exit;
    } else {
        echo "Invalid admin login";
    }
}
?>

<h2>Admin Login</h2>

<form method="post">
    Username: <input name="username"><br><br>
    Password: <input type="password" name="password"><br><br>
    <input type="submit" value="Login">
</form>
