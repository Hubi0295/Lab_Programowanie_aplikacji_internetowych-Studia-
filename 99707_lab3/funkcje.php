<?php

if (isset($_REQUEST["submit"])) {
    $akcja = $_REQUEST["submit"]; 
    switch ($akcja) {
    case "zapisz":dodaj();break;
    case "pokaz":pokaz_zamowienie("");break;
    case "php":pokaz_zamowienie("PHP");break;
    case "cpp":pokaz_zamowienie("CPP");break;
    case "java":pokaz_zamowienie("Java");break;
    }
}

function dodaj() {
    $dane = "";
    if (isset($_REQUEST["nazwisko"])&&$_REQUEST["nazwisko"]!=""&&isset($_REQUEST["wiek"])&&$_REQUEST["wiek"]!=""&&isset($_REQUEST["email"])&&$_REQUEST["email"]!=""&&isset($_REQUEST["panstwo"])&&isset($_REQUEST["sposobyPlatnosci"])&&isset($_REQUEST["jezyki"])) {
        foreach($_POST  as $key=>$value){
            if($key!="submit"&&!is_array($value)){
                $dane .= htmlspecialchars($value).",";
            }
        }
        $wybraneTutoriale="";
        foreach($_REQUEST['jezyki'] as $jezyk) {
            $wybraneTutoriale .= $jezyk.", ";
        }
    
        $dane .=substr($wybraneTutoriale,0,strlen($wybraneTutoriale)-2)."\n";
    
        @ $wp = fopen("dane.txt","a",1);
        if ($wp)
        { 
            fwrite($wp,$dane);
        }
        else{
            echo "Nie mozna zapisac do pliku";
        }
        fclose($wp);
    }
    else{
        echo "<br>Nie podano wszystkich danych";
    }

}

function pokaz_zamowienie($tut) {
    @ $plik = file("dane.txt");
    echo "
        <table border=1>
        <tr>
            <th>Nazwisko</th><th>Wiek</th><th>Panstwo</th><th>Email</th><th>Sposob platnosci</th><th colspan=9>Jezyki</th>
        </tr>";
    if ($plik)
    { 
        for ( $i=0; $i<count($plik); $i++)
        {
            $dane = explode(",",$plik[$i]);
            if(str_contains(implode($dane), $tut)){
                echo "<tr>";
                for( $j=0;$j<count($dane);$j++){
                        echo "<td>".rtrim($dane[$j], ',')."</td>";
                }
                echo "</tr>";
            }
        }
    }
    else{
        echo "<br>Nie mozna otworzyc pliku<br>";
    }
    echo "</table>";

   }   
?>