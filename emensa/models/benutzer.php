<?php
function verfizieren($email,$password){
    $password=sha1($password);
    $link = connectdb();
    if (!$link){
        $ret=['fehler'=>'link nicht verfugbar '];
        return $ret;
    }
    $sql = "select * from benutzer where email=?  ";
    $bind_param='s';
    mysqli_begin_transaction($link);
    $statement = mysqli_stmt_init($link);
    mysqli_stmt_prepare($statement,$sql);

    mysqli_stmt_bind_param($statement,$bind_param,$email);
    mysqli_stmt_execute($statement);
    $result=mysqli_stmt_get_result($statement);
    $data=mysqli_fetch_array($result);

    $dt= new DateTime();
    $now = $dt->format('Y-m-d H:i:s');

    if(empty($data)){
        $ret=['fehler'=>'password oder email falsch '];
        mysqli_commit($link);
        mysqli_close($link);
        return $ret;

    }else{
        $erfolganmelden=false;
        if($data['passwort']==$password){
            $erfolganmelden=true;
        }

        if($erfolganmelden){
            $inkrementanzahl="call anmeldungeninkrementiert('$email') ";
            mysqli_query($link,$inkrementanzahl);
            $timeupdate="update benutzer set letzteanmeldung = '$now' where email='$email' and passwort= '$password' ";
            mysqli_query($link,$timeupdate);
            mysqli_commit($link);
            mysqli_close($link);
            return $data;
        }else{
            $timeupdate="update benutzer set letzterfehler = '$now' where email='$email' ";
            mysqli_query($link,$timeupdate);
            mysqli_commit($link);
            mysqli_close($link);
            $ret=['fehler'=>'password oder email falsch '];

            return $ret;
        }
    }
}

function idnamelist(){
    try {
        $link = connectdb();

        $sql = 'SELECT id,name FROM benutzer ORDER BY id';
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

function idtodata($id){
    $link = connectdb();
    $sql = "select * from benutzer where id=?  ";
    $bind_param='i';
    $statement = mysqli_stmt_init($link);
    mysqli_stmt_prepare($statement,$sql);

    mysqli_stmt_bind_param($statement,$bind_param,$id);
    mysqli_stmt_execute($statement);
    $result=mysqli_stmt_get_result($statement);

    $data=mysqli_fetch_array($result);
    return $data;
}