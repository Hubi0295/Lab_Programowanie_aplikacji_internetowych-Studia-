<?php
include_once 'klasy/Baza.php';
include_once 'klasy/User.php';
include_once 'klasy/UserManager.php';
session_start();
$db = new Baza("localhost", "root", "", "klienci");
$sesid =  session_id();
$id = UserManager::getLoggedInUser($db, session_id());
if($id>0){
    echo "<p>Poprawne logowanie.<br />";
    echo "Zalogowany użytkownik o id=".$id." <br />";
    echo $db->select("SELECT * FROM users WHERE id=$id",["id","fullName","email"]);
    echo "<a href='processLogin.php?akcja=wyloguj' >
    Wyloguj</a> </p>";
}
else{
    header("location:processLogin.php");
}
?>
