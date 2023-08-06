<?php
include "connect.php";
if (isset($_POST['submit'])){
    $name=$_POST['fullname'];
    $email=$_POST['email'];
    $password=$_POST['password'];

$query="select count(*) as count from blog_users where email='$email'";
$run=$conn->query($query);
$result1=mysqli_fetch_assoc($run)['count'];
if($result1)
{
    header("Location:blog_register.php?error=Account Already Exists");
    exit();
}
else{
$sql="INSERT INTO blog_users(fullname,email,password) VALUES('$name','$email','$password')";

$result=$conn->query($sql);

if($result==TRUE){
    header("Location:blog_register.php?sucess=successfully registered");
    exit();
}
else{
    header("Location:blog_register.php?error=Please try again");
    exit();
}
}
}
$conn->close();
?>