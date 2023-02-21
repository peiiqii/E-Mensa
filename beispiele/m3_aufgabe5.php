<?php
$link = mysqli_connect(
    "localhost",
    "root",
    "root",
    "emensawerbeseite",
    3306
);

if (!$link) {
    echo "Verbindung fehlgeschlagen: ", mysqli_connect_error();
    exit();
}

$sql1 = "select id, name,preis_intern,preis_extern from gericht order by name asc limit 5";
$result1 = mysqli_query($link, $sql1);

$sql2 = "select ge.id, ge.name,ge.preis_intern,ge.preis_extern,group_concat(distinct geh.code)as code from gericht ge left join gericht_hat_allergen geh on geh.gericht_id=ge.id group by ge.id ";
$result2 = mysqli_query($link, $sql2);

$allergen_code = "select code, gericht_id from gericht_hat_allergen";
$result3 = mysqli_query($link, $allergen_code);

$allergen = "select code, name, type from allergen";
$result_allergen = mysqli_query($link, $allergen);

$usedAllergen = [];

echo '<table>';
echo '<tr>' . '<th>' . 'Name' . '</th>' . '<th>' . 'Preis_Intern' . '</th>' . '<th>' . 'Preis_Extern' . '</th>' . '<th>' . 'Allergen_code' . '</th>' . '</tr>';
while ($row = mysqli_fetch_assoc($result2)) {
    echo '<tr>' . '<td>' . $row['name'] . '</td>' . '<td>' . $row['preis_intern'] . '</td>' . '<td>' . $row['preis_extern'] . '</td>' . '<td>' . $row['code'] . '</td>' . '</tr>';
    while ($allergencode_row = mysqli_fetch_assoc($result3)) {
        if ($allergencode_row['gericht_id'] == $row['id']) {
            if (!in_array($allergencode_row['code'], $usedAllergen)) { // falls noch nicht vorhanden
                $usedAllergen[] = $allergencode_row['code'];
            }
        }
    }
}

while ($allergenrow = mysqli_fetch_assoc($result_allergen)) {
    foreach ($usedAllergen as $code) {
        if ($code == $allergenrow['code']) {
            echo '<li>' . $allergenrow['name'] . '</li>';
        }
    }
}


mysqli_close($link);
