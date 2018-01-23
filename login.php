<?php
    session_start();
    include "connection.php";
    if(isset($_POST['btn_login']))
    {
        $txtusername=mysqli_real_escape_string($conn,$_POST['email']);
        $txtpassword=mysqli_real_escape_string($conn,$_POST['password']);

        $sql="select * from tbllogin where username='$txtusername' and password='$txtpassword'";

        $sql1="select * from tbluser where username='$txtusername' and password='$txtpassword'";
//        $sql8=sqlsrv_query()
        $res=mysqli_query($conn,$sql) or die("Query Failed");

        if(mysqli_num_rows($res)>0)
        {
            $res1=mysqli_query($conn,$sql1) or die("Query Failed");
            if(mysqli_num_rows($res1)>0)
            {
                while($row1=mysqli_fetch_array($res1))
                {
                    $_SESSION['userid']=$row1[0];
                    $_SESSION['firstname']=$row1[1];
                    $_SESSION['lastname']=$row1[2];
                    $_SESSION['birthdate']=$row1[5];
                    $_SESSION['gender']=$row1[6];
                }
            }

            while($row=mysqli_fetch_array($res))
            {
                $_SESSION['user']=$row[0];
                $_SESSION['pass']=$row[1];
            }
            header('Refresh:0.1;URL=home.php');
        }
        else
        {
            echo "<script>alert('Incorrect Username or Password');</script>";
        }
    }
?>

<html>
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="facebook-icon-preview-1-400x400.png"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }
        main {
            flex: 1 0 auto;
        }

        body {
            background: #fff;
        }

        .input-field input[type=date]:focus + label,
        .input-field input[type=text]:focus + label,
        .input-field input[type=email]:focus + label,
        .input-field input[type=password]:focus + label {
            color: #e91e63;
        }

        .input-field input[type=date]:focus,
        .input-field input[type=text]:focus,
        .input-field input[type=email]:focus,
        .input-field input[type=password]:focus {
            border-bottom: 2px solid #e91e63;
            box-shadow: none;
        }
    </style>
    <title>My Facebook</title>
</head>

<body>
<div class="section"></div>
<main>
    <center>
        <img class="responsive-img" style="width: 100px;" src="facebook-icon-preview-1-400x400.png"/>
        <div class="section"></div>

        <h5 class="indigo-text">Please, login into your account</h5>
        <div class="section"></div>

        <div class="container">
            <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

                <form class="col s12" method="post">
                    <div class='row'>
                        <div class='col s12'>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='input-field col s12'>
                            <input class='validate' type='text' name='email' id='email' autofocus/>
                            <label for='email'>Enter your Email/Phone No.</label>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='input-field col s12'>
                            <input class='validate' type='password' name='password' id='password' />
                            <label for='password'>Enter your password</label>
                        </div>
                        <label style='float: right;'>
                            <a class='pink-text' href='#!'><b>Forgot Password?</b></a>
                        </label>
                    </div>

                    <br />
                    <center>
                        <div class='row'>
                            <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Login</button>
                        </div>
                    </center>
                </form>
            </div>
        </div>
        <a href="register.php">Create account</a>
    </center>

    <div class="section"></div>
    <div class="section"></div>
</main>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
</body>
</html>