<?php
ob_start();
session_start();
require("../functions.php");

//check coookie
if (isset($_COOKIE["uniqId"]) && isset($_COOKIE["uniqName"])) {
  $id = $_COOKIE["uniqId"];
  $name = $_COOKIE["uniqName"];

  $result = mysqli_query($conn, "SELECT * FROM register WHERE id='$id'");
  $row =  mysqli_fetch_assoc($result);
  if ($name === hash("sha256", $row["username"])) {
    var_dump($row);
    $_SESSION["login"] = true;
  }
}


if (isset($_SESSION["login"])) {
  header("Location: http://localhost/learn/databases/index.php");
  exit;
}

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  //cek username in database
  $result = mysqli_query($conn, "SELECT * FROM register WHERE username='$username'");
  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      $_SESSION["login"] = true;

      if (isset($_POST["remember"])) {
        setcookie("uniqId", $row['id'], time() + 120);
        setcookie("uniqName", hash("sha256", $row["username"]), time() + 120);
      }
      header("Location: http://localhost/learn/databases/index.php");
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