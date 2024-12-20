<?php
class Baza
{
    private $mysqli; //uchwyt do BD
    public function __construct($serwer, $user, $pass, $baza)
    {
        $this->mysqli = new mysqli($serwer, $user, $pass, $baza);
        /* sprawdz połączenie */
        if ($this->mysqli->connect_errno) {
            printf("Nie udało sie połączenie z serwerem: %s\n", $this->mysqli->connect_errno);
            exit();
        }
        /* zmien kodowanie na utf8 */
        if ($this->mysqli->set_charset("utf8")) {
            //udało sie zmienić kodowanie
        }
    } //koniec funkcji konstruktora
    function __destruct()
    {
        $this->mysqli->close();
    }
    public function select($sql, $pola)
    {
        $tresc = "";
        if ($result = $this->mysqli->query($sql)) {
            $ilepol = count($pola); //ile pól
            $ile = $result->num_rows; //ile wierszy
            // pętla po wyniku zapytania $results
            $tresc .= "<table border=1><tbody>";
            $tresc .= "<tr>";
            for ($i = 0; $i < $ilepol; $i++) {
                $tresc .= "<th>" . $pola[$i] . "</th>";
            }
            $tresc .= "</tr>";
            while ($row = $result->fetch_object()) {
                $tresc .= "<tr>";
                for ($i = 0; $i < $ilepol; $i++) {
                    $p = $pola[$i];
                    $tresc .= "<td>" . $row->$p . "</td>";
                }
                $tresc .= "</tr>";
            }
            $tresc .= "</table></tbody>";
            $result->close(); /* zwolnij pamięć */
        }
        return $tresc;
    }
    public function insert($sql)
    {
        $x = $this->mysqli->query($sql);
        return $x;
    }
    public function delete($sql)
    {
        $x = $this->mysqli->query($sql);
        return $x;
    }
    public function getMysqli()
    {
        return $this->mysqli;
    }
    public function selectUser($login, $passwd, $tabela) {
        $id = -1;
        $sql = "SELECT * FROM $tabela WHERE userName='$login'";
        if ($result = $this->mysqli->query($sql)) {
        $ile = $result->num_rows;
        if ($ile == 1) {
        $row = $result->fetch_object(); //pobierz rekord z użytkownikiem
        $hash = $row->passwd; //pobierz zahaszowane hasło użytkownika
        //sprawdź czy pobrane hasło pasuje do tego z tabeli bazy danych:
        if (password_verify($passwd, $hash))
        $id = $row->id;
        }
        }
        return $id; //id zalogowanego użytkownika(>0) lub -1
    }
    public function selectUserBySession($session) {
        $id = -1;
        $sql = "SELECT userId FROM logged_in_users WHERE sessionId='$session'";
        if ($result = $this->mysqli->query($sql)) {
            $ile = $result->num_rows;
            if ($ile == 1) {
                $row = $result->fetch_object(); //pobierz rekord z użytkownikiem
                $id = $row->userId;
            }
        }
        return $id; //id zalogowanego użytkownika(>0) lub -1
    }
    public function protect_string($str) {
        return $this->mysqli->real_escape_string($str);
       }
    public function protect_int($nmb) {
        return (int)$nmb;
    }
       
} //koniec klasy Baza
