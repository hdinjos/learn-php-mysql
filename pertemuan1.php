<!DOCTYPE html>
<html>
  <head>
    <title>Belajar PHP</title>
  </head>
  <body>
  <?php $name = "hendi saputra";?>
  <h1><?php echo "nama saya adalah $name"; ?> <h1/>
  <?php
   $num1 = 5;
   $num2 = 7;
   $result = $num1 + $num2;
   echo "hasil dari penjumlahan $num1 + $num2 adalah $result";
   //concinting varible
   $firstName = "Hendi";
   $lastName = true;
   
   $fullName = $firstName . " " . $lastName;
   echo $fullName; 

   ?>
  </body>
</html>
