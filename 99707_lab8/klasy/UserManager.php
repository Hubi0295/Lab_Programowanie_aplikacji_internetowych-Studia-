<?php
class UserManager {
    function loginForm() {
    ?>
    <h3>Formularz logowania</h3><p>
    <form action="processLogin.php" method="post">
    Nazwa użytkownika: <br /><input name="userName" /><br />
    Haslo: <br /><input type="password" name="passwd" /><br />
    <input type="submit" value="Zaloguj" name="zaloguj" />
    </form></p> <?php
    }
    function login($db) {
    $args = [
    'userName' => FILTER_SANITIZE_ADD_SLASHES,
    'passwd' => FILTER_SANITIZE_ADD_SLASHES
    ];
    $dane = filter_input_array(INPUT_POST, $args);
    $login = $dane["userName"];
    $passwd = $dane["passwd"];
    $userId = $db->selectUser($login, $passwd, "users");
    if ($userId >= 0) { 
        session_start();
        $Id_sesji = session_id();
        $update = new DateTime();
        $db->delete("DELETE FROM logged_in_users WHERE sessionId='$Id_sesji'");
        $dataTeraz = $update->format("Y-m-d H:i:s:u");
        $db->insert("INSERT INTO logged_in_users VALUES('$Id_sesji','$userId','$dataTeraz')");
    }
    return $userId;
    }
    function logout($db) {
    session_start();
    $sesId = session_id();
    $usID = UserManager::getLoggedInUser($db, $sesId);
    if($usID>0){
        $db->delete("DELETE FROM logged_in_users WHERE sessionId='$sesId'");
        session_destroy();
        if ( isset($_COOKIE[session_name()]) ) {
            setcookie(session_name(),'', time() - 42000, '/');
        }
    }
    else{
        echo "Użytkownik niezalogowany";
    }
    }
    static function getLoggedInUser($db, $sessionId) {
    $us = $db->selectUserBySession($sessionId);
    if ($us) {
        return $us;
    }
    else{
        return -1;
    }
   }
}
   
?>