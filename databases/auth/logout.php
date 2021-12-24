<?php
//delete session
session_start();
$_SESSION = [];
session_unset();
session_destroy();

//delete cookie
setcookie("uniqId", "", time() + 3600);
setcookie("uniqName", "", time() + 3600);
header("Location: http://localhost/learn/databases/auth/login.php");
exit;