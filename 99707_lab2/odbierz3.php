<?php
if(isset($_GET['jezyki'])){
    foreach($_GET['jezyki'] as $animal){
        echo $animal;
    }
}

// foreach($_REQUEST['jezyki'] as $value) {
//     echo "$_POST['animal']";
// }
?>