<?php
session_start();
include "connect.php";
if(isset($_POST['outgoing_id']) && isset($_POST['incoming_id'])){
    $outgoing_id=$_POST['outgoing_id'];
    $incoming_id=$_POST['incoming_id'];
    $message=$_POST['message'];
    if(!empty($message)){
        $sql="insert into messages(incoming_id,outgoing_id,msg) values('$incoming_id','$outgoing_id','$message')";
        $result=mysqli_query($conn,$sql);
    }
}
else
{
    echo "pls login";
}
?>