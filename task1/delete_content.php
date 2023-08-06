<?php
include "connect.php";
if(isset($_POST['submit']))
{
    $id=$_POST['id'];
    $title=$_POST['title'];
    $sql1="select count(*) as count from blog_content where id='$id' and title='$title'";
    $res1=mysqli_query($conn,$sql1);
    $result=mysqli_fetch_assoc($res1);
    $result=$result['count'];
    if($result)
    {
        $sql2="delete from blog_content where id='$id' and title='$title'";
        $res2=mysqli_query($conn,$sql2);
        if($res2)
        {
            header("Location:delete_blog.php?sucess=Deleted Successfully");
            exit();
        }
        else
        {
            header("Location:delete_blog.php?error=SRY PLEASE TRY AGAIN");
            exit();
        }
    }
    else
    {
        header("Location:delete_blog.php?error=SRY PLEASE TRY AGAIN");
        exit();
    }
}
$conn->close();
?>