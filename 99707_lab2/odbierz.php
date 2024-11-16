<div>
 <h2>Dane odebrane z formularza:</h2>
 <?php
    if (isset($_REQUEST['nazwisko'])&&($_REQUEST['nazwisko']!="")) {
    $nazwisko = htmlspecialchars(trim($_REQUEST['nazwisko']));
    echo "Nazwisko: $nazwisko <br />";
    }
    else echo "Nie wpisano nazwiska <br />";
    if (isset($_REQUEST['wiek'])&&($_REQUEST['wiek']!="")) {
        $wiek = htmlspecialchars(trim($_REQUEST['wiek']));
        echo "Wiek: $wiek <br />";
    }
    else echo "Nie wpisano wiek <br />";
    if (isset($_REQUEST['panstwo'])&&($_REQUEST['panstwo']!="")) {
        $panstwo = htmlspecialchars(trim($_REQUEST['panstwo']));
        echo "Kraj: $panstwo <br />";
    }    
    else echo "Nie wpisano panstwo <br />";
    if (isset($_REQUEST['email'])&&($_REQUEST['email']!="")) {
        $email = htmlspecialchars(trim($_REQUEST['email']));
        echo "Email: $email <br />";
    }
    else echo "Nie wpisano panstwo <br />";
    $tutorial="";
    if (isset($_REQUEST['PHP'])) {
        $PHP = htmlspecialchars(trim($_REQUEST['PHP']));
        $tutorial .= " PHP, ";
    }
    if (isset($_REQUEST['C/C++'])) {
        $C = htmlspecialchars(trim($_REQUEST['C/C++']));
        $tutorial .= " C/C++, ";
    }
    if (isset($_REQUEST['Java'])) {
        $Java= htmlspecialchars(trim($_REQUEST['Java']));
        $tutorial .= " Java, ";
    }
    echo "Wybrano tutoriale: $tutorial <br />";
    if (isset($_REQUEST['sposob_platnosci'])) {
        $sposob_platnosci= htmlspecialchars(trim($_REQUEST['sposob_platnosci']));
        echo "sposob_platnosci: $sposob_platnosci <br />";
    }



 ?>
 </div>
