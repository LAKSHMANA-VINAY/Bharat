<?php
session_start();
include "connect.php";
if(isset($_POST['submit'])&&isset($_POST['type'])!='')
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $type=$_POST['type'];
    $sql="select group_id,count(*) as count from project_users where email='$email' and password='$password' and type='$type'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $count= $row['count'];
    if($row['count']>0 && $type=="lead"){
        $_SESSION['email']=$email;
        $_SESSION['id']=$row['group_id'];
        $status="Active now";
        $sql2="update project_users set status ='$status' where email='$email'";
        $result2=mysqli_query($conn,$sql2);
        header("Location:users.php");
        exit();
    }
    else if($row['count']>0 && $type=="member"){
        $_SESSION['email']=$email;
        $_SESSION['id']=$row['group_id'];
        $status="Active now";
        $sql2="update project_users set status ='$status' where email='$email'";
        $result2=mysqli_query($conn,$sql2);
        header("Location:member_users.php");
        exit();
    }
    else
    {
        header("Location:login.php?error=Account Not Found");
        exit();
    }
}
?>