<?php
    include "logout.php";
    include "connection.php";

    if((isset($_SESSION['user'])))
    {
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="icon" href="facebook-icon-preview-1-400x400.png"/>
    <style>

       #header{
           height: 25px;
           background-color: dodgerblue;
       }
        #post{
            padding: 50px;
            width: auto;
            display: none;
            background-color: antiquewhite;
            wid
        }
        .timeline{
            width: 100px;
            background-color: dodgerblue;
        }

        #timeline > div{
            margin-left: 50%;
            font-size: x-large;
        }
    </style>
</head>
<body>
<!--<h1>Hello --><?php //echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?><!--</h1>-->
<form action="" method="post" enctype="multipart/form-data">
<div id="header">
        <input type="submit" name="btn_logout" value="Logout" style="margin-left: 95%">
</div>
    <div>
        <input type="button" name="post" value="Post" id="btn_post" style="margin-left: 50%;">
    </div>

    <div id="post">
        <table align="center">
            <tr>
                <td>Select Image</td>
                <td><input type="file" required name="fileupload"/></td>
            </tr>
            <tr>
                <td></td>
                <td><textarea name="postcomment" required placeholder="Write Something"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="post_submit" id="post_submit" value="Save"></td>
            </tr>
        </table>
    </div>
    <div id="timeline">

            <?php
                $count;
                $userid=$_SESSION['userid'];
                $sql="select * from tblpost where userid='$userid'";
                $res=mysqli_query($conn,$sql) or die("select post query failed");

                if(mysqli_num_rows($res)>0) {
                    while ($row = mysqli_fetch_array($res)) {

                        $sql1="select count(likeid) from tbllike where postid='$row[0]'";
                        $res1=mysqli_query($conn,$sql1) or die("select post query failed");
                            if(mysqli_num_rows($res1)>0)
                            {
                                while($row1=mysqli_fetch_array($res1))
                                {
                                    $count=$row1[0];
                                }
                            }
                        ?>
                        <div style="margin-left: 50%;"><span><?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; ?></span></div>
                        <div style="margin-left: 50%;"><span><?php echo $row[2]; ?></span></div>
                        <div style="margin-left: 50%;"><img src="images/<?php echo $row[3]; ?>" height="150px" width="150px"></div>
                        <div><span><button type="button" id="btn_like" onclick="likefun(<?php echo $userid;?>,<?php echo $row[0];?>);"><img src="36-.jpg" width="50px" height="50px"></button></span><span id="likedata"><?php echo $count; ?></span></div>
                        <?php
                    }
                }
            ?>
    </div>
</form>
</body>
</html>
        <script>
            var count=0;
            $(document).ready(function () {
                $("#btn_post").click(function () {
                    $("#post").slideToggle("slow");
                });
            });

            $("#")
            function likefun(userid,postid) {
                $.ajax({
                    type: "post",
                    url: "insertlike.php",
                    data:{userid:userid,postid:postid},
                    success:function (data) {
                        $("#likedata").html(data);
                        window.location.reload();
                    }
                });
            }
        </script>
<?php
        if(isset($_POST['post_submit']))
        {
            if(isset($_FILES['fileupload']))
            {
                $errors=array();
                $file_name=$_FILES['fileupload']['name'];
                $file_size=$_FILES['fileupload']['size'];
                $file_tmp=$_FILES['fileupload']['tmp_name'];
                $file_type=$_FILES['fileupload']['type'];
//                $file_ext=strtolower(end(explode('.',$_FILES['fileupload']['name'])));
//
//                $extentions=array("jpeg","jpg","png");
//
//                if(in_array($file_ext,$extentions)=== false)
//                {
//                    $errors[]="extentions are not allowed";
//                }

                if($file_size>2097152)
                {
                    $errors[]="File size is greater than 2 MB";
                }

                if(empty($errors)==true)
                {
                    move_uploaded_file($file_tmp,"images/".$file_name);
                }
                $comment=$_POST['postcomment'];
                $user=$_SESSION['userid'];

                $sql="insert into tblPost(userid,postcomment,image) values('$user','$comment','$file_name')";
                //echo $user;
                $res=mysqli_query($conn,$sql) or die("Connection Failed in uploading");
            }
        }
}
?>
