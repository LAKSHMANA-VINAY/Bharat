<html>
    <head>
        <link rel="stylesheet" href="member_register.css">
    </head>
    <body>
        <nav>
            <label class="logo">PROJECT MANAGEMENT TOOL</label>
        </nav>
        <?php if(isset($_GET['error'])){?>
        <p class="error"><?php echo $_GET['error'];?></p>
        <?php } ?>
        <?php if(isset($_GET['success'])){?>
        <p class="success"><?php echo $_GET['success'];?></p>
        <?php } ?>
        <div class="lead-main">
            <h1>Register As Team Member</h1>
            <form action="after_member_register.php" method="POST">
                <div class="inputs">
                    <div class="input-group">
                        <input type="text" placeholder="Name" name="name" required>
                    </div>
                    <div class="input-group">
                        <input type="email" placeholder="Email" name="email" required>
                    </div>
                    <div class="input-group">
                        <input type="password" placeholder="Password" name="password" required>
                    </div>
                    <div class="input-group">
                        <input type="text" placeholder="Group Id(Number)" name="id" required>
                    </div>
                    <input type="hidden" name="type" value="member">
                    <input type="hidden" name="status" value="Offline now">
                </div>
                <button type="submit" name="submit" value="submit">Register</button>
            </form>
            <div class="links">
                <a href="login.php">Login</a>
            </div>
        </div>
    </body>
</html>