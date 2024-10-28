<?php
$wybraneTutoriale="";
foreach($_REQUEST['jezyki'] as $jezyk) {
    $wybraneTutoriale .= $jezyk.", ";
}

echo "Wybrane tutoriale: $wybraneTutoriale <br>";
echo "Sposob zaplaty: $_REQUEST[sposobyPlatnosci] <br>";
if(isset($_REQUEST['nazwisko'])&&isset($_REQUEST['wiek'])&&isset($_REQUEST['email'])&&isset($_REQUEST['panstwo'])){
    $nazwisko = $_REQUEST['nazwisko'];
    $wiek = $_REQUEST['wiek'];
    $panstwo = $_REQUEST['panstwo'];
    $email = $_REQUEST['email'];
    echo "<a href=klient.php?nazwisko=$nazwisko&wiek=$wiek&panstwo=$panstwo&email=$email>Dane Klienta</a><br>";
}
else{
    echo "Niekompletne dane klienta<br>";
}
echo "<a href=$_SERVER[HTTP_REFERER]>Wroc do formularza(poprzedniej strony)</a>";

?>