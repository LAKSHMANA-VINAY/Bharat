<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
        <link rel="stylesheet" href="tasks.css" />
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
                <li><a class="active" href="assigntasks.php">ASSIGN TASKS</a></li>
                <li><a href="view_task_lead.php">VIEW TASKS</a></li>
            </ul>
        </nav>
        <?php if(isset($_GET['error'])){?>
        <p class="error"><?php echo $_GET['error'];?></p>
        <?php } ?>
        <?php if(isset($_GET['success'])){?>
        <p class="success"><?php echo $_GET['success'];?></p>
        <?php } ?>
        <div class="tasks">
            <h1>Assign Tasks</h1>
            <form action="add_task.php" method="POST" autocomplete="off">
                <div class="inputs">
                    <div class="input-group">
                        <input type="email" placeholder="Email" name="email" required>
                    </div>
                    <div class="input-group">
                        <input type="text" placeholder="Task Name" name="task" required>
                    </div>
                </div>
                <input type="hidden" name="work_status" value="Not Completed" >
                <button type="submit" name="submit" value="submit">Assign</button>
            </form>
        </div>
    </body>
</html>
