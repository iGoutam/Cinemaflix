<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> LOG IN</title>
    <link rel="Website Icon" type="png" href="images/2.png">
    <link rel="stylesheet" href="loginstyle.css">
</head>

<body>
<?php
    require 'config.php';
    if (!empty($_SESSION["id"])) {
        header("Location: login.php");
    }
    if (isset($_REQUEST["subl"])) {
        $email = $_REQUEST["email"];
        $pass = $_REQUEST["pass"];
        $result = mysqli_query($conn, "SELECT * FROM signup WHERE email = '$email'");
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0) {
            if ($pass == $row['pass']) {
                $_SESSION["login"] = true;
                $_SESSION["id"] = $row["id"];
                header("Location:plan.php");
            } else {
                echo
                "<script> alert('Wrong Password'); </script>";
            }
        } else {
            echo
            "<script> alert('User Not Registered'); </script>";
        }
    }
    ?>
    <div class="wrapper">
        <h2>Login to your account</h2>
        <form action="#" method="post">
            <div class="input-box">
                <h4>Email</h4>
                <input type="email" placeholder="email" name="email" required>
            </div>
            <div class="input-box">
                <h4>Password</h4>
                <input type="password" placeholder="  password" name="pass" required>
            </div>

            <div class="policy">
                <input type="checkbox" required>
                <h3>Remember me</h3>
            </div>
            <div class="input-box button">
                <input type="Submit" name="subl" value="Log in">
            </div>
            <div class="text">
                <h3>New to myApp? <a href="signup.php">Sign Up</a></h3>
            </div>
        </form>
    </div>

</body>

</html>