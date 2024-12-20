<form action="css.php" method="post">
 <textarea name="tekst"></textarea><br />
 <input type="submit" name="wyslij" value="Wyślij" />
</form>
<div>
<?php
if (filter_input(INPUT_POST, 'wyslij')) {
    $tekst = filter_input(INPUT_POST, 'tekst', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tekst = filter_input(INPUT_POST, 'tekst', FILTER_SANITIZE_STRING);
    echo $tekst;
}
?>
</div>
