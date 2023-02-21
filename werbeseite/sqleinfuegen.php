<?php
$link = mysqli_connect("localhost",
    "root",
    "root",
    "emensawerbeseite",
    3306
);

if (!$link) {
    echo "Verbindung fehlgeschlagen: ", mysqli_connect_error();
    exit();
}

function sqleinfuegen($sqlquery,$mylink){
    $result=mysqli_query($mylink,$sqlquery);
    if (!$result) {
        echo "Fehler während der Abfrage:  ", mysqli_error($mylink);
        exit();
    }
    mysqli_close($mylink);
}
?>