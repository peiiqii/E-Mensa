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
?>