<html>
    <head>
    </head>
    <body>
    <?php
        include_once "klasy/Baza.php";
        include_once "klasy/RegistrationForm.php";
        include_once "klasy/User.php";
        $rejestracja = new RegistrationForm();
        //tworzymy uchwyt do bazy danych:
        $bd = new Baza("localhost", "root", "", "klienci");
        if (filter_input(INPUT_POST, "submit")) {
            $akcja = filter_input(INPUT_POST, "submit");
            switch ($akcja) {
            case "rejestruj" : $u=$rejestracja->checkUser();if($u!=null){$u->saveDB($bd);echo "Dodano";}else{echo "Nie dodano";} break;
            case "pokaz" : User::getAllUsersFromDB($bd);break;    
        }
        }
    ?>
    </body>
</htmL>
