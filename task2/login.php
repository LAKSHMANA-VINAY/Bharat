<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <nav>
            <label class="logo">PROJECT MANAGEMENT TOOL</label>
        </nav>
        <div class="main">
            <?php if(isset($_GET['error'])){?>
            <p class="error" style="color:black; padding-right:15%; font-size:20px;"><?php echo $_GET['error'];?></p>
            <?php } ?>
            <div class="container">
                <h1>Login</h1>
                <form action="user_verify.php" method="POST" autocomplete="off">
                <div class="inputs">
                <div class="input-group">
                    <input type="email" placeholder="Email" name="email" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Password" name="password" required>
                </div>
                <div class="input-group">
                    <select name="type">
                        <option value=''>Login As</option>
                        <option value="lead">Team Lead</option>
                        <option value="member">Team Member</option>
                    </select>
                </div>
                </div>
                <button type="submit" name="submit" value="submit">Login</button>
                </form>
                <div class="links">
                    <a href="lead_register.php">Register As Lead</a>
                    <span class="separator">|</span>
                    <a href="member_register.php">Register As Member</a>
                </div>
            </div>
        </div>
    </body>
</html>