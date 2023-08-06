<?php
session_start();
include "connect.php";
?>
<html lang="en">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
        <link rel="stylesheet" href="main.css" />
    </head>
    <body>
        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fa-solid fa-bars"></i>
            </label>
            <label class="logo">PROJECT MANAGEMENT TOOL</label>
            <ul>
                <li><a class="active" href="member_users.php">HOME</a></li>
                <li><a href="view_task_member.php">VIEW TASKS</a></li>
            </ul>
        </nav>
        <div class="wrapper">
            <section class="users">
                <header>
                    <?php
                    $email=$_SESSION['email'];
                    $id=$_SESSION['id'];
                    $sql="select * from project_users where email='$email' and group_id='$id'";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){
                        $row=mysqli_fetch_assoc($result);
                    }
                    ?>
                    <div class="content">
                        <div class="details">
                            <span><?php echo $row['name'] ?></span>
                            <p><?php echo $row['status'] ?></p>
                        </div>
                    </div>
                    <a href="logout.php?email=<?php echo $email ?>" class="logout">Logout</a>
                </header>
                <div class="search">
                    <span class="text">select an user to start chat</span>
                    <input type="text" placeholder="enter name"  />
                    <button><i class="fas fa-search"></i></button>
                </div>
                <div class="users-list">
                    <?php
                        $sql2="select * from project_users where not email='$email' and group_id='$id'";
                        $result2=mysqli_query($conn,$sql2);
                        $output="";
                        if(mysqli_num_rows($result2)==0){
                            $output.="no users are available to chart";
                        }
                        else if(mysqli_num_rows($result2)>0){
                            while($row=mysqli_fetch_assoc($result2)){
                                $id=$row['email'];
                                $sql3="select * from messages where (incoming_id='$email' and outgoing_id='$id') or (incoming_id='$id' and outgoing_id='$email') order by msg_id desc limit 1";
                                $result3=mysqli_query($conn,$sql3);
                                $row2=mysqli_fetch_assoc($result3);
                                if(mysqli_num_rows($result3)>0){
                                    $message=$row2['msg'];
                                }
                                else
                                {
                                    $message="No mesage Available";
                                }
                                ($row['status']=="Offline now") ? $offline="offline" : $offline="online";
                    ?>
                    <a href="member_chat.php?email=<?php echo $row['email'] ?>">
                        <div class="content">
                            <div class="details">
                                <span><?php echo $row['name'] ?></span>
                                <p><?php echo $message ?></p>
                            </div>
                        </div>
                        <div class="status-dot <?php echo $offline ?>"><i class="fas fa-circle"></i></div>
                    </a>
                    <?php
                            }
                        }
                    ?>
                </div>
            </section>
        </div>
        <script src="javascript/users.js"></script>
    </body>
</html>
