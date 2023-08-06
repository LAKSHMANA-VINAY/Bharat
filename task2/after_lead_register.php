<?php
include "connect.php";
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $groupid=$_POST['id'];
    $status=$_POST['status'];
    $type=$_POST['type'];
    $query1="select count(*) as count from project_users where group_id='$groupid'";
    $result=mysqli_query($conn,$query1);
    $row=mysqli_fetch_assoc($result);
    $count= $row['count'];
    if($count>0){
        header("Location:lead_register.php?error=Sry Group Id already exists");
        exit();
    }
    else
    {
        $query2="select count(*) as u_count from project_users where email='$email'";
        $result2=mysqli_query($conn,$query2);
        $row1=mysqli_fetch_assoc($result2);
        $count2= $row1['u_count'];
        if($count2>0){
            header("Location:lead_register.php?error=Account already exists");
            exit();
        }
        else
        {
            $query3="insert into project_users(name,email,password,group_id,type,status) values('$name','$email','$password','$groupid','$type','$status')";
            $result3=mysqli_query($conn,$query3);
            header("Location:lead_register.php?success=You registred successfully");
            exit();
        }
    }
}
?>