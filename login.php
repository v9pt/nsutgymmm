<?php
include 'conn.php';

if (isset($_POST['student-submit'])) {
    // Student login form is submitted
    $u = $_POST['student-email'];
    $p = $_POST['student-password'];
    $q = "SELECT * FROM student_log WHERE Employee_id = '$u' AND password = '$p'";
    $res = mysqli_query($conn, $q);

    if (mysqli_num_rows($res) == 1) {
        $_SESSION['uname'] = $u;
        header('location:student_dashboard.php');
    } else {
        $message = "Incorrect Username or Password";
        echo '<script type="text/javascript">alert("' . $message . '")</script>';
        echo "<script>window.open('login.php','_self')</script>";
    }
} elseif (isset($_POST['employee-submit'])) {
    // Employee login form is submitted
    $u = $_POST['Employee_id'];
    $p = $_POST['employee-password'];
    $q = "SELECT * FROM Employee WHERE Employee_id = '$u' AND RIGHT(Employee_id,4) = '$p'";
    $res = mysqli_query($conn, $q);

    if (mysqli_num_rows($res) == 1) {
        $_SESSION['uname'] = $u;
        header('location:admin_pan.php');
    } else {
        $message = "Incorrect Username or Password";
        echo '<script type="text/javascript">alert("' . $message . '")</script>';
        echo "<script>window.open('login.php','_self')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NSUT GYM Management System</title>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #495057;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #007bff;
            text-align: center;
            margin-top: 50px;
        }

        .container {
            margin-top: 20px;
        }

        h2 {
            color: #007bff;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px 0px #ccc;
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h1 class="display-3">NSUT Gym Management System</h1>

<div class="container">
    <h2 class="display-5">Login</h2>

    <div class="row">
        <div class="col-lg-6">
            <!-- Student Login Form -->
            <form method="POST">
                <h2>Student Login</h2>
                <label for="student-email">Username:</label>
                <input type="email" id="student-email" name="student-email" required>
                <label for="student-password">Password:</label>
                <input type="password" id="student-password" name="student-password" required>
                <button type="submit" class="btn text-center mx-auto" name="student-submit">Login</button>
            </form>
        </div>
        <div class="col-lg-6">
            <!-- Employee Login Form -->
            <form method="POST">
                <h2>Employee Login</h2>
                <label for="Employee_id">Username:</label>
                <input type="text" id="Employee_id" name="Employee_id" required>
                <label for="employee-password">Password:</label>
                <input type="password" id="employee-password" name="employee-password" required>
                <button type="submit" class="btn text-center mx-auto" name="employee-submit">Login</button>
            </form>
        </div>
    </div>
</div>

<script src="./js/bootstrap.min.js"></script>
<script src="./js/jquery.3.4.1.js"></script>

</body>
</html>

