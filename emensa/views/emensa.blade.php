@extends('layout.emensa_layout')

@section('style')
    <link type="text/css" rel="stylesheet" href="./css/emensa.css">
@endsection

@section('title')
    Emensa
@endsection

@section('navi')
    <img id="header_img" src="img/emensa-logo.jpg" height="135" width="135" alt="E-Mensa Logo">
    <h1 id="title">E-Mensa</h1>
    <nav>
        <a href="#Ank">Ankündigung</a>
        <a href="#Speisen">Speisen</a>
        <a href="#Zahlen">Zahlen</a>
        <a href="#Kontakt">Kontakt</a>
        <a href="#wichtig">Wichtig für uns</a>
    </nav><br>
@endsection

@section('ank')
    <hr>
    <img id="mensa_img" src="img/mensa-Eupener_Strasse.jpg" height="250" width="400" alt="Mensa Eupener Straße" />
    <h1><a id="Ank">Bald gibt es Essen auch online ;)</a></h1>
    <div class="Ankinhalt">
        Es gibt viele Gründe, Essen oder Nahrungsmittel zu bestellen.
        Nudeln mit Tomatensoße sind das einzige, was du kochen kannst.
        Oder du willst nicht einkaufen gehen.
        Lieferdienste bringen dir das Essen direkt vor die Haustür und bieten einen praktischen Ausweg.
        Somit ist es letztlich egal, ob du aus Faulheit nicht in den nächsten Supermarkt gehen willst, Sorge davor hast, dich anzustecken oder einfach Inspiration für dein nächstes Mittagessen brauchst.
        Es gibt verschiedene Ansätze, die Essenslieferdienste verfolgen.
        Die besten haben wir für dich in der Übersicht.
    </div><br><br><br>
@endsection

@section('speisanzeigen')
    <div class="grid-container">
        <div class="grid-item">
            <h1 id="Speisen">Köstlichkeiten, die Sie erwarten</h1>
            <table>
                <tr>
                    <th>Name</th>
                    <th></th>
                    <th>Interner Preis</th>
                    <th>Externer Preis</th>
                </tr>
                @foreach($gerichtlist as $gericht)
                    <tr>
                        <td>{{$gericht['name']}}</td>
                        <td>
                            @if($gericht['bildname'] == NULL)
                                <img src ="../img/gerichte/00_image_missing.jpg" width="100" height="100">
                            @else
                                <img src ="../img/gerichte/{{$gericht['bildname']}}" width="100" height="100">
                            @endif
                        </td>
                        <td>{{number_format($gericht['preis_intern'], 2,',')}}&euro;</td>
                        <td>{{number_format($gericht['preis_extern'], 2,',')}}&euro;</td>
                    </tr>
                @endforeach
            </table><br>
        </div>

        <div class="grid-item">
            <h1 id="wunsch">
                <h1>Wunschgericht</h1>
                <form action="wunschgericht.php" method="post">
                    <label>Name:
                        <input type="text" name="ersteller_name" id="ersteller_name">
                    </label>
                    <label>E-Mail:
                        <input type="email" name="email" id="email" required>
                    </label><br>
                    <label>Wunschgericht:
                        <input type="text" name="name" id="name" required>
                    </label>
                    <label>Datum:
                        <input type="date" name="datum" id="datum">
                    </label><br>
                    <label>Beschreibung:
                        <textarea name="beschreibung" id="beschreibung" rows="10" cols="50" required></textarea>
                    </label>
                    <input type="submit" value="Wunsch abschicken">
                </form>
            </h1>
        </div>
    </div>
@endsection

@section('zahl')
    <h1 id="Zahlen">E-Mensa in Zahlen</h1>
    <div class="Zahlrow">
        <div class="column">
            <p>Besucher: {{count($besucher)}}</p>
        </div>
        <div class="column">
            <p>Anmeldungen zum Newsletter: {{count($anmeldenlist)}}</p>
        </div>
        <div class="column">
            <p> Speisen: {{count($gerichtlist)}}</p>
        </div>
    </div>
@endsection

@section('newsletter')
    <h1 id="Kontakt">Interesse geweckt? Wir informieren Sie!</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
        <fieldset>
            <legend>Anmeldung</legend>
            <label for="frau">Anrede</label><br>
            <input type="radio" name="Anrede" value="Frau" id="frau">
            <label for="frau">Frau</label><br>
            <input type="radio"  name="Anrede" value="Herr" id="herr">
            <label for="herr"> Herr</label><br><br>
            <label for="vorname">Vorname*</label><br>
            <input type="text" id="vorname" name="Vorname" ><br>
            <label for="nachname">Nachname*</label><br>
            <input type="text" id="nachname" name="Nachname" ><br>
            <label for="email">E-mail*</label><br>
            <input type="text" name="Email" id="email" ><br>
            <label for="benachrichtunginterval">Benachrichtungsinterval</label><br>
            <select id="benachrichtunginterval" name="Benachrichtungsinterval">
                <option value="Tag">Tag</option>
                <option value="Wochen" selected>Woche</option>
                <option value="Monat">Monat</option>
            </select><br>
            <input type="checkbox" value="Datenschutz" name="Datenschutz" id="datenschutz" >
            <label for="datenschutz">Datenschutzhinweise gelesen</label><br>
            <input type="submit" value="Abschicken" ><br>
            *)Eingabe sind pflicht
        </fieldset>
    </form>
@endsection

@section('wichtig')
    <h1 id="wichtig">Das ist uns wichtig</h1>
    <ul>
        <li>Beste frishce Saisonale Zutaten</li>
        <li>Ausgewogene abwechslungsreiche Gerichte</li>
        <li>Sauberkeit</li>
    </ul>
    <h1 id="Text">Wir freuen uns auf Ihren Besuch!</h1>
    <hr>
@endsection

@section('footer')
    <footer>
        (c) E-Mensa GmbH | Peiqi Lim, Shuyang Zhang | <a href="">Impressum</a>
    </footer>
@endsection