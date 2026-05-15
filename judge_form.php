<?php
session_start();
include 'connect.php';

if (!isset($_SESSION["judge_id"])) {
    header("Location: judge_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Judge Form</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 30px;
        }

        .container {

            max-width: 950px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.12);
        }

        h2 {

            text-align: center;
            margin-bottom: 25px;
            color: #222;
        }

        .form-row {

            margin-bottom: 15px;
            font-size: 16px;
        }

        label {

            display: inline-block;
            width: 140px;
            font-weight: bold;
        }

        input[type="text"] {

            width: 320px;
            padding: 8px;
            border: 1px solid #aaa;
            border-radius: 5px;
        }

        input[disabled] {

            background: #e9ecef;
            color: #333;
        }

        table {

            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            margin-bottom: 25px;
        }

        th {

            background: #d9d9d9;
            padding: 12px;
            border: 1px solid #999;
            font-size: 16px;
        }

        td {

            padding: 14px;
            border: 1px solid #999;
            font-size: 16px;
        }

        td:not(:first-child) {

            text-align: center;
        }

        .submit-btn {

            background: #1f4e79;
            color: white;
            padding: 10px 22px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        .submit-btn:hover {

            background: #163a5c;
        }

    </style>

</head>

<body>

    <div class="container">

        <h2>Computer Science Project Scoring</h2>

        <form method="post" action="submit_score.php">

            <div class="form-row">

                <label>Group Number:</label>

                <input type="text" name="group_no" required>

            </div>

            <div class="form-row">

                <label>Group Members:</label>

                <input type="text" name="group_members" required>

            </div>

            <div class="form-row">

                <label>Project Title:</label>

                <input type="text" name="project_title" required>

            </div>

            <table>

                <tr>

                    <th>Criteria</th>
                    <th>Developing (0-10)</th>
                    <th>Accomplished (11-15)</th>

                </tr>

                <tr>

                    <td>Articulate requirements</td>

                    <td>
                        <input type="radio" name="c1" value="10" required>
                    </td>

                    <td>
                        <input type="radio" name="c1" value="15">
                    </td>

                </tr>

                <tr>

                    <td>Choose appropriate tools and methods for each task</td>

                    <td>
                        <input type="radio" name="c2" value="10" required>
                    </td>

                    <td>
                        <input type="radio" name="c2" value="15">
                    </td>

                </tr>

                <tr>

                    <td>Give clear and coherent oral presentation</td>

                    <td>
                        <input type="radio" name="c3" value="10" required>
                    </td>

                    <td>
                        <input type="radio" name="c3" value="15">
                    </td>

                </tr>

                <tr>

                    <td>Functioned well as a team</td>

                    <td>
                        <input type="radio" name="c4" value="10" required>
                    </td>

                    <td>
                        <input type="radio" name="c4" value="15">
                    </td>

                </tr>

            </table>

            <div class="form-row">

                <label>Judge Name:</label>

                <input
                type="text"
                value="<?php echo $_SESSION['judge_name']; ?>"
                disabled>

                <input
                type="hidden"
                name="judge_name"
                value="<?php echo $_SESSION['judge_name']; ?>">

            </div>

            <div class="form-row">

                <label>Comments:</label>

                <input type="text" name="comments">

            </div>

            <input class="submit-btn" type="submit" value="Submit Score">

        </form>

    </div>

</body>
</html>
