<?php
session_start();
include "connect.php";
if((isset($_POST['email'])&&isset($_POST['password'])))
{
    function clear($data)
    {
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
$email=clear($_POST['email']);
$password=clear($_POST['password']);
if(empty($email)){
    header("Location:blog_login.php?error=enter the email");
    exit();
}
if(empty($password)){
    header("Location:blog_login.php?error=enter the password");
    exit();
}
$sql="select email,password from blog_users where email='$email'";
$result=$conn->query($sql);
if(mysqli_num_rows($result)===1)
{
    $row=mysqli_fetch_assoc($result);
    if($row['email']===$email && $password===$row['password'])
    {
    $_SESSION['email']=$email;
    header("Location:blog_first.php");
    exit();
    }
    else{
        header("Location:blog_login.php?error= Your Account Is Not Found");
        exit();
    }
}
else{
    header("Location:blog_login.php?error=Your Account Is Not Found");
    exit();
}
}
$conn->close();
?>