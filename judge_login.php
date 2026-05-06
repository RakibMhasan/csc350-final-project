<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = $_POST["password"];

    if (
        ($user == "judge1" || $user == "judge2" || $user == "judge3" || $user == "judge4")
        && $pass == "2002"
    ) {
        $_SESSION["judge_id"] = $user;
        $_SESSION["judge_name"] = $user;
        header("Location: judge_form.php");
        exit;
    } else {
        echo "Invalid login";
    }
}
?>

<h2>Judge Login</h2>

<form method="post">
    Username: <input name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Login">
</form>
