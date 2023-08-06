<?php
include "connect.php";
session_start();
if ($_SESSION['email']==""){
    header("Location:blog_login.php?error= Your session experied, please login again");
    exit();
}
$email=$_SESSION['email'];
$sql1="select id from blog_users where email='$email'";
$result1=mysqli_query($conn,$sql1);  
$id=mysqli_fetch_assoc($result1)['id'];
$sql2="select * from blog_content where id='$id'";
$result2=mysqli_query($conn,$sql2);
?>
<html>
    <head>
        <link href="blog_first.css" rel="stylesheet">
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
            <label class="logo">CREATE YOUR BLOG</label>
            <ul>
                <li><a class="active" href="#home">HOME</a></li>
                <li><a href="add_blog.php">ADD BLOG</a></li>
                <li><a href="delete_blog.php">DELETE BLOG</a></li>
                <li><a href="#about">ABOUT</a></li>
                <li><a href="blog_logout.php">LOGOUT</a></li>
            </ul>
        </nav>
        <div class="container">
        <table > 
   <tbody> 
    <tr> 
     <th>ID</th> 
     <th>TITLE</TITle></th>
     <th>IMAGE</th> 
     <th>CONTENT</th>
     <th>VIDEO</th>       
    </tr>
     <?php
    if(mysqli_num_rows($result2)>0){
     while($res=mysqli_fetch_array($result2)){
     ?>
    <tr> 
     <td><?php echo $res['id']; ?></td>
     <td><?php echo $res['title']; ?></td>
     <td><?php echo '<img src="data:image;base64,'.base64_encode($res['image']).'" alt="image" style="width:100px;height:100px;">' ?></td>
     <td><?php echo $res['content']; ?></td> 
     <td><video width="100%" controls><source src="<?php echo 'upload/'.$res['video']; ?>"></td>
    </tr> 
   <?php 
   }
    }
    else
    {
        echo '<span class="message">No Blogs</span>';
    }
   ?> 
   </tbody> 
  </table> 
        </div>
    </body>
</html>