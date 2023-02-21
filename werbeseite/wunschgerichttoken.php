<?php
session_start();
if(!isset($_SESSION["token"])||!isset($_POST["token"])){
    exit("brauchen token");
}

if($_POST["token"]==$_SESSION["token"]){
    include_once "sqleinfuegen.php";
    global $link;
    $name = $_POST['name'];
    $beschreibung = $_POST['beschreibung'];
    $date = $_POST['datum'];
    $ersteller_name = $_POST['ersteller_name'];
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

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

    $sql = "INSERT INTO wunschgericht (name,beschreibung,erstellungsdatum,ersteller_name,email) VALUES ('$name','$beschreibung','$date','$ersteller_name','$email')";
    sqleinfuegen($sql, $link);
    unset($_SESSION["token"]);
}
?>
