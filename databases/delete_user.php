<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: http://localhost/learn/databases/auth/login.php");
  exit;
}
?>

<?php
require "functions.php";
if (isset($_GET["id"])) {
  if (delUser($_GET) > 0) {
    echo "
      <script>
        document.location.href='index.php';
        alert('data berhasil dihapus');
      </script>
    ";
  } else {
    echo "terjadi kesalah";
  }
}