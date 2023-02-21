<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/kategorie.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/gericht.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/anmeldener.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/besucher.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/wunschgericht.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/../models/newsletter.php');

class EmensaController
{
    public function emensahome(){
        $gerichtlist=db_gericht_select_all();
        $anmeldener=getallanmeldener();
        $anzahlbesucher=getbesucher();
        return view('emensa',['gerichtlist'=>$gerichtlist,'anmeldenlist'=>$anmeldener,'besucher'=>$anzahlbesucher]);
    }

    public function wunschgericht(RequestData $request)
    {
        insertwunschgericht($request);
        return view('emensa', []);
    }

    public function newsletteranmeldungen(RequestData $request)
    {
        newsletter($request);
        return view('emensa', []);
    }
}