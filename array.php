<?php
  $fruits = ["semangka","mangga", "jeruk"];
  for ($i=0; $i<count($fruits); $i++){
	  echo $fruits[$i];
  }
?>

<?php for ($i=0;$i<count($fruits);$i++): ?>
  <h5>
   <?= $fruits[$i] ?>
  </h5>
<?php endfor; ?>

<?php
$users = [
  ["name" => "hendi", "origin" => "pati"],
  ["name" => "arif", "origin" => "padang"],
  ["name" => "ardan", "origin" => "jakarta"]
]
?>

<?php //array asosiasi ?>
<h2>List users</h2>
<?php foreach($users as $u): ?>
<ul>
  <li>Name: <?= $u["name"]; ?></li>	
  <li>Asal: <?= $u["origin"]; ?></li>	
</ul>
<?php endforeach; ?>
