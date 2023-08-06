<?php
session_start();
include "connect.php";
if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $taskName=$_POST['task'];
    $work_status=$_POST['work_status'];
    $id=$_SESSION['id'];
    $query1="select count(*) as count from project_users where email='$email' and group_id='$id'";
    $result=mysqli_query($conn,$query1);
    $row=mysqli_fetch_assoc($result);
    $count= $row['count'];
    if($row['count']>0){
        $query2="select count(*) as member from task where group_id='$id' and email='$email'";
        $result6=mysqli_query($conn,$query2);
        $row6=mysqli_fetch_assoc($result6);
        $count6= $row6['member'];
        if($count6>0)
        {
            header("Location:assigntasks.php?error=You Already Assigned");
            exit();
        }
        else
        {
            $sql2="insert into task(group_id,email,work_status,task_name) values('$id','$email','$work_status','$taskName')";
            $result2=mysqli_query($conn,$sql2);
            header("Location:assigntasks.php?success=Assigned Successfully");
            exit();
        }
    }
    else
    {
        header("Location:assigntasks.php?error=Member Not Found");
        exit();
    }
}
?>