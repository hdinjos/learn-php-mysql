<?php
$err = false;
if (isset($_POST["submit"])){
	if ($_POST["username"] == "admin" && $_POST["password"] == "123"){
		header("Location: latihan4.php");
		exit;
	} else {
	  $err = true;		
	}
}
?>

<!DOCTYPE html>
<html>
<head></head>
<body>
  <h2>Login Here!</h2>
  <?php if ($err): ?>
  <h4>Username and password invalid</h4>
  <?php endif ?>
  <form action="" method="post">
    <label>Username</label>
    <input name="username" type="text" placeholder="username"/><br/>
    <label>Password</label>
    <input name="password" type="password" placeholder="password"/><br/>
    <button name="submit" type="submit">Login</button>
  </form>
</body>
</html>
