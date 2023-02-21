<?php
session_start();
$_SESSION["token"]=bin2hex(random_bytes(32));
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8"/>
    <title>Wunschgericht Formular</title>
</head>
<body>
<form action="wunschgerichttoken.php" method="post">
    <label>Name:
        <input type="text" name="ersteller_name" id="ersteller_name">
    </label>
    <label>E-Mail:
        <input type="email" name="email" id="email" required>
    </label><br>
    <label>Wunschgericht:
        <input type="text" name="name" id="name" required>
    </label>
    <label>Datum:
        <input type="date" name="datum" id="datum">
    </label><br>
    <label>Beschreibung:
        <textarea name="beschreibung" id="beschreibung" rows="10" cols="50" required></textarea>
    </label>
    <input type="submit" value="Wunsch abschicken">
    <input type="hidden" name="token" value="<?php print_r($_SESSION["token"]) ?>">
</form>

</body>
</html>

