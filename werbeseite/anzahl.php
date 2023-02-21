<?php
function writebesucher(){
    $file = fopen('anmeldenzahl.txt', 'r');
    if (!$file) {
        die('Öffnen fehlgeschlagen');
    }
    $zahl = fgets($file, 1024);
    if(empty($zahl)){
        $zahl=0;
    }
    $zahl++;
    $file=fopen('anmeldenzahl.txt', 'w');
    fwrite($file,$zahl);
    fclose($file);
}

function readanmeldungen()
{
    $file = fopen('anmeldenzahl.txt', 'r');
    if (!$file) {
        die('Öffnen fehlgeschlagen');
    }
    $zahl = fgets($file, 1024);
    echo $zahl;
    fclose($file);
}