<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> SIGN UP</title>
    <link rel="Website Icon" type="png" href="images/2.png">
    <link rel="stylesheet" href="signupstyle.css">
</head>

<body>
    <?php
require 'config.php';
     if (!empty($_SESSION["id"])) {
         header("Location: signup.php");
     }
     if (isset($_REQUEST["sub"])) {
        $fname = $_REQUEST["fname"];
        $email = $_REQUEST["email"];
        $pass = $_REQUEST["pass"]; 
        $cpass = $_REQUEST["cpass"]; 
        $duplicate = mysqli_query($conn, "SELECT * FROM signup WHERE email = '$email'");
        if (mysqli_num_rows($duplicate) > 0) {
            echo
            "<script> alert('Username or Email Has Already Taken'); </script>";
        } else {
            if ($pass == $cpass) {
                $query = "INSERT INTO signup(fname,email,pass,cpass) VALUES('$fname','$email','$pass','$cpass')";
                mysqli_query($conn, $query);
                echo
                "<script> alert('Registration Successful'); </script>";
                header("Location: login.php");
            } else {
                echo
                "<script> alert('Password Does Not Match'); </script>";
            }
        }
    }
    ?>
    <div class="wrapper">
        <h2>Create Account</h2>
        <form action="#" method="post">
            <div class="input-box">
                <h4>Name</h4>
                <input type="text" placeholder="name" name="fname" required>
            </div>
            <div class="input-box">
                <h4>Email</h4>
                <input type="email" placeholder="email" name="email" required>
            </div>
            <div class="input-box">
                <h4>Password</h4>
                <input type="password" placeholder="password" name="pass" required>
            </div>

            <div class="input-box">
                <h4>Confirm Password</h4>
                <input type="password" placeholder=" confirm password" name="cpass" required>
            </div>

            <div class="policy">
                <input type="checkbox" required>
                <h3>Remember me</h3>
            </div>
            <div class="input-box button">
                <input type="Submit" name="sub"  value="Sign Up">
            </div>
            <div class="text">
                <h3> Already have an account? <a href="login.php">Log In</a></h3>
            </div>
        </form>
    </div>

</body>

</html>