<?php
session_start();
setcookie("loginName", null, -1);
setcookie("loginId", null, -1);
session_destroy();
header("location:index.php");
?>