<?php
echo "Nazwisko: $_REQUEST[nazwisko]<br>";
echo "Wiek: $_REQUEST[wiek]<br>";
echo "Panstwo: $_REQUEST[panstwo]<br>";
echo "Email: $_REQUEST[email]<br>";
// $wybraneTutoriale=join(", ",$_REQUEST['jezyki']);
$wybraneTutoriale="";
foreach($_REQUEST['jezyki'] as $jezyk) {
    $wybraneTutoriale .= $jezyk.", ";
}

echo "Wybrane tutoriale: $wybraneTutoriale <br>";
echo "Sposob zaplaty: $_REQUEST[sposobyPlatnosci] <br>";

echo "<br> dzialanie var_dump:  ";
var_dump($_REQUEST);
echo "<br><br>";

echo "Wartosci tablicy REQUEST<br>";
foreach($_REQUEST as $key=>$wartosc){
    if(is_array($wartosc)){
        echo "<b>Poczatek wyswietlania tablicy $key<br></b><ul>";
        for($i =0;$i<count($wartosc);$i++){
            echo"<li><t>Wartosc indeksu nr$i: $wartosc[$i] <br></li>";
        }
        echo "</ul><b>Koniec wyswietalania tablicy<br></b>";
    }
    else{
        echo "<ul><li>Wartosc $key: $wartosc <br></li></ul>";
    }
}
?>