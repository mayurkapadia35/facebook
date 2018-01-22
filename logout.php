<?php
    session_start();
    if(isset($_POST['btn_logout']))
    {
        if(isset($_SESSION['user']))
        {
            session_unset();
            //session_destroy();

            echo "Thanks for visiting......";
            header('Refresh:2;URL=login.php');
        }
     }
?>