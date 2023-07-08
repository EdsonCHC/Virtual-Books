<?php
session_start();
session_destroy();
header("Location: http://localhost/Virtual-Books/html/index.php");
?>