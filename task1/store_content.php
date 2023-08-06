<?php
include "connect.php";
session_start();
if(isset($_POST['submit']))
{
    $email=$_SESSION['email'];
    $title=$_POST['title'];
    $size=$_FILES['image']['size'];
    $content=$_POST['content'];
    $video_name=$_FILES['video']['name'];
    $video_type=$_FILES['video']['type'];
    $video_temp_name=$_FILES['video']['tmp_name'];
    $video_size=$_FILES['video']['size'];
    $video_destination="upload/".$video_name;
    if($title!="" && $size>0){
        $file=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        $sql1="select id from blog_users where email='$email'";
        $run1=mysqli_query($conn,$sql1);
        if($run1)
        {
            if (move_uploaded_file($video_temp_name,$video_destination))
            {
                $result=mysqli_fetch_assoc($run1);
                $id=$result['id'];
                $record="insert into blog_content(id,title,content,image,video) values('$id','$title','$content','$file','$video_name')";
                $recordres=mysqli_query($conn,$record);
                if($recordres){
                    header("Location:add_blog.php?sucess=ADDED SUCCESSFULLY");
                    exit();
                }
                else{
                    header("Location:add_blog.php?error=SRY PLEASE TRY AGAIN 1");
                    exit();
                }
            }
            else{
                header("Location:add_blog.php?error=SRY PLEASE TRY AGAIN");
                exit();
            }
        }
        else
        {
            header("Location:add_blog.php?error=SRY PLEASE TRY AGAIN");
            exit();
        }
    }
    else
    {
        echo '<script>alert("else-4")</script>';
        header("Location:add_blog.php?error=SRY PLEASE TRY AGAIN");
        exit();
    }
}
$conn->close();
?>