<?php
$conn = mysqli_connect("localhost", "root", "", "tes_php");

function lists($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];

  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function addUser($data)
{
  global $conn;
  $name = htmlspecialchars($data["Name"]);
  $age = htmlspecialchars($data["Age"]);
  $address = htmlspecialchars($data["Address"]);
  $hobby = htmlspecialchars($data["Hobby"]);

  //upload image
  $avatar = upload();
  if (!$avatar) {
    return false;
  }

  $query = "INSERT INTO users(Name,Age,Address,Hobby,Avatar) VALUES ( '$name','$age', '$address', '$hobby','$avatar')";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function upload()
{
  $fileName = $_FILES["Avatar"]["name"];
  $fileSize = $_FILES["Avatar"]["size"];
  $fileError = $_FILES["Avatar"]["error"];
  $fileTmp = $_FILES["Avatar"]["tmp_name"];

  //check file not exise
  if ($fileError === 4) {
    echo "
      <script>alert('choice the image')</script>
    ";
    return false;
  }

  // checl type file
  $exeImgValid = ["jpg", "jpeg", "png"];
  $exeImg = explode(".", $fileName);
  $resultExe = strtolower(end($exeImg));
  if (!in_array($resultExe, $exeImgValid)) {
    echo "
      <script>alert('file type not support')</script>
    ";
    return false;
  }

  //limit size file
  if ($fileSize > 256000) {
    echo "
      <script>alert('file is too large')</script>
    ";
    return false;
  }

  //change unique namefile
  $newFileName = strval(uniqid() . "-" . $fileName);

  //upload file

  move_uploaded_file($fileTmp, 'img/' . $newFileName);
  return $newFileName;
}

function delUser($id)
{
  global $conn;
  $userId = $id["id"];
  $query = "DELETE FROM users WHERE id='$userId'";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function getUser($id)
{
  global $conn;
  $query = "SELECT * from users WHERE id=$id";
  $fetch = mysqli_query($conn, $query);
  $result = mysqli_fetch_assoc($fetch);
  return $result;
}

function updateUser($data, $id)
{
  global $conn;
  $name = $data["Name"];
  $age = $data["Age"];
  $address = $data["Address"];
  $hobby = $data["Hobby"];
  $oldAvatar = $data["Avatar"];

  if ($_FILES["Avatar"]["error"] === 4) {
    $avatar = $oldAvatar;
  } else {
    $avatar = upload();
    if (!$avatar) {
      $avatar = $oldAvatar;
    }
  }

  $query = "UPDATE users SET Name='$name', Age='$age', Address='$address', Hobby='$hobby', Avatar='$avatar' WHERE id=$id";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function search($keyword)
{
  $query  = "SELECT * FROM users WHERE
    name LIKE '%$keyword%' OR
    age LIKE '%$keyword%' OR
    address LIKE '%$keyword%' OR
    hobby LIKE '%$keyword%'
  ";
  $result = lists($query);
  return $result;
}


function register($data)
{
  global $conn;

  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);

  //check same password
  if ($password !== $password2) {
    echo "
      <script>
        alert('password not same, try again!')
      </script>
    ";
    return false;
  }

  if (!$username) {
    echo "
      <script>
        alert('username must fill');
      </script>
    ";
    return false;
  }

  //check username already axist
  $result = mysqli_query($conn, "SELECT username from register WHERE username='$username'");
  if (mysqli_fetch_assoc($result)) {
    echo "
      <script>
        alert('username is already  axist');
      </script>
    ";
    return false;
  }

  // encription
  $password = password_hash($password, PASSWORD_DEFAULT);

  //save
  mysqli_query($conn, "INSERT INTO register(username, password) VALUES ('$username', '$password')");
  return mysqli_affected_rows($conn);
}