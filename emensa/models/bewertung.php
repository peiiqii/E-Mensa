<?php
function bewertungspeichern($beid,$geid,$bemerkung,$stern){
    $beid=(int)$beid;
    $geid=(int)$geid;
    $link = connectdb();
    $dt= new DateTime();
    $now = $dt->format('Y-m-d H-i-s');
    $beid=htmlspecialchars($beid);
    $geid=htmlspecialchars($geid);
    $bemerkung=htmlspecialchars($bemerkung);

    $sql="insert into bewertungen (benutzer_id,gericht_id,bemerkung,sterne_bewertung,bewertung_zeitpunkt) values ('$beid','$geid','$bemerkung','$stern','$now')";
    $result = mysqli_query($link, $sql);
    if(!$result){
        return false;
    }else{
        return true;
    }
}
function bewertungzeigen(){
    try {
        $link = connectdb();

        $sql = 'select * from bewertungen order by bewertung_zeitpunkt desc limit 30;';
        $result = mysqli_query($link, $sql);

        $data = mysqli_fetch_all($result, MYSQLI_BOTH);

        mysqli_close($link);
    }
    catch (Exception $ex) {
        $data = array(
            'id'=>'-1',
            'error'=>true,
            'name' => 'Datenbankfehler '.$ex->getCode(),
            'beschreibung' => $ex->getMessage());
    }
    finally {
        return $data;
    }
}
function getbewertungen($id){
    try {
        $link = connectdb();

        $sql = "select * from bewertungen where benutzer_id= '$id' ;";
        $result = mysqli_query($link, $sql);

        $data = mysqli_fetch_all($result, MYSQLI_BOTH);

        mysqli_close($link);

    }
    catch (Exception $ex) {
        $data = array(
            'id'=>'-1',
            'error'=>true,
            'name' => 'Datenbankfehler '.$ex->getCode(),
            'beschreibung' => $ex->getMessage());
    }
    finally {
        return $data;
    }
}
function loeschenbewertungen($id){
    $id=(int)$id;
    try {
        $link = connectdb();

        $sql = "delete from bewertungen where id= '$id' ;";
        mysqli_query($link, $sql);

        $data=true;

        mysqli_close($link);
    }
    catch (Exception $ex) {
        $data = array(
            'id'=>'-1',
            'error'=>true,
            'name' => 'Datenbankfehler '.$ex->getCode(),
            'beschreibung' => $ex->getMessage());
    }
    finally {
        return $data;
    }
}
function hervorheben($id,$hervor){
    try {
        $link = connectdb();
        if($hervor){
            $hervor=1;
        }else{
            $hervor=0;
        }
        $sql = "update bewertungen set hervorgehoben='$hervor' where id='$id' ;";
        $result = mysqli_query($link, $sql);

        $data=$hervor;

        mysqli_close($link);

    }
    catch (Exception $ex) {
        $data = array(
            'id'=>'-1',
            'error'=>true,
            'name' => 'Datenbankfehler '.$ex->getCode(),
            'beschreibung' => $ex->getMessage());
    }
    finally {
        return $data;
    }
}