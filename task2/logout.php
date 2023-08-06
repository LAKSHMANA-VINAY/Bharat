<?php
session_start();
include "connect.php";
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $status = "Offline now";
    $sql = "UPDATE project_users SET status ='$status' WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (isset($_SESSION['email']) && $_SESSION['email'] === $email) {
            unset($_SESSION['email']);

            session_destroy();
        }
        header("Location:login.php");
        exit();
    }
    else{
        header("Location:login.php");
        exit();
    }
}
?>
