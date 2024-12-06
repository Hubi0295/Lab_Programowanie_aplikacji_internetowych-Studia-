<?php

function dodajdoBD($bd){
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
            'options' => ['regexp' => '/^(Master_Card|Visa|Przelew)$/i']
        ],
        'jezyki' => [
            'filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'flags' => FILTER_REQUIRE_ARRAY
        ]
    ];
     $dane = filter_input_array(INPUT_POST, $args);
     $sql="Insert into klienci values(NULL, ";
     $errors = "";
     foreach ($dane as $key => $val) {
        if ($val === false or $val === NULL) {
            $errors .= $key . " ";
        }
        else if($key != "sposobyPlatnosci"){
            if(is_array($val)){
                $sql .= "'";
                foreach($val as $k =>$v){
                    if($v == "CPP" || $v == "Java" || $v == "PHP" ){
                        $sql.= $v.",";
                    }
                    else{
                        echo "Nie można dodać do zamowienia jezyka ".$v."<br>";
                    }
                }
                $sql =substr($sql,0,strlen($sql)-1);
                $sql .= "', ";
            }
            else{
            $sql.= "'".$val."', ";
            }
        }
     }
     if($dane["sposobyPlatnosci"] != false && $dane["sposobyPlatnosci"] != NULL){

        $sql .= "'".$dane["sposobyPlatnosci"]."')";
     }
     else{
        $errors .= "sposobyPlatnosci" . " ";
     }
     if ($errors === "") {
        if($bd->insert($sql)){
            echo "Dodano do bazy";
        }
        else{
            echo "Nie dodano do bazy";
        }
     } else {
     echo "<br>Nie poprawnie dane:" . $errors;
     echo "<br>Nie dodano do bazy";
     }
   }
function IleRekordow($bd){
    $sql = "Select Count(*) as Ile_rekordow_jest_w_bazie FROM KLIENCI;";
    echo $bd->select($sql, ["Ile_rekordow_jest_w_bazie"]);
}
function WyszukajPoJezyku($bd, $jezyk){
    $sql = "SELECT Nazwisko,Zamowienie FROM klienci WHERE Zamowienie REGEXP '".$jezyk."'";
    echo $bd->select($sql, ["Nazwisko","Zamowienie"]);
}
function usunPoEmail($bd){
    $args = [
        'email' => [
            'filter' => FILTER_VALIDATE_EMAIL
        ],
    ];
    $dane = filter_input_array(INPUT_POST, $args);
    $sql = "DELETE FROM KLIENCI WHERE EMAIL=";
    $errors="";
    if($dane["email"] != false && $dane["email"] != NULL){
        $sql .= "'".$dane["email"]."';";
    }
    else{
        $errors .= "Email" . " ";
    }
    if ($errors === "") {
        if($bd->delete($sql)){
            echo "Usunieto z bazy";
        }
        else{
            echo "Nie usunieto do bazy";
        }
    }
    else {
        echo "<br>Nie poprawnie dane:" . $errors;
        echo "<br>Nie usunieto z bazy";
    }
}
?>
