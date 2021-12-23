<style>
  .odd {
    background-color: #eaeaea;
  }
</style>
<!-- for php -->

<table>
<?php for ($i=1; $i<=10; $i++): ?>
  <?php if ($i%2 == 0): ?>
   <tr class="odd">
  <?php else: ?>
   <tr>
  <?php endif; ?>
   <?php for ($j=1; $j<=5; $j++): ?>
   <td><?= "$i,$j" ?></td> <?php //shorthand <?php echo adalah <?= ?>
   <?php endfor; ?>
  </tr>
<?php endfor; ?>
</table>

<!-- if php -->
<?php
  $rain = 'mendung';
  if ($rain == 'hujan'){
    echo "saya bawa payung";
  } else if($rain == 'mendung'){
    echo "mau hujan";
  } else {
    echo "saya tidak bawa payung";
  }

?>

<!-- penerapan for dan if -->

<table>
<?php for ($i=1; $i<=3; $i++): ?>
  <tr>
   <?php for ($j=1; $j<=5; $j++): ?>
   <td><?= "$i,$j" ?></td> <?php //shorthand <?php echo adalah <?= ?>
   <?php endfor; ?>
  </tr>
<?php endfor; ?>
</table>
