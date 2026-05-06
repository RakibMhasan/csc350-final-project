<?php
session_start();
include 'connect.php';

// Redirect to login if judge is not logged in
if (!isset($_SESSION["judge_id"])) {
    header("Location: judge_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Judge Form</title>
</head>
<body>
    <h2>Computer Science Project Scoring</h2>
    <form method="post" action="submit_score.php">
        Group Number: <input name="group_no" required><br><br>
        Group Members: <input name="group_members" required><br><br>
        Project Title: <input name="project_title" required><br><br>

        <table border="1" cellpadding="10">
            <tr>
                <th>Criteria</th>
                <th>Developing (0-10)</th>
                <th>Accomplished (10-15)</th>
            </tr>
            <tr>
                <td>Articulate requirements</td>
                <td><input type="radio" name="c1" value="10" required></td>
                <td><input type="radio" name="c1" value="15"></td>
            </tr>
            <tr>
                <td>Design solution</td>
                <td><input type="radio" name="c2" value="10" required></td>
                <td><input type="radio" name="c2" value="15"></td>
            </tr>
            <tr>
                <td>Write code</td>
                <td><input type="radio" name="c3" value="10" required></td>
                <td><input type="radio" name="c3" value="15"></td>
            </tr>
            <tr>
                <td>Test and debug</td>
                <td><input type="radio" name="c4" value="10" required></td>
                <td><input type="radio" name="c4" value="15"></td>
            </tr>
        </table>

        <br>
        Judge Name: <input name="judge_name" required><br><br>
        Comments: <input name="comments"><br><br>

        <input type="submit" value="Submit Score">
    </form>
</body>
</html>
