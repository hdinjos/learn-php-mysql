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