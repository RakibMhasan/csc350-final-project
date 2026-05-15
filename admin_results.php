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
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Results</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.12);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #222;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #1f4e79;
            color: white;
            padding: 14px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        td {
            padding: 14px;
            border: 1px solid #ccc;
            text-align: center;
            font-size: 15px;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

    </style>
</head>

<body>

    <div class="container">

        <h2>Group Average Scores</h2>

        <table>

            <tr>
                <th>Group Number</th>
                <th>Project Title</th>
                <th>Average Score</th>
            </tr>

            <?php
            while ($row = mysqli_fetch_assoc($res)) {
                echo "<tr>";
                echo "<td>" . $row['group_no'] . "</td>";
                echo "<td>" . $row['project_title'] . "</td>";
                echo "<td>" . round($row['avg_score'], 2) . "</td>";
                echo "</tr>";
            }
            ?>

        </table>

    </div>

</body>
</html>
