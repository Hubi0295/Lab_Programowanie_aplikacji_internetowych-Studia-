<?php
include_once 'klasy/Baza.php';
include_once 'klasy/User.php';
include_once 'klasy/UserManager.php';
$db = new Baza("localhost", "root", "", "klienci");
$um = new UserManager();
if (filter_input(INPUT_GET, "akcja")=="wyloguj") {
    $um->logout($db);
}
if (filter_input(INPUT_POST, "zaloguj")) {
    $userId=$um->login($db); //sprawdź parametry logowania
    if ($userId > 0) {
        header("location:testLogin.php");
    } 
    else {
        echo "<p>Błędna nazwa użytkownika lub hasło</p>";
        $um->loginForm(); //Pokaż formularz logowania
    }
} 
else {
    //pierwsze uruchomienie skryptu processLogin
    $um->loginForm();
}
?>
