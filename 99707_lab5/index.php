<?php
include_once 'klasy/User.php';

// $user1 = new User("marek", "Marek Radzikowski", "marek.r@wp.pl", "password123");
// $user2 = new User("Darek", "Darek Radzikowski", "darek.r@wp.pl", "password321");

// echo "po utworzeniu<br>";
// $user1->show();
// echo "<br>";
// $user2->show();


// $user2->setUserName("admin");
// $user2->setStatus(User::STATUS_ADMIN);
// echo "<br>";
// echo "po modyfikacji<br>";
// $user2->show();
include_once('klasy/RegistrationForm.php');
 $rf = new RegistrationForm(); //wyświetla formularz rejestracji
 if (filter_input(INPUT_POST, 'fullName',
 FILTER_SANITIZE_FULL_SPECIAL_CHARS)) {
 
    $user = $rf->checkUser(); //sprawdza poprawność danych
    if ($user === NULL)
    echo "<p>Niepoprawne dane rejestracji.</p>";
    else{
    echo "<p>Poprawne dane rejestracji:</p>";
    $user->show();
    $user->save("users.json");
    $user->saveXML("users.xml");
    }
 }
 User::getAllUsers("users.json");
 User::getAllUsersFromXML("users.xml");


?>
