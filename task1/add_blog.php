<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Page</title>
  <link rel="stylesheet" href="add_blog.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
  <nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fa-solid fa-bars"></i>
    </label>
    <label class="logo">CREATE YOUR BLOG</label>
    <ul>
        <li><a href="blog_first.php">HOME</a></li>
        <li><a class="active" href="add_blog.php">ADD BLOG</a></li>
        <li><a href="delete_blog.php">DELETE BLOG</a></li>
        <li><a href="#about">ABOUT</a></li>
        <li><a href="blog_logout.php">LOGOUT</a></li>
    </ul>
</nav>
    <?php if(isset($_GET['error'])){?>
    <p class="error"><?php echo $_GET['error'];?></p>
    <?php } ?>
    <?php if(isset($_GET['sucess'])){?>
    <p class="sucess" ><?php echo $_GET['sucess'];?></p>
    <?php } ?>
  <div class="container">
    <h1>ADD YOUR BLOG</h1>
    <form action="store_content.php" method="POST" enctype="multipart/form-data">
      <div class="input-group">
        <input type="text" id="title" name="title" placeholder="Title" required>
      </div>
      <div class="input-group">
        Upload Image
        <input type="file" id="image" name="image" placeholder="Image URL" required>
      </div>
      <div class="input-group">
        <textarea id="content" placeholder="Content" name="content" rows="4" required></textarea>
      </div>
      Upload Video
      <div class="input-group">
        <input type="file" id="video" placeholder="Video" name="video" required>
      </div>
      <button type="submit" name="submit">Submit</button>
    </form>
  </div>
</body>

</html>
