<html>
    <head>
    
    </head>
    <body>
    <h1><b>Wybierz technologie ktora znasz:</b></h1><br>
    <form method="POST">
    <?php
    $jezyki = ["C", "CPP", "Java", "C#", "HTML", "CSS", "XML", "PHP", "javaScript"];
    for($i=0;$i<count($jezyki);$i++)
    {
        echo "<input type=checkbox value=$jezyki[$i] id=$i.jezyki name=jezyki[]><label for=$i.jezyki>$jezyki[$i]  </label><br>";
    }
    ?>
    <button type="submit" name="submit">Wyslij</button>
    </form>
    <?php
    if(isset($_REQUEST['submit']) && isset($_REQUEST['jezyki'])){
        $dane = $_REQUEST['jezyki'];
        @ $plik = file("ankieta.txt");
        $tablica;
        if ($plik)
        { 
            for($i=0;$i<count($plik);$i++){
                $tresc = explode(":",$plik[$i]);
                $tablica[$tresc[0]]=(int)$tresc[1];
            }
        }
        for($i=0;$i<count($dane);$i++){
            if(isset($tablica[$dane[$i]])){
                $tablica[$dane[$i]]= $tablica[$dane[$i]]+1;
            }
            else{
                $tablica[$dane[$i]]=1;
            }
        }

        $wynik = "";
        foreach($tablica as $key=>$value){
            $wynik .= $key.":".$value.PHP_EOL;
            echo $key.":".$value."<br>";
        }

        @$wp = fopen("ankieta.txt","w",1);
        if ($wp)
        { 
            fwrite($wp,$wynik);
        }
        fclose($wp);

  
        
    }
    ?>
    </body>
</html>