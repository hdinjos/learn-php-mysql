<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();
header("Location: http://localhost/learn/databases/auth/login.php");
exit;