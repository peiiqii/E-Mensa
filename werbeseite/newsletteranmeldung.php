<?php
/**
 * Praktikum DBWT. Autoren:
 * shuyang, zhang, 3270926
 * peiqi, lim, 3530737
 */

$action="formdata.html";
const AllOW_GESCHLECHT= ['Frau', 'Herr'];
function checkname($name) : bool{
    $allnichtsichtbar=true;
    if(strlen($name)==0){
        return false;
    }
    for($i=0;$i<strlen($name);$i++){
        $char=ord($name[$i]);
        if(($char>32||$char<0)&&$char!=127){
            $allnichtsichtbar=false;
            break;
        }
    }
    if($allnichtsichtbar){
        return false;
    }else{
        return true;
    }
}

function checkemail($email):bool{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return false;
    }
    $trashmail='trashmail.';
    $gleischtrashmail=true;
    for($i=0;$i<strlen($trashmail);$i++){
        if($i>(strlen($email)-1)){
            break;
        }else{
            if($trashmail[$i]!=$email[$i]){
                $gleischtrashmail=false;
                break;
            }
        }
    }
    if($gleischtrashmail){
        return false;
    }
    $trashmailsumme=['rcpt.at','damnthespam.at','wegwerfmail.de' ];
    foreach ($trashmailsumme as $value){
        if($value==$email){
            return false;
        }
    }
    return true;
}

function checkeverything(){
    if (!empty($_POST)) {
        $allcheck = true;
        if (empty($_POST["Vorname"])) {
            $allcheck=false;
            echo  "vorname is required ".'<br>';

        } else {
            if(!checkname($_POST["Vorname"])){
                $allcheck=false;
                echo "vorname ist leer ".'<br>';
            }
        }
        if (empty($_POST["Nachname"])) {
            $allcheck=false;
            echo  "Nachname is required ".'<br>';

        } else {
            if(!checkname($_POST["Nachname"])){
                $allcheck=false;
                echo "Nachname ist leer ".'<br>';
            }
        }
        if (empty($_POST["Email"])) {
            $allcheck=false;
            echo  "Email is required".'<br>';

        } else {
            if(!checkemail($_POST["Email"])){
                $allcheck=false;
                echo "E-Mail mit falschen Format".'<br>';
            }
        }
        if (empty($_POST['Datenschutz'])) {
            $allcheck=false;
            echo 'Datenschutz nicht bestimmt';
        }
    }

}

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
    <fieldset>
        <legend>Anmeldung</legend>
        <label for="frau">Anrede</label>
        <br>
        <input type="radio"  name="Anrede" value="Frau" id="frau">

        <label for="frau">Frau</label>
        <input type="radio"  name="Anrede" value="Herr" id="herr">
        <label for="herr"> Herr</label>
        <br>
        <br>
        <label for="vorname">Vorname*</label>
        <input type="text" id="vorname" name="Vorname"><br>
        <label for="nachname">Nachname*</label>
        <input type="text" id="nachname" name="Nachname" >
        <br>
        <label for="email">E-Mail*</label>
        <input type="text" name="Email" id="email" >
        <br>
        <label for="benachrichtunginterval">Benachrichtungsinterval</label>
        <select id="benachrichtunginterval" name="Benachrichtungsinterval">
            <option value="Tag">Tag</option>
            <option value="Wochen" selected>Woche</option>
            <option value="Monat">Monat</option>
        </select>
        <br>
        <input type="checkbox" value="Datenschutz" name="Datenschutz" id="datenschutz" >
        <label for="datenschutz">Datenschutzhinweise gelesen</label>
        <br>
        <input type="submit" value="Abschicken" >
        <br>
        *)Eingabe sind pflicht
        <?php
        checkeverything();
        ?>
    </fieldset>
</form>
</body>
</html>