<?php
$file = fopen('./en.txt', 'r');
if (!$file) {
    die('Öffnen fehlgeschlagen');
}

$translationList = [];
while (!feof($file)) {
    $line = fgets($file, 1024);
    $translationList[] = explode(";", $line);
}
fclose($file);

$translation = NULL;
if (isset($_GET['suchwort']) && !empty($_GET['suchwort'])) {
    foreach ($translationList as $word) {
        if ($word[0] == $_GET['suchwort']) {
            $translation = $word[1];
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Translator</title>
</head>
<body>
<h3>Translator</h3>
<form method="get">
    <input type="text" name="suchwort" placeholder="Suchwort">
    <button type="submit" name="submit">Suchen</button>
    <p><?php if (!empty($translation)) {
            echo $translation;
        } else if (empty($translation) && !empty($_GET['suchwort'])){
            echo "Das gesuchte Wort " . $_GET['suchwort'] . " ist nicht enthalten";
        }
        ?></p>
</form>
</body>
</html>