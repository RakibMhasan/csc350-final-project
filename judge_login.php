<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$error = "";

$judges = [
    "judge1" => "4821",
    "judge2" => "7314",
    "judge3" => "2648",
    "judge4" => "9057"
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = $_POST["username"];
    $pass = $_POST["password"];

    if (isset($judges[$user]) && $judges[$user] == $pass) {

        $_SESSION["judge_id"] = $user;
        $_SESSION["judge_name"] = $user;

        header("Location: judge_form.php");
        exit;

    } else {

        $error = "Invalid login";

    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Judge Login</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-box {
            background: white;
            padding: 35px;
            width: 350px;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.15);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #1f4e79;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
        }

        input[type="text"],
        input[type="password"] {

            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            border: 1px solid #aaa;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .login-btn {
            width: 100%;
            background: #1f4e79;
            color: white;
            padding: 11px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .login-btn:hover {
            background: #163a5c;
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

        <h2>Judge Login</h2>

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
