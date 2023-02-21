<?php
const AllOW_GESCHLECHT= ['Frau', 'Herr'];

function newsletter(RequestData $requestData){
    $vorname = $requestData->query['Vorname'];
    $nachname = $requestData->query['Nachname'];
    $email = filter_var($requestData->query['email'], FILTER_SANITIZE_EMAIL);
    $geschlecht = $requestData->query['Anrede'];
    $benachrichtungen = $requestData->query['Benachrichtungsinterval'];

    $link = connectdb();

    $vorname = mysqli_real_escape_string($link, $vorname);
    $nachname = mysqli_real_escape_string($link, $nachname);
    $email = mysqli_real_escape_string($link, $email);
    if (!in_array($geschlecht, AllOW_GESCHLECHT)) {
        $geschlecht = "Herr";
    }
    $benachrichtungen = mysqli_real_escape_string($link, $benachrichtungen);
    $link->query("INSERT INTO kundeninfo(vorname,nachname,email,geschlecht,benachrichtungen) VALUES ('$vorname','$nachname','$email','$geschlecht','$benachrichtungen')");

    mysqli_close($link);
}