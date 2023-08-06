<?php
session_start();
include "connect.php";
if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $id=$_SESSION['id'];
    $sql="delete from task where group_id='$id' and email='$email'";
    $result=mysqli_query($conn,$sql);
    header("Location:view_task_lead.php");
    exit();
}