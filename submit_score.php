<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $group_no = $_POST["group_no"];
    $group_members = $_POST["group_members"];
    $project_title = $_POST["project_title"];

    $c1 = isset($_POST["c1"]) ? $_POST["c1"] : 0;
    $c2 = isset($_POST["c2"]) ? $_POST["c2"] : 0;
    $c3 = isset($_POST["c3"]) ? $_POST["c3"] : 0;
    $c4 = isset($_POST["c4"]) ? $_POST["c4"] : 0;

    $total = $c1 + $c2 + $c3 + $c4;

    $judge_name = $_POST["judge_name"];
    $comments = $_POST["comments"];

    $sql = "INSERT INTO scores 
    (group_no, group_members, project_title, c1, c2, c3, c4, total, judge_name, comments)
    VALUES 
    ('$group_no', '$group_members', '$project_title', '$c1', '$c2', '$c3', '$c4', '$total', '$judge_name', '$comments')";

    $success = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Score Submitted</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .message-box {
            background: white;
            width: 430px;
            padding: 35px;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.15);
            text-align: center;
        }

        h2 {
            color: #1f4e79;
            margin-bottom: 15px;
        }

        .total {
            font-size: 22px;
            font-weight: bold;
            margin: 20px 0;
            color: #222;
        }

        .btn {
            display: inline-block;
            margin: 8px;
            padding: 10px 18px;
            background: #1f4e79;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        .btn:hover {
            background: #163a5c;
        }

        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="message-box">

        <?php if (isset($success) && $success) { ?>

            <h2>Score Submitted Successfully</h2>

            <p>The score for this project has been saved.</p>

            <div class="total">
                Total Score: <?php echo $total; ?>
            </div>

            <a class="btn" href="judge_form.php">Submit Another Score</a>
            <a class="btn" href="admin_results.php">View Admin Results</a>

        <?php } else { ?>

            <h2 class="error">Submission Failed</h2>
            <p><?php echo mysqli_error($conn); ?></p>
            <a class="btn" href="judge_form.php">Go Back</a>

        <?php } ?>

    </div>

</body>
</html>
