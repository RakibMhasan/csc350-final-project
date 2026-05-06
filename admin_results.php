<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connect.php';
session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: admin_login.php");
    exit;
}

$sql = "SELECT group_no, project_title, AVG(total) AS avg_score 
        FROM scores 
        GROUP BY group_no, project_title";

$res = mysqli_query($conn, $sql);

if (!$res) {
    die("Query error: " . mysqli_error($conn));
}

echo "<h2>Group Average Scores</h2>";

echo "<table border='1' cellpadding='10'>";
echo "<tr>
        <th>Group Number</th>
        <th>Project Title</th>
        <th>Average Score</th>
      </tr>";

while ($row = mysqli_fetch_assoc($res)) {
    echo "<tr>";
    echo "<td>" . $row['group_no'] . "</td>";
    echo "<td>" . $row['project_title'] . "</td>";
    echo "<td>" . round($row['avg_score'], 2) . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
