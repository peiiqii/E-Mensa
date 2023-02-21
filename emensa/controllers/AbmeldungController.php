<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/kategorie.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/gericht.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/anmeldener.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/besucher.php');
class AbmeldungController
{
    function abmeldungen(){
        $gerichtlist=db_gericht_select_all();
        $anmeldener=getallanmeldener();
        $anzahlbesucher=getbesucher();
        return view('emensa',['gerichtlist'=>$gerichtlist,'anmeldenlist'=>$anmeldener,'besucher'=>$anzahlbesucher]);
    }
}