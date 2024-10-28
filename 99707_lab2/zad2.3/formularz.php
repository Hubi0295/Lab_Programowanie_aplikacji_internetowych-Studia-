<html>
    <head>
 <!-- 



        
        zmiany zmiany zmiany



        
-->
    </head>
    <body>
    <form method="GET" action="odbierz4.php">
    <strong>Zamawiam tutorial z języka:</strong><br>
    <?php
    echo "<label for=nazwisko>Nazwisko: </label><input type=text id=nazwisko name=nazwisko><br>";
    echo "<label for=wiek>Wiek: </label><input type=text id=wiek name=wiek><br>";
    $panstwo = ["polska","niemcy","anglia","brazylia"];
    echo "<label for=panstwo>Panstwo: </label><select name=panstwo id=panstwo>";
    for($i=0;$i<count($panstwo);$i++){
        echo "<option value=$panstwo[$i]>$panstwo[$i]</option>";
    }
    echo "</select><br>";
    echo "<label for=email>Email: </label><input type=email id=email name=email><br><br>";

    echo "<b>Zamawiam tutorial z jezyka: </b><br><br>";
    $jezyki = ["C", "CPP", "Java", "C#", "HTML", "CSS", "XML", "PHP", "JavaScript"];
    for($i=0;$i<count($jezyki);$i++)
    {
        echo "<input type=checkbox value=$jezyki[$i] id=$i.jezyki name=jezyki[]><label for=$i.jezyki>$jezyki[$i]  </label>";
    }
    echo "<br><br><strong>Sposob zaplaty: </strong><br><br>";
    $sposobyPlatnosci = ["eurocard","visa","przelew-bankowy"];
    for($i=0;$i<count($sposobyPlatnosci);$i++)
    {
        echo "<input type=radio id=$i.platnosc value=$sposobyPlatnosci[$i] name=sposobyPlatnosci><label for=$i.platnosc>$sposobyPlatnosci[$i]</label>";
    }
    echo "<br><button type=submit>Wyslij</button><button type=reset>Anuluj</button>"
    ?>

    </form> 

    </body>
</htmL>
