<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: http://localhost/learn/databases/auth/login.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
  .img {
    width: 100px;
    height: 100px;
  }
  </style>
</head>

<body style="background-color:#eaeaea;">
  <?php
  require "functions.php";
  $users = lists("SELECT * FROM users");

  if (isset($_POST["search"])) {
    $users = search($_POST["keyword"]);
  }

  ?>

  <a href="./auth/logout.php">Logout</a>

  <h1>CRUD PHP database phpmyadmin</h1>
  <a href="add_user.php">Add</a> <br />
  <form action="" method="POST">
    <input type="text" name="keyword" placeholder="tulis apa aja" />
    <button type="submit" name="search">Cari</button>
  </form>
  <ul>
    <?php foreach ($users as $user) : ?>
    <li><?= $user["Name"] ?>
      <div>
        <img class="img" src="<?= 'img/' . $user['Avatar'] ?>" />
      </div>
      <a href="delete_user.php?id=<?= $user['id']; ?>" style="color:red;">delete</a>
      <a href="update_user.php?id=<?= $user['id']; ?>" style="color:orange;">edit</a>
    </li>
    <?php endforeach; ?>
  </ul>

</body>

</html>