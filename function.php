<?php
  function intro($name){
    return "wellcom, my name is $name";
  };

echo intro("hendi");
?>
<br/>
<?php
echo date("d-m-Y", time()+(60*60*24*2));
?>
<br/>
<?php
echo date("l",mktime(0,0,0,3,18,1997));
?>
<br/>
<?php
echo strtotime("25 dec 2018");
?>
