<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>
  <link rel="stylesheet" href="blog_register.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
        <?php if(isset($_GET['error'])){?>
         <p class="error"><?php echo $_GET['error'];?></p>
         <?php } ?>
         <?php if(isset($_GET['sucess'])){?>
         <p class="sucess" ><?php echo $_GET['sucess'];?></p>
         <?php } ?>
  <div class="container">
    <h1>Register</h1>
    <form onsubmit="return validateForm()" action="user_register.php" method="POST">
     <div class="inputs">
      <div class="input-group">
        <span class="icon"><i class="fa fa-user"></i></span>
        <input type="text" id="fullName" name="fullname" placeholder="Full Name" required>
      </div>
      <div class="input-group">
        <span class="icon"><i class="fa fa-envelope"></i></span>
        <input type="email" id="email" name="email" placeholder="Email" required>
      </div>
      <div class="input-group">
        <span class="icon"><i class="fa fa-lock"></i></span>
        <input type="password" id="password" name="password" placeholder="Password" required>
      </div>
      <div class="input-group">
        <span class="icon"><i class="fa fa-lock" onclick="show()"></i></span>
        <input type="password" id="confirmPassword" placeholder="Confirm Password" required>
      </div>
    </div>
      <button type="submit" name="submit">Register</button>
      <div class="links">
        <a href="blog_login.php">Login</a>
      </div>
    </form>
  </div>

  <script>
      window.onload = function () {
      document.getElementById("fullName").focus();
    }
    function show() {
      var passwordInput = document.getElementById("confirmPassword");
      var icon = document.querySelector(".fa-lock");

      if (passwordInput.type === "password") {
        passwordInput.type = "text";
      } else {
        passwordInput.type = "password";
      }
    }
    function validateForm() {
      var fullName = document.getElementById("fullName").value;
      var email = document.getElementById("email").value;
      var password = document.getElementById("password").value;
      var confirmPassword = document.getElementById("confirmPassword").value;

      if (fullName.trim() === "" || email.trim() === "" || password.trim() === "" || confirmPassword.trim() === "") {
        alert("All fields are required.");
        return false;
      }

      if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return false;
      }

      return true;
    }
  </script>
</body>

</html>
