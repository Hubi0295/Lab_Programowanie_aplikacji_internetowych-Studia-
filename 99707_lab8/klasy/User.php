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


    public function __construct($userName, $fullName, $email, $passwd) {
        $this->userName = $userName;
        $this->fullName = $fullName;
        $this->email = $email;
        $this->passwd = password_hash($passwd, PASSWORD_DEFAULT); 
        $this->status = self::STATUS_USER;
        $this->date = new DateTime();
    }

 
    public function show() {
        echo "UserName: $this->userName \n";
        echo "FullName: $this->fullName \n";
        echo "Email: $this->email \n";
        echo "Data utworzenia: ".$this->date->format('Y-m-d H:i:s')." \n";
        echo "Status:  $this->status \n";
    }
    static function getAllUsersFromDB($db){
        echo $db->select("Select * FROM users",["id","userName","fullName","passwd","status","date"]);
    }
    public function saveDB($db){
        $db->insert("Insert into users values(NULL,'".$this->userName."','".$this->fullName."','".$this->email."','".$this->passwd."','".$this->status."','".$this->date->format('Y-m-d H:i:s')."')");    
    }
       
    public function setUserName($userName) {
        $this->userName = $userName;
    }

    public function getUserName() {
        return $this->userName;
    }


    public function setStatus($status) {
        $this->status = $status;
    }

    public function getStatus() {
        return $this->status;
    }


    public function setFullName($fullName) {
        $this->fullName = $fullName;
    }

    public function getFullName() {
        return $this->fullName;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setPasswd($passwd) {
        $this->passwd = password_hash($passwd, PASSWORD_DEFAULT);
    }

    public function getPasswd() {
        return $this->passwd;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getDate() {
        return $this->date;
    }
}

?>
