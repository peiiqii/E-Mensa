<?php
/**
 * Praktikum DBWT. Autoren:
 * Shuyang, zhang, 3270926
 * Pei Qi, Lim, 3530737
 */
$Gerichte = [
    [   'name' => 'Rindfleisch mit Bambus, Kaiserschoten und rotem Paprika,dazu Nudeln',
        'uebersicht' => '<img id="Rindfleisch" src="img/Rindfleisch.jpg" width="150" height="80"',
        'price intern' => '3.50',
        'price extern' => '6.20'],
    [   'name'=> 'Hamburg',
        'uebersicht' => '<img id="hamburg" src="img/Hamburg.jpg" width="150" height="80"',
        'price intern' => '4.00',
        'price extern' => '7.00'],
    [   'name' => 'Spinatrisotto mit kleinen Samosateigecken und gemischter Salat',
        'uebersicht' => '<img id="spinatrisotto" src="img/Spinatrisotto.jpg" width="150" height="80"',
        'price intern' => '2.90',
        'price extern' => '5.30'],
    [   'name' => 'Pommes',
        'uebersicht' => '<img id="pommes" src="img/Pommes.jpg" width="150" height="80"',
        'price intern' => '2.00',
        'price extern' => '4.00']
];

function sqlanfragen($sqlfragen,$link){
    $result=mysqli_query($link,$sqlfragen);
    if (!$result) {
        echo "Fehler während der Abfrage:  ", mysqli_error($link);
        exit();
    }
    while ($row = mysqli_fetch_assoc($result)) {
        foreach($row as $key=>$value){
            echo $value.' ';
        }
        echo'<br>';
    }
    mysqli_free_result($result);
}
?>