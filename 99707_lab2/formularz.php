<html>
<head>
</head>
<body>
<form method="GET" action="odbierz3.php">
        <label>Nazwisko: </label><input type="text" name="nazwisko"/><br>
        <label>Wiek: </label><input type="number" name="wiek"/><br>
        <label>Panstwo: <select name="panstwo"><option value="Polska">Polska</option><option value="Hiszpania">Hiszpania</option><option value="Wlochy">Wlochy</option></select><br>
        <label>Adres e-mail: </label><input type="email" name="email"/><br>
    <strong>Zamawiam tutorial z jezyka</strong><br>
    <?php
        $jezyki = ["C", "CPP", "Java", "C#", "HTML", "CSS", "XML", "PHP", "JavaScript"];
        for($i=0;$i<count($jezyki);$i++){
            echo "<label for=".$i.">".$jezyki[$i]."</label><input type=checkbox id=".$i." name=jezyki[] value=".$jezyki.">";
        }
    ?><br>
    <strong>Sposob zaplaty</strong><br>
    <label>Eurocard</label><input type="radio" name="sposob_platnosci" value="eurocard"/>
    <label>Visa</label><input type="radio" name="sposob_platnosci" value="visa"/>
    <label>Przelew</label><input type="radio" name="sposob_platnosci" value="przelew"/><br>
    <button type="submit" value="wyslij">Wyslij</button>
    <button type="reset" value="wyslij">Anuluj</button>

    </form>
</body>
</html>