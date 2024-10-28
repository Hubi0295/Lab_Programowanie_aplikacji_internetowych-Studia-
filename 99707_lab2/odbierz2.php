<?php
foreach($_REQUEST as $key=>$value) {
    echo "$key = $value <br />";
   }
echo "var_dump Request<br>";
var_dump($_REQUEST);echo"<br>";
echo "print_r Request<br>";
print_r($_REQUEST) ;echo"<br>";
echo "var_dump Get<br>";
var_dump($_GET);echo"<br>";
echo "print_r Get<br>";
print_r($_GET);echo"<br>";
echo "var_dump Post<br>";
var_dump($_POST);echo"<br>";
echo "print_r Post<br>";
print_r($_POST);echo"<br>";
?>