<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $values = [
            1234,
            567.789,
            1,
            0,
            true,
            "0",
            "Typy w PHP",
            [1, 2, 3, 4],
            [],
            ["zielony", "czerwony", "niebieski"],
            ["Agata", "Agatowska", 4.67, true],
            date(DateTime::ATOM,time())
        ];
        for($i=0;$i<count($values);$i++){
            if(is_numeric($values[$i])){
                echo "To jest zmienna numeric: "."$values[$i]"."<br>";
            }
            if(is_bool($values[$i])){
                echo "To jest zmienna logiczna: "."$values[$i]"."<br>";
            }
            if(is_string($values[$i])){
                echo "To jest zmienna ciag znakow: "."$values[$i]"."<br>";
            }
            if(is_array($values[$i])){
                echo "To jest tablica: ";
                for($j =0;$j<count($values[$i]);$j++){
                    echo"index[$j]: ".$values[$i][$j].", ";
                }
                echo"<br>Koniec tablicy<br>";
            }
            if(is_object($values[$i])){
                echo "To jest obiekt: "."$values[$i]<br>";
            }
            
        }
        printf("Porownanie 1 i true operatorami ==: %d",1==true);
        echo "<br>";
        printf("Porownanie 1 i true operatorami ===: %d",1===true);
        echo "<br>";
        printf("Porownanie 0 i '0' operatorami ===: %d",0=="0");
        echo "<br>";
        printf("Porownanie 1 i '0' operatorami ===: %d",0==="0");
        echo "<br><br>";
        echo "var_dump: ";
        var_dump($values);
        echo "<br><br>";
        echo "print_r: ";
        print_r($values);
        ?>
    <a href="./galeria.php ">Link do galerii</a>

    </body>
</html>
