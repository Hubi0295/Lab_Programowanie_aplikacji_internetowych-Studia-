<!DOCTYPE html>
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
        .galeria {
            display: grid;
            width:80%;
            margin-left: 10%;
        }
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
            echo "<div class='galeria' style='grid-template-columns: repeat($cols, 1fr);'>";
            for ($i = 1; $i < $cols * $rows+1; $i++) {
                echo "<img src='obrazki/$nazwa$i.JPG' alt='$nazwa$i' />";
            }

            echo "</div>";
        }
        galeria(2, 4);
        
    ?>
    <a href="./typy.php ">Link do typów</a>

    </body>
    </html>