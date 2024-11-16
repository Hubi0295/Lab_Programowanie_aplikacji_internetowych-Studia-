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
        echo "Data utworzenia: ".$this->date->format('Y-m-d')." \n";
        echo "Status:  $this->status \n";
    }

    static function getAllUsers($plik){
        $tab = json_decode(file_get_contents($plik));
        foreach ($tab as $val){
        echo "<p>".$val->userName." ".$val->fullName." ".$val->email." ".$val->status." ".$val->date."</p>";
        }
    }
    function toArray(){
        $arr=[
        "userName" => $this->userName,
        "fullName" => $this->fullName,
        "email"=> $this->email,
        "passwd"=>$this->passwd,
        "status"=> $this->status,
        "date"=> $this->date->format("Y-m-d"),
        ];
        return $arr;
       }
    function save($plik){
        $tab = json_decode(file_get_contents($plik),true);
        array_push($tab,$this->toArray());
        file_put_contents($plik, json_encode($tab));
    }
    static function getAllUsersFromXML($plik) {
        $allUsers = simplexml_load_file($plik);
        echo "<ul>";
        foreach ($allUsers as $user):
        $userName=$user->userName;
        $date=$user->date;
        $fullName=$user->fullName;
        $email=$user->email;
        $status=$user->status;
        echo "<li>$userName, $fullName,$email,$status, $date  </li>";
        endforeach;
        echo "</ul>";
    }
    function saveXML($plik){
        $xml = simplexml_load_file($plik);
        $xmlCopy=$xml->addChild("user");
        $xmlCopy->addChild("userName", $this->userName);
        $xmlCopy->addChild("fullName", $this->fullName);
        $xmlCopy->addChild("passwd", $this->passwd);
        $xmlCopy->addChild("email", $this->email);
        $xmlCopy->addChild("status", $this->status);
        $xmlCopy->addChild("date", $this->date->format("Y-m-d"));
        $xml->asXML('users.xml'); 
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
