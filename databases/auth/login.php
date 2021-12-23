<?php
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
    }
  }
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
  </style>
</head>

<body>
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
        <button name="login" type="submit">Login</button>
      </li>
    </ul>
  </form>
</body>

</html>