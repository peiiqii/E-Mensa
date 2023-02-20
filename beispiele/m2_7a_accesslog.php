<?php
$file = fopen('./accesslog.txt', 'a');

if(!$file){
    die('Öffnen fehlgeschlagen');
}

if (isset($_SERVER['HTTP_USER_AGENT']) && isset($_SERVER['SERVER_ADDR'])){
    fwrite($file, "Daten: ".date("d/m/Y")."  Zeit: ".date("h:i:sa")."Webbrowser: ".$_SERVER['HTTP_USER_AGENT']." IP des Client: ".$_SERVER['SERVER_ADDR']."\n");
}

fclose($file);