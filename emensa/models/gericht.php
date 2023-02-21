<?php
/**
 * Diese Datei enthält alle SQL Statements für die Tabelle "gerichte"
 */
function db_gericht_select_all() {
    try {
        $link = connectdb();

        $sql = 'SELECT * FROM gericht ORDER BY name';
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

function idgerichtlist(){
    try {
        $link = connectdb();

        $sql = 'SELECT id,name FROM gericht ORDER BY name';
        $result = mysqli_query($link, $sql);

        $da = mysqli_fetch_all($result, MYSQLI_BOTH);

        mysqli_close($link);
        $data=null;
        for($i=0;$i<sizeof($da);$i++){
            $data[$da[$i]['id']]=$da[$i]['name'];
        }

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

function suchengericht($gerichtid){
    try {
        $link = connectdb();

        $sql = "SELECT * FROM gericht where id=$gerichtid ";
        $result = mysqli_query($link, $sql);
        $data = mysqli_fetch_assoc($result);
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
