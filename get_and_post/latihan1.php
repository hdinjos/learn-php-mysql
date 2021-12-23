<!Doctype html>
<html>
<head></head>
<body>
<?php ?>
<h1>Latihan 1</h1>

<?php
$mahasiswa = [
  [
     "name" => "hendi saputra",
     "address" => "pati, jateng"
  ],
  [
     "name" => "alvin leonardo",
     "address" => "gresik, jatim"
  ],
]
?>
<ul>
 <?php foreach($mahasiswa as $mhs): ?>
  <li><a href="latihan2.php?name=
   <?=$mhs['name']; ?>&address=
   <?=$mhs['address']; ?>">
   <?= $mhs["name"]; ?>
  </li>
 <?php endforeach; ?>
</ul>

</body>
</html>
