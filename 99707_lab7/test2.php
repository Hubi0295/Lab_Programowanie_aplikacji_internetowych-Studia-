<?php
include("klasy/User.php");
session_start();

echo "ID ".session_id();
echo "<hr>";
echo "<br>";
if (isset($_SESSION['user'])) {
    $p1=$_SESSION['user'];
    echo "<p>Wartość elementu o kluczu 'user' z sesji: <br />".$p1. " </p>";
    $p1 = unserialize($_SESSION['user']);
    echo "<p>Obiekt po odtworzeniu: <br />";
    $p1->show();
    echo "</p>";
    }
echo "<hr>";
echo "<br>";
foreach ($_COOKIE as $key => $value) {
    echo $key." ". $value."<br>";
}
echo "<br>";
echo "<hr>";
echo '<a href="test1.php">Przejdź do test1.php</a>';
session_destroy();
if ( isset($_COOKIE[session_name()]) ) {
    setcookie(session_name(),'', time() - 42000, '/');
   }
   
?>
