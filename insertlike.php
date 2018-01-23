<?php
    include "connection.php";

    $userid=$_POST['userid'];
    $postid=$_POST['postid'];

    $sql2="select count(likeid) from tbllike where userid='$userid' and postid='$postid'";
    $res2=mysqli_query($conn,$sql2) or die("Error to fetch a like record");

    $count=0;
    //echo mysqli_num_rows($res2);
    if(mysqli_num_rows($res2)>0) {
        //echo "FIRST hello";

        while ($row2 = mysqli_fetch_array($res2))
        {
            if ($row2[0] == 0)
            {
                $sql = "insert into tbllike(postid,userid) VALUES('$postid','$userid')";
                $res = mysqli_query($conn, $sql) or die("Error in add like");
                echo $res;
            }
            else
            {
                $res1 = mysqli_query($conn, $sql2) or die("Error to fetch a like");
                if (mysqli_num_rows($res1) > 0)
                {
                    while ($row1 = mysqli_fetch_array($res1))
                    {
                        $count = $row1[0];
                        echo $count;
                    }
                }
            }
        }
    }
?>