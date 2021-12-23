<?php
$conn = mysqli_connect("localhost", "root","", "tes_php");
$query = 'SELECT * FROM users';
$result = mysqli_query($conn, $query);
//$users = mysqli_fetch_assoc($result);

//var_dump(count($users));


?>



<table>
  <thead>
    <tr>
      <td>No</td>
      <td>Name</td>
      <td>Age</td>
      <td>Address</td>
      <td>Hobby</td>
    </tr>
  </thead>
  <tbody>
    <?php $number=1; ?>
    <?php while ($user = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td> <?= $number ?> </td>
      <td> <?= $user["Name"] ?> </td>
      <td> <?= $user["Age"] ?> </td>
      <td> <?= $user["Address"] ?> </td>
      <td> <?= $user["Hobby"] ?> </td>
   </tr>
   <?php $number++; ?>
   <?php endwhile; ?>
  </tbody>
</table>
