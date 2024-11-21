<?php
class User {
    const STATUS_USER = 1;
    const STATUS_ADMIN = 2;
    protected $userName;
    protected $passwd;
    protected $fullName;
    protected $email;
    protected $date;
    protected $status;
    //pozostale pola klasy:
    //...
    //metody klasy:
    function __construct($userName, $passwd, $fullName, $email){
        $this->userName = $userName;
        $this->passwd = password_hash($passwd, PASSWORD_DEFAULT);
        $this->fullName = $fullName;
        $this->email = $email;
        $this->date = date('Y-m-d');
        $this->status=User::STATUS_USER;
    }
    Public function show() {
        echo "Username: " . $this->userName . "<br>";
        echo "Password (hashed): " . $this->passwd . "<br>";
        echo "Full Name: " . $this->fullName . "<br>";
        echo "Email: " . $this->email . "<br>";
        echo "Date: " . $this->date . "<br>";
        echo "Status: " . $this->status . "<br>";
    }
    Public function setUserName($username){
        $this->$userName = $username;

    }
    Public function getUserName(){
        return $this->$userName;
    }
}
    
?>