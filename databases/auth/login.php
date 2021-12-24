<?php
session_start();

if (isset($_COOKIE["login"])) {
  if ($_COOKIE["login"] === 'true') {
    $_SESSION["login"] = true;
  }
}

if (isset($_SESSION["login"])) {
  header("Location:  http://localhost/learn/databases/index.php");
  exit;
}

require("../functions.php");
if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  //cek username in database
  $result = mysqli_query($conn, "SELECT * FROM register WHERE username='$username'");
  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      header("Location: http://localhost/learn/databases/index.php");
      $_SESSION["login"] = true;

      if (isset($_POST["remember"])) {
        setcookie("login", "true", time() + 120);
      }
      exit;
    }
  }
  $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
  label {
    display: block;
  }

  .error {
    color: red;
  }
  </style>
</head>

<body>
  <?php
  if (isset($error)) {
    echo "
      <h3 class='error'>username / password not valid</h3>
    ";
  }
  ?>
  <form action="" method="POST">
    <ul>
      <li>
        <label>Username</label>
        <input type="text" name="username">
      </li>
      <li>
        <label>Password</label>
        <input type="text" name="password">
      </li>
      <li>
        <input name="remember" type="checkbox" />
        <label>Remember Me</label>
      </li>
      <li>
        <button name="login" type="submit">Login</button>
      </li>
    </ul>
  </form>
</body>

</html>