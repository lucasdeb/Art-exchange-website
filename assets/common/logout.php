<?php
session_start();
session_destroy();
header("Location: http://localhost/pwfinal/assets/common/login.php");
die();
?>