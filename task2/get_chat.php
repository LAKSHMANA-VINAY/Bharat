<?php
session_start();
include "connect.php";
$user_email=$_POST['incoming_id'];
$email=$_POST['outgoing_id'];
$output="";
$sql3="select * from messages where (outgoing_id='$email' and incoming_id='$user_email')
or (outgoing_id='$user_email' and incoming_id='$email') order by msg_id";
$result3=mysqli_query($conn,$sql3);
if(mysqli_num_rows($result3)>0){
    while($row1=mysqli_fetch_assoc($result3)){
        if($row1['outgoing_id']===$email){
            $output.='<div class="chat outgoing">
                <div class="details">
                    <p>'.$row1['msg'].'</p>
                </div>
            </div>';
        }
        else{
            $output.='<div class="chat ingoing">
                        <div class="details">
                            <p>'.$row1['msg'].'</p>
                        </div>  
                    </div>';
        }
    }
    echo $output;
}
?>