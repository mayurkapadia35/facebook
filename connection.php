<?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "facebookdb";

        $conn = mysqli_connect($servername, $username, $password, $db) or die("Connection Failed" . mysqli_connect_error());

?>