<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/benutzer.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/kategorie.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/gericht.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/anmeldener.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/besucher.php');
class VerifizierenController
{
    function verfizieren(RequestData $rd){
        $postdata=$rd->getPostData();
        $email=$postdata['email'];
        $password=$postdata['password'];
        $ret=$postdata['ret'];
        $gerichtlist=db_gericht_select_all();
        $anmeldener=getallanmeldener();
        $anzahlbesucher=getbesucher();
        $data=verfizieren($email,$password);
        $logger=logger();
        if(!isset($data['fehler']) && $ret=='0'){
            $logger->info('anmelden erfolgreich');
            return view('emensa',['gerichtlist'=>$gerichtlist,'anmeldenlist'=>$anmeldener,'besucher'=>$anzahlbesucher,'benutzer'=>$data]);
        }elseif (!isset($data['fehler']) && $ret=='1'){
            $id=$data['id'];
            return view('bewertung',['id'=>$id,'gerichtid'=>-1,'data'=>$data]);
        } else{
            $logger->warning($data['fehler']);
            return view('anmeldungen',['fehlermeldungen'=>$data['fehler']]);
        }
    }

    function anmeldungen(RequestData $rd){
        $get=$rd->getGetData();
        $bewertung=$get['bewertung'];
        return view('anmeldungen',['ret'=>$bewertung]);
    }
}