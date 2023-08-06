<?php
session_start();
include "connect.php";
$id=$_SESSION['id'];
$sql="select * from task where group_id='$id'";
$result=mysqli_query($conn,$sql);
?>
<html>
    <head>
        <link rel="stylesheet" href="view_task_lead.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    </head>
    <body>
        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fa-solid fa-bars"></i>
            </label>
            <label class="logo">PROJECT MANAGEMENT TOOL</label>
            <ul>
                <li><a href="users.php">HOME</a></li>
                <li><a href="assigntasks.php">ASSIGN TASKS</a></li>
                <li><a class="active" href="view_task_lead.php">VIEW TASKS</a></li>
            </ul>
        </nav>
        <div class="container">
            <table > 
                <caption>Pending Works</caption>
                <tbody> 
                    <tr> 
                        <th>NAME</th> 
                        <th>TASK NAME</th>
                        <th>ACTION</th>    
                    </tr>
                    <?php
                    if(mysqli_num_rows($result)>0){
                    while($res=mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <form action="update.php" method="POST">
                            <td><?php echo $res['email']; ?></td>
                            <td><?php echo $res['task_name']; ?></td>
                            <input type="hidden" name="email" value="<?php echo $res['email']; ?>"/>
                            <td><button type="submit" name="submit" value="submit">DELETE</button></td>
                        </form>
                    </tr> 
                    <?php 
                    }
                        }
                        else
                        {
                            echo '<span class="message">No Tasks</span>';
                        }
                    ?> 
                </tbody> 
            </table> 
        </div>
    </body>
</html>