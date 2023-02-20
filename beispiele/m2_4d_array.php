<?php
/**
 * Praktikum DBWT. Autoren:
 * shuyang, zhang, 3270926
 * Pei Qi, Lim, 3530737
 */

$famousMeals = [
    1 => ['name' => 'Currywurst mit Pommes',
        'winner' => [2001, 2003, 2007, 2010, 2020]],
    2 => ['name' => 'Hähnchencrossies mit Paprikareis',
        'winner' => [2002, 2004, 2008]],
    3 => ['name' => 'Spaghetti Bolognese',
        'winner' => [2011, 2012, 2017]],
    4 => ['name' => 'Jägerschnitzel mit Pommes',
        'winner' => 2019]
];

function keine_gewinner($famousMeals) {
    $winner_years = [];
    foreach ($famousMeals as $meal) {
        if (is_array($meal['winner'])) {
            $winner_years = array_merge($winner_years, $meal['winner']); //combine 2 arrays into 1
        } else {
            $winner_years = array_merge($winner_years, [$meal['winner']]);
        }
    }
    $years = [];
    for ($i = 2000; $i < 2020; $i++) {
        array_push($years, $i); //insert elements to the end of an array
    }
    return array_diff($years, $winner_years); //compare the values of two array and return the differences
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        li{
            margin-bottom: 10px;
        }
    </style>
    <title>Array</title>
</head>
<body>
<ol>
    <?php
    foreach ($famousMeals as $meal) {
        echo "<li>" . $meal['name']  . "<br>";
        if(is_array($meal['winner'])) {
            echo implode(", ", array_reverse($meal['winner'])); //Array zu Zeichenketten konvertieren
            //returns array in the reverse order
        } else {
            echo $meal['winner'];
        }
        echo "</li>";
    }
    ?>
</ol>

<?php
echo "Jahre mit keiner Gewinner: ";
echo implode(", ", keine_gewinner($famousMeals));
?>
</body>
</html>