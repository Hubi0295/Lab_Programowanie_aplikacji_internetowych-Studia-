<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            background-color: lightblue;
        }
        h2 {
            text-align: center;
        }
        .galeria img {
            width: 10%;
            padding-bottom: 8px;
            padding-right: 2px;
            float: left;
        }
    </style>
</head>
<body>
<?php
if (isset($_POST['zapisz']) && $_POST['zapisz'] == 'Zapisz' &&!isset($_GET['pic'])) {
    if (is_uploaded_file($_FILES['zdjecie']['tmp_name'])) {
        $typ = $_FILES['zdjecie']['type'];
        if ($typ === 'image/jpeg') {
            move_uploaded_file($_FILES['zdjecie']['tmp_name'],'./'.
            $_FILES['zdjecie']['name']);
            $link = $_FILES['zdjecie']['name'];
            $random = uniqid('img_'); //wygenerowanie losowej wartości
            $zdj = $random . '.jpg';
            copy($link, './' . $zdj); //utworzenie kopii zdjęcia
            list($width, $height) = getimagesize($zdj); //pobranie rozmiarów obrazu
            $wys = $_POST['wys']; //wysokość preferowana przez użytkownika
            $szer = $_POST['szer']; //szerokość preferowana przez użytkownika
            $skalaWys = 1;
            $skalaSzer = 1;
            $skala = 1;
            if ($width > $szer) $skalaSzer = $szer / $width;
            if ($height > $wys) $skalaWys = $wys / $height;
            if ($skalaWys <= $skalaSzer) $skala = $skalaWys;
            else $skala = $skalaSzer;
            //ustalenie rozmiarów miniaturki tworzonego zdjęcia:
            $newH = $height * $skala;
            $newW = $width * $skala;
            header('Content-Type: image/jpeg');
            $nowe = imagecreatetruecolor($newW, $newH); //czarny obraz
            $obraz = imagecreatefromjpeg($zdj);
            imagecopyresampled($nowe, $obraz, 0, 0, 0, 0,
            $newW, $newH, $width, $height);
            imagejpeg($nowe, './miniatury/mini-' . $link, 100);

            $kopia = imagecreatetruecolor($width, $height); //czarny obraz
            $obrazkopia = imagecreatefromjpeg($_FILES['zdjecie']['name']);
            imagecopyresampled($kopia, $obrazkopia, 0, 0, 0, 0,
            $width, $height, $width, $height);
            imagejpeg($kopia, './zdjecia/'. $link, 100);
            imagedestroy($nowe);
            imagedestroy($obraz);
            unlink($zdj);
            $dlugosc = strlen($link);
            $dlugosc -= 4;
            $link = substr($link, 0, $dlugosc);
            header('location:zdjecia.php?pic='.$link);
            unlink($_FILES['zdjecie']['name']);
        }
    else {
    header('location:zdjecia.html');
    } 
    }
}
if (isset($_GET['pic']) && !empty($_GET['pic']))
 {
        echo "<h2>Galeria zdjęć</h2>";
            $katalog=filter_input(INPUT_SERVER,'DOCUMENT_ROOT')."/99707_lab3.5/zdjecia";
            $kat=@opendir($katalog) or die("Nie można otworzyć katalogu");
            echo "<div class='galeria'>";
            $licznik =0;
            while ($plik = readdir($kat)){
                if($licznik>1){
                    echo "<a href=zdjecia/".$plik."><img src=miniatury/mini-".$plik." alt=mini-".$plik."/></a>";
                }
                echo $plik;
                $licznik++;
            }
            echo "</div>";
            closedir($kat);

 }
?>
</body>
</html>