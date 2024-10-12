<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hubert Szelepusta</title>
    </head>
    <body>
        <?php
        echo "<h2>Pierwszy skrypt PHP</h2>";
        $n = 123;
        $x = 10.123456789;
        printf("Domyślny forma: %d, %f<br>".
                "Zaokrąglenie do liczby całkowitej x=%d<br>".
                "z trzema cyframi po kropce x=%.03f",$n,$x,$x,$x);
        echo "<a href='./galeria.php'>link</a>"
        ?>
    </body>
</html>
