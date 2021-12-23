<?php
$a = 50;

function myFunc(){
	//$a = 20;
  global $a;
  echo $a;
}

myFunc();
  //echo $a;

var_dump($_GET);

?>
