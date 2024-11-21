<?php
class RegistrationForm
{
    protected $user;
    function __construct()
    { ?>
        <h3>Formularz rejestracji</h3>
        <p>
        <form action="index.php" method="post">
            Nazwa użytkownika: <br /><input name="userName" /><br />
            Haslo: <br /><input type="password" name="passwd" /><br />
            Pelna nazwa: <br /><input name="fullName" /><br />
            Email: <br /><input type="email" name="email" /><br />
            <button type="submit">Wyslij</button>
        </form>
        </p>
        <?php
    }
    function checkUser()
    { 
        $args = [
            'userName' => [
                'filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^[0-9A-Za-ząęłńśćźżó_\-]{2,25}$/']
            ],
            'passwd' => FILTER_DEFAULT, 
            'fullName' => [
                'filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^[\p{L}\s]{2,100}$/u']
            ],
            'email' => FILTER_VALIDATE_EMAIL
        ];
            $dane = filter_input_array(INPUT_POST, $args);
            $errors = "";
            foreach ($dane as $key => $val) {
                if ($val === false or $val === NULL or $val=="") {
                    $errors .= $key . " ";
            }
            }
        if ($errors === "") {
            $this->user=new User($dane['userName'], $dane['fullName'],
            $dane['email'],$dane['passwd']);
        } 
        else {
            echo "<p>Błędne dane:$errors</p>";
            $this->user = NULL;
        }
        return $this->user;
    }
}