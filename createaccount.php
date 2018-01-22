<?php
    session_start();
    include "connection.php";
    if(isset($_POST['btnsubmit']))
    {
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $uname=$_POST['mename'];
        $password=$_POST['password'];
        $bdate=$_POST['bdate'];
        $today=date("Y");
        $check=$today-$bdate;

        if($_POST["gender"]=="Female")
        {
            $gen="Female";
        }
        else
        {
            $gen="Male";
        }

        if($check<16)
        {
            echo "<script>alert('U are under 16');</script>";
        }
        else {

        $sql="insert into tbluser(firstname,lastname,username,password,birthdate,gender) values('$fname','$lname','$uname','$password','$bdate','$gen')";
        $login="insert into tbllogin(username,password) VALUES ('$uname','$password')";

        $res=mysqli_query($conn,$sql) or die("Error in insert");
        $res1=mysqli_query($conn,$login) or die("Error in insert");
        header("location:login.php");
        }
    }
?>