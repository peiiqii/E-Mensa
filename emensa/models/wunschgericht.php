<?php
function insertwunschgericht(RequestData $request){
    $name = $request->query['name'];
    $beschreibung = $request->query['beschreibung'];
    $date = $request->query['datum'];
    $ersteller_name = $request->query['ersteller_name'];
    $email = filter_var($request->query['email'], FILTER_SANITIZE_EMAIL);

    $link = connectdb();

    $name = mysqli_real_escape_string($link, $name);
    $beschreibung = mysqli_real_escape_string($link, $beschreibung);
    $date = mysqli_real_escape_string($link, $date);
    $ersteller_name = mysqli_real_escape_string($link, $ersteller_name);
    $email = mysqli_real_escape_string($link, $email);

    htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    htmlspecialchars($beschreibung, ENT_QUOTES, 'UTF-8');
    htmlspecialchars($date, ENT_QUOTES, 'UTF-8');
    htmlspecialchars($ersteller_name, ENT_QUOTES, 'UTF-8');
    htmlspecialchars($email, ENT_QUOTES, 'UTF-8');

    $link->query("INSERT INTO wunschgericht (name,beschreibung,erstellungsdatum,ersteller_name,email) VALUES ('$name','$beschreibung','$date','$ersteller_name','$email')");

    mysqli_close($link);
}