<?php
require "functions.php";
$user = getUser($_GET["id"]);

if (isset($_POST["submit"])) {
  if (updateUser($_POST, $_GET['id']) > -1) {
    echo "
      <script>
        alert('update berhasil');
        document.location.href='index.php'; 
      </script>
    ";
  } else {
    echo mysqli_error($conn);
    echo "update gagal";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
</head>

<body>
  <h1>Update user</h1>

  <form method="POST" action="" enctype="multipart/form-data">
    <input type="text" hidden name="Avatar" value="<?= $user['Avatar']; ?>" />
    <div>
      <input type="text" placeholder="Name" name="Name" value="<?= $user['Name']; ?>" />
    </div>
    <div>
      <input type="text" placeholder="Age" name="Age" value="<?= $user['Age']; ?>" />
    </div>
    <div>
      <input type="text" placeholder="Address" name="Address" value="<?= $user['Address']; ?>" />
    </div>
    <div>
      <input type="text" placeholder="Hobby" name="Hobby" value="<?= $user['Hobby']; ?>" />
    </div>
    <div>
      <img src="<?= 'img/' . $user['Avatar']; ?>" /> <br />
      <input type="file" placeholder="Avatar" name="Avatar" />
    </div>
    <div>
      <input type="submit" value="Update" name="submit" />
    </div>
  </form>

</body>

</html>