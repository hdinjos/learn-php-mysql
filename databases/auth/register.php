<?php
require("../functions.php");

if (isset($_POST['register'])) {
  if (register($_POST) > 0) {
    echo "
      <script>
        alert('register success');
      </script>
    ";
  } else {
    echo mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi</title>
  <style>
  label {
    display: block;
  }
  </style>
</head>

<body>
  <form method="POST" action="">
    <ul>
      <li>
        <label>Username</label>
        <input name="username" type="text" />
      </li>
      <li>
        <label>Password</label>
        <input name="password" type="password" />
      </li>
      <li>
        <label>Confirm password</label>
        <input name="password2" type="password" />
      </li>
      <li>
        <button name="register">Register</button>
      </li>
    </ul>

  </form>
  <a href="login.php">Login Here</a>
</body>

</html>