<?php
session_start();
include("klasy/User.php");
$user = new User("Hubert2012","Hubert Szelepusta","Hubert.szelepusta@gmail.com","hasło");
$_SESSION['user'] = serialize($user);
echo "ID ".session_id();
echo "<hr>";
echo "<br>";
echo "<p>Wartość elementu o kluczu 'user' z sesji: <br />".$_SESSION['user']. " </p>";
echo "<p>Obiekt: <br />";
$user->show();
echo "<hr>";
echo "<br>";
foreach ($_COOKIE as $key => $value) {
    echo $key." ". $value."<br>";
}
echo "<br>";
echo "<hr>";
echo '<a href="test2.php">Przejdź do test2.php</a>';
?>
