<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <style>
        body {
            background-color: lightblue;
        }

        h2 {
            text-align: center;
        }

        /* Definicja siatki dla galerii */
        .galeria {
            display: grid;
            width:80%;
            margin-left: 10%;
        }


        /* Style dla obrazków */
        .galeria img {
            width: 95%;
            padding-bottom: 8px;
            padding-right: 2px;
        }
    </style>
    <body>

    <?php
        echo "<h2>Galeria zdjęć</h2>";

        function galeria($rows, $cols) {
            $nazwa = 'obraz';
            $num = 1;
            echo "<div class='galeria' style='grid-template-columns: repeat($cols, 1fr);'>";
            for ($i = 1; $i < $cols * $rows+1; $i++) {
                echo "<img src='obrazki/$nazwa$i.JPG' alt='$nazwa$num' />";
            }

            echo "</div>";
        }
        galeria(3, 3);
        
    ?>
    <a href="./typy.php ">Link do typów</a>

    </body>
    </html>