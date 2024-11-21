<?php

function walidacja() {
    $args = [
        'nazwisko' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[A-Z]{1}[a-ząęłńśćźżó-]{1,25}$/']
        ],
        'wiek' => [
            'filter' => FILTER_VALIDATE_INT,
            'options' => ['min_range' => 1, 'max_range' => 120]
        ],
        'panstwo' => [
            'filter' => FILTER_SANITIZE_STRING
        ],
        'email' => [
            'filter' => FILTER_VALIDATE_EMAIL
        ],
        'sposobyPlatnosci' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^(eurocard|visa|przelew-bankowy)$/i']
        ],
        'jezyki' => [
            'filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'flags' => FILTER_REQUIRE_ARRAY
        ]
    ];
     $dane = filter_input_array(INPUT_POST, $args);
     var_dump($dane);
     $errors = "";
     foreach ($dane as $key => $val) {
     if ($val === false or $val === NULL) {
     $errors .= $key . " ";
     }
     }
     if ($errors === "") {
     dopliku("dane.txt", $dane);
     } else {
     echo "<br>Nie poprawnie dane: " . $errors;
     }
}
function dopliku($nazwaPliku, $tablicaDanych) {
    $dane = "";
    $dane .= $tablicaDanych['nazwisko'].", ";
    $dane .= $tablicaDanych['wiek'].", ";
    $dane .= $tablicaDanych['panstwo'].", ";
    $dane .= $tablicaDanych['email'].", ";
    $dane .= $tablicaDanych['sposobyPlatnosci'].", ";
    $wybraneTutoriale="";
    foreach($tablicaDanych['jezyki'] as $jezyk) {
        $wybraneTutoriale .= $jezyk.", ";
    }
    $dane .=substr($wybraneTutoriale,0,strlen($wybraneTutoriale)-2);
    $dane.=PHP_EOL;
    @$wp = fopen("dane.txt","a",1);
    if ($wp)
    { 
        fwrite($wp,$dane);
    }
    fclose($wp);
    echo "<p>Zapisano: <br /> $dane</p>";
}
function dodaj() {
    echo "<h3>Dodawanie do pliku:</h3>";
    walidacja();
}

function pokaz_zamowienie($tut) {
    @ $plik = file("dane.txt");
    if ($plik)
    { 
        echo "
        <table border=1>
        <tr>
            <th>Nazwisko</th><th>Wiek</th><th>Email</th><th>Panstwo</th><th>Sposob platnosci</th><th colspan=9>Jezyki</th>
        </tr>";
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
        echo "</table>";
    }
    else{
        echo "<br> Nie udalo sie wyswietlic pliku";
    }
   }   
function statystyki(){
    @ $plik = file("dane.txt");
    if ($plik)
    { 
        $liczba_ogolem = count($plik);
        echo "<br>Liczba wszystkich zamowien: ".$liczba_ogolem."<br>";
        $under18=0;
        $above49=0;
        for ( $i=0; $i<count($plik); $i++)
        {
            $dane = explode(",",$plik[$i]);
            if((int)rtrim($dane[1], ',')<18){
                $under18++;
            }
            if((int)rtrim($dane[1], ',')>49){
                $above49++;
            }
        }
        echo "Liczba osob ponizej 18: ".$under18."<br>";
        echo "Liczba osob powyzej 49: ".$above49."<br>";

    }
    else{
        echo "<br> Nie udalo sie wyswietlic pliku";
    }
}
?>
