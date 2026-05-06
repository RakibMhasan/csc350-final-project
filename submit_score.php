<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $group_no = $_POST["group_no"];
    $group_members = $_POST["group_members"];
    $project_title = $_POST["project_title"];

    $c1 = $_POST["c1"];
    $c2 = $_POST["c2"];
    $c3 = $_POST["c3"];
    $c4 = $_POST["c4"];

    $total = $c1 + $c2 + $c3 + $c4;

    $judge_name = $_POST["judge_name"];
    $comments = $_POST["comments"];

    $sql = "INSERT INTO scores 
    (group_no, group_members, project_title, c1, c2, c3, c4, total, judge_name, comments)
    VALUES 
    ('$group_no', '$group_members', '$project_title', '$c1', '$c2', '$c3', '$c4', '$total', '$judge_name', '$comments')";

    if (mysqli_query($conn, $sql)) {
        echo "<h2>Score submitted successfully!</h2>";
        echo "<p>Total Score: $total</p>";
        echo "<a href='admin_results.php'>View Admin Results</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
