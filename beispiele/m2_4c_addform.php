<?php
function addieren($a,$b)
{
    return $a+$b;
}

function multiplizieren($a,$b)
{
    return $a*$b;
}

$result=0;
if (isset($_GET['a']) && isset($_GET['b'])) {
    $a = (int) $_GET['a'];
    $b = (int) $_GET['b'];
    if (isset($_GET['addieren'])) {
        $result = addieren($a, $b);
    } elseif (isset($_GET['multiplizieren'])) {
        $result = multiplizieren($a, $b);
    }
}
?>

<html lang=de>
<head>
    <meta charset="UTF-8">
    <title>Formular</title>
</head>
<body>
<form action="m2_4c_addform.php" method="get">
    <fieldset>
        <legend>Rechner</legend>
        <input type="number" id="a" name="a" placeholder="a">
        <input type="number" id="b" name="b" placeholder="b"><br>
        <input type="submit" id="addieren" name="addieren" value="addieren">
        <input type="submit" id="multiplizieren" name="multiplizieren" value="multiplizieren"><br>
        <?php
        echo "Das Ergebnis lautet: ",$result;
        ?>
    </fieldset>
</form>
</body>
</html>