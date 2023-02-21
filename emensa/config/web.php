<?php
/**
 * Mapping of paths to controllers.
 * Note, that the path only supports one level of directory depth:
 *     /demo is ok,
 *     /demo/subpage will not work as expected
 */

return array(
    '/'=>"EmensaController@emensahome",
    '/Home'=> "HomeController@index",
    "/demo"         => "DemoController@demo",
    '/dbconnect'    => 'DemoController@dbconnect',
    '/debug'        => 'HomeController@debug',
    '/error'        => 'DemoController@error',
    '/requestdata'   => 'DemoController@requestdata',
    '/example' => 'ExampleController@example',

    // Erstes Beispiel:
    '/m6' => 'ExampleController@m4_6a_queryparameter',
    '/m4' => 'ExampleController@m4_6a_queryparameter',
    '/parameter' => 'ExampleController@m4_7a_queryparameter',
    '/m4_7b_kategorie'=>'ExampleController@m4_7b_kategorie',
    '/m4_7c_gerichte' => 'ExampleController@m4_7c_gerichte',
    '/page1' => 'ExampleController@page1',
    '/page2' => 'ExampleController@page2',
    '/layout'=>'ExampleController@layout',

    '/verfizieren'=>'VerifizierenController@verfizieren',
    '/anmeldungen'=>'VerifizierenController@anmeldungen',
    '/abmeldungen'=>'AbmeldungenController@abmeldungen',
    '/bewertung'=>'BewertungController@bewertungen',
    '/bewertungspeicherung'=>'BewertungController@bewertungspeichern',
    '/bewertungen'=>'BewertungController@bewertungenanzeigen',
    '/meinebewertungen'=>'BewertungController@meinebewertungen',
    '/loeschenbewertungen'=>'BewertungController@loeschenbewertungen',
    '/hervorheben'=>'BewertungController@hervor'
);