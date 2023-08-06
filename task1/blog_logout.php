<?php
session_start();
error_reporting(0   );
session_destroy();
header("Location:blog_login.php?refresh=true");
exit();
?>