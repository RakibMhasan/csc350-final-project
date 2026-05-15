<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connect.php';
session_start();

$error = "";

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

    mysqli_query($conn,
    "INSERT INTO admin (username, password) VALUES ('admin', '$hash')")
    or die(mysqli_error($conn));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = $_POST["username"];
    $pass = $_POST["password"];

    $res = mysqli_query($conn,
    "SELECT * FROM admin WHERE username='$user'")
    or die(mysqli_error($conn));

    $row = mysqli_fetch_assoc($res);

    if ($row && password_verify($pass, $row["password"])) {

        $_SESSION["admin"] = true;

        header("Location: admin_results.php");
        exit;

    } else {

        $error = "Invalid admin login";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Admin Login</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: #e9ecef;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-box {

            background: white;
            width: 370px;
            padding: 35px;
            border-radius: 10px;
            box-shadow: 0 4px 14px rgba(0,0,0,0.15);
        }

        h2 {

            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        label {

            display: block;
            font-weight: bold;
            margin-bottom: 6px;
        }

        input[type="text"],
        input[type="password"] {

            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            border: 1px solid #999;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .login-btn {

            width: 100%;
            background: #333;
            color: white;
            padding: 11px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .login-btn:hover {

            background: #111;
        }

        .error {

            color: red;
            text-align: center;
            margin-bottom: 15px;
        }

    </style>

</head>

<body>

    <div class="login-box">

        <h2>Admin Login</h2>

        <?php
        if ($error != "") {
            echo "<div class='error'>$error</div>";
        }
        ?>

        <form method="post">

            <label>Username</label>
            <input type="text" name="username" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <input class="login-btn" type="submit" value="Login">

        </form>

    </div>

</body>
</html>
