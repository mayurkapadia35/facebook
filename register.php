<?php
    include "connection.php";
    include "createaccount.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <link rel="icon" href="facebook-icon-preview-1-400x400.png"/>
    <style>
        h2,h4{
            text-align: center;
            font-family: Consolas;
            text-decoration: cadetblue;
        }
        a{
            text-align: center;
            margin-left: 50%;
        }

    </style>
</head>
<body>
<form action="" method="post">
    <h2>Create an Account</h2>
    <h4>It's free and always will be.</h4>
    <table align="center">
        <tr>
            <td><input type="text" name="fname" placeholder="Enter First Name" required></td>
        </tr>
        <tr>
            <td><input type="text" name="lname" placeholder="Enter Last Name" required></td>
        </tr>
        <tr>
            <td><input type="text" name="mename" placeholder="Mobile No. or Email Address" required></td>
        </tr>
        <tr>
            <td><input type="password" name="password" placeholder="Enter Your Password" required></td>
        </tr>
        <tr>
            <td><input type="date" name="bdate" id="bdate" required></td>
        </tr>
        <tr>
            <td><input type="radio" name="gender" value="Male" checked>Male
                <input type="radio" name="gender" value="Female">Female</td>
        </tr>

        <tr>
            <td><input type="submit" name="btnsubmit" value="Create an account">
                <input type="reset" name="btnreset" value="Reset"></td>
        </tr>
        <tr>
            <td><input type="button" name="google" value="Google"></td>
        </tr>
    </table>
</form>
<a href="login.php">Login</a>
</body>
</html>