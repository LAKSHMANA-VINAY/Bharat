<?php
session_start();
include "connect.php";
?>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
        <link rel="stylesheet" href="main.css" />
    </head>
    <body>
        <div class="chat-wrapper">
            <section class="chat-area">
                <header>
                    <?php
                        $user_email=$_GET['email'];
                        $email=$_SESSION['email'];
                        $sql="select * from project_users where email='$user_email'";
                        $result=mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                        }
                    ?>
                    <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                        <div class="details">
                            <span><?php echo $row['name'] ?></span>
                            <p><?php echo $row['status'] ?></p>
                        </div>
                </header>
                <div class="chat-box">

                </div>
                <form action="#" class="typing-area" autocomplete="off">
                    <input type="hidden" name="outgoing_id" value="<?php echo $email ?>" >
                    <input type="hidden" name="incoming_id" value="<?php echo $user_email ?>" >
                    <input type="text" name="message" class="input-field" placeholder="type here something">
                    <button><i class="fab fa-telegram-plane"></i></button>
                </form>
            </section>
        </div>
        <script src="javascript/chat.js"></script>
    </body>
</html>
