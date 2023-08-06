<?php
$refresh="false";
if(isset($_GET['refresh']))
{
  $refresh=$_GET['refresh'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="blog_login.css">
</head>

<body>
    <h1 class="main">Create Your Blog</h1>
        <?php if(isset($_GET['error'])){?>
         <p class="error"><?php echo $_GET['error'];?></p>
         <?php } ?>
  <div class="container">
    <h1>Login</h1>
    <form action="user_verify.php" method="POST">
    <div class="inputs">
      <div class="input-group">
        <span class="icon"><i class="fa-solid fa-envelope"></i></span>
        <input type="email" placeholder="Email" id="email" name="email" required>
      </div>
      <div class="input-group">
        <span class="icon"><i class="fa fa-lock" onclick="show()"></i></span>
        <input type="password" placeholder="Password" name="password" id="password" required>
      </div>
    </div>
      <button type="submit">Login</button>
    </form>
    <div class="links">
        <a href="#">Forgot Password?</a>
        <span class="separator">|</span>
        <a href="blog_register.php">Register Here</a>
      </div>
  </div>
  <script>
    window.onload = function () {
      if (<?php echo $refresh; ?> === "true") {
        window.location.reload();
        <?php $refresh="false"; ?>
      }
      document.getElementById("email").focus();
    }
    function show() {
      var passwordInput = document.getElementById("password");
      var icon = document.querySelector(".fa-lock");

      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.style.color="#45a049"
      } else {
        passwordInput.type = "password";
        icon.style.color="#aaa"
      }
    }
  </script>
</body>

</html>
