<?php
//redirect to latihan1.php if index "name" in variable superglobal $_GET
if (!isset($_GET["name"]) || !isset($_GET["address"])){
  header("Location: latihan1.php");
  exit;
}

?>

<!DOCTYPE html>
<html>
<head></head>
<body>
<h1>Detail Mahasiswa</h1>

<p>Name: <?= $_GET["name"]; ?></p>
<p>Address: <?= $_GET["address"]; ?></p>
</html>
<a href="latihan1.php">Kembali ke awal</a>
<body>
</html>
