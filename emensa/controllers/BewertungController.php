<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/bewertung.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/benutzer.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/kategorie.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/gericht.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/anmeldener.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/besucher.php');
class BewertungController
{
    function bewertungen(RequestData $rd){
        $getdata=$rd->getGetData();
        $id=$getdata['id'];
        $gerichtid=isset($getdata['gerichtid'])?$getdata['gerichtid']:-1;
        $gericht = suchengericht($gerichtid);

        return view('bewertung',['id'=>$id,'gerichtid'=>$gerichtid,'gericht'=>$gericht]);
    }

    function bewertungspeichern(RequestData $rd){
        $get=$rd->getGetData();
        $bemerkung=$get['bemerkung'];
        $benutzerid=$get['benutzer_id'];
        $gerichtid=$get['gericht_id'];
        $sterne=$get['sterne_bewertung'];
        $data=idtodata($benutzerid);
        $gerichtlist=db_gericht_select_all();
        $anmeldener=getallanmeldener();
        $anzahlbesucher=getbesucher();
        bewertungspeichern($benutzerid,$gerichtid,$bemerkung,$sterne);
        return view('emensa',['gerichtlist'=>$gerichtlist,'anmeldenlist'=>$anmeldener,'besucher'=>$anzahlbesucher,'benutzer'=>$data]);
    }

    function bewertungenanzeigen(RequestData $rd){
        $bewertungen=bewertungzeigen();
        $listbe=idnamelist();
        $listge=idgerichtlist();
        $admin=$rd->getGetData()['admin'];

        for($i=0;$i<sizeof($bewertungen);$i++){
            $bewertungen[$i]['benutzername']=$listbe[$bewertungen[$i]['benutzer_id']];
            $bewertungen[$i]['gerichtname']=$listge[$bewertungen[$i]['gericht_id']];
        }

        return view('bewertungen',['bewertungen'=>$bewertungen,'admin'=>$admin]);
    }

    function meinebewertungen(RequestData $rd){
        $getdata=$rd->getGetData();
        $id=$getdata['id'];
        $meinebewertung=getbewertungen($id);
        $listge=idgerichtlist();
        for($i=0;$i<sizeof($meinebewertung);$i++){
            $meinebewertung[$i]['gerichtname']=$listge[$meinebewertung[$i]['gericht_id']];
        }
        return view('meinebewertungen',['bewertungen'=>$meinebewertung,'id'=>$id]);
    }

    function loeschenbewertungen(RequestData $rd){

        $getdata=$rd->getGetData();
        $id=$getdata['id'];
        $benutzerid=$getdata['benutzerid'];
        loeschenbewertungen($id);
        $meinebewertung=getbewertungen($benutzerid);
        $listge=idgerichtlist();

        for($i=0;$i<sizeof($meinebewertung);$i++){
            $meinebewertung[$i]['gerichtname']=$listge[$meinebewertung[$i]['gericht_id']];
        }
        return view('meinebewertungen',['bewertungen'=>$meinebewertung,'id'=>$id]);
    }

    function hervor(RequestData $rd){
        $getdata=$rd->getGetData();
        $benutzerid=$getdata['benutzerid'];
        $id=$getdata['id'];
        $hervor=$getdata['hervor'];
        if($hervor==1){
            $hervor=0;
        }else{
            $hervor=1;
        }
        $hervor= hervorheben($id,$hervor);
        $bewertungen=bewertungzeigen();
        $listbe=idnamelist();
        $listge=idgerichtlist();
        $admin=$rd->getGetData()['admin'];

        for($i=0;$i<sizeof($bewertungen);$i++){
            $bewertungen[$i]['benutzername']=$listbe[$bewertungen[$i]['benutzer_id']];
            $bewertungen[$i]['gerichtname']=$listge[$bewertungen[$i]['gericht_id']];
        }
        return view('bewertungen',['bewertungen'=>$bewertungen,'admin'=>$admin,'hervor'=>$hervor]);
    }
}