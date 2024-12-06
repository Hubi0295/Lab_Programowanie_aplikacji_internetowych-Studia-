<html>
    <head>
    </head>
    <body>
    <form method="POST" action="index.php">
    <strong>Zamawiam tutorial z języka:</strong><br>
    <?php
    echo "<label for=nazwisko>Nazwisko: </label><input type=text id=nazwisko name=nazwisko><br>";
    echo "<label for=wiek>Wiek: </label><input type=text id=wiek name=wiek><br>";
    $panstwo = ["Polska","Niemcy","Wielka_Brytania","Czechy"];
    echo "<label for=panstwo>Panstwo: </label><select name=panstwo id=panstwo>";
    for($i=0;$i<count($panstwo);$i++){
        echo "<option value=$panstwo[$i]>$panstwo[$i]</option>";
    }
    echo "</select><br>";
    echo "<label for=email>Email: </label><input type=email id=email name=email><br><br>";

    echo "<b>Zamawiam tutorial z jezyka: </b><br><br>";
    $jezyki = ["C", "CPP", "Java", "C#", "HTML", "CSS", "XML", "PHP", "javaScript"];
    for($i=0;$i<count($jezyki);$i++)
    {
        echo "<input type=checkbox value=$jezyki[$i] id=$i.jezyki name=jezyki[]><label for=$i.jezyki>$jezyki[$i]  </label>";
    }
    echo "<br><br><strong>Sposob zaplaty: </strong><br><br>";
    $sposobyPlatnosci = ["Master_Card","Visa","Przelew"];
    for($i=0;$i<count($sposobyPlatnosci);$i++)
    {
        echo "<input type=radio id=$i.platnosc value=$sposobyPlatnosci[$i] name=sposobyPlatnosci><label for=$i.platnosc>$sposobyPlatnosci[$i]</label>";
    }
    echo "<br><button type=reset>Wyczysc</button>";
    echo "<button type=submit name=submit value=zapisz>Zapisz</button>";
    echo "<button type=submit name=submit value=pokaz>Pokaz</button>";
    echo "<button type=submit name=submit value=usun>Usun</button>";
    echo "<button type=submit name=submit value=Java>Java</button>";
    echo "<button type=submit name=submit value=PHP>PHP</button>";
    echo "<button type=submit name=submit value=CPP>CPP</button>";
    echo "<button type=submit name=submit value=statystyki>statystyki</button>";
    ?>
    </form> 


</body>
</htmL>
<?php
 include_once "klasy/Baza.php";
 include_once "funkcje.php";
 //tworzymy uchwyt do bazy danych:
 $bd = new Baza("localhost", "root", "", "klienci");

 if (filter_input(INPUT_POST, "submit")) {
    $akcja = filter_input(INPUT_POST, "submit");
    switch ($akcja) {
    case "zapisz" : dodajdoBD($bd); break;
    case "pokaz" : echo $bd->select("select Nazwisko,Zamowienie from klienci", ["Nazwisko","Zamowienie"]); break;
    case "usun" : usunPoEmail($bd); break;
    case "Java" : WyszukajPoJezyku($bd, "Java"); break;
    case "PHP" : WyszukajPoJezyku($bd, "PHP"); break;
    case "CPP" : WyszukajPoJezyku($bd, "CPP"); break;
    case "statystyki" : IleRekordow($bd); break;

}
 }
?>