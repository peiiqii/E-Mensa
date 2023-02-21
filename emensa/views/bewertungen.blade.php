<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link type="text/css" rel="stylesheet" href="./css/bewertungen.css">
</head>
<body>

<table id="bewertungenlist">
    <tr>
        <td> Name</td>
        <td> Gericht </td>
        <td> Bemerkung</td>
        <td> Sterne</td>
        <td> Zeit </td>
        @if($admin)
            <td>Hervorgeben</td>
        @endif
    </tr>
    @foreach( $bewertungen as $bewertung )
        <tr class="_{{$bewertung['hervorgehoben']}}">
            <td>{{$bewertung['benutzername']}}</td>
            <td>{{$bewertung['gerichtname']}}</td>
            <td>{{$bewertung['bemerkung']}}</td>
            <td>{{$bewertung['sterne_bewertung']}}</td>
            <td>{{$bewertung['bewertung_zeitpunkt']}}</td>
            @if($admin)
                @if($bewertung['hervorgehoben'])
                    <td><a href="<?php echo '/hervorheben?benutzerid='.$bewertung['benutzer_id']."&id=".$bewertung['id']."&hervor=".$bewertung['hervorgehoben'].'&admin='.$admin; ?>"> Hervorheben abwahlen</a></td>
                @else
                    <td><a href="<?php echo '/hervorheben?benutzerid='.$bewertung['benutzer_id']."&id=".$bewertung['id']."&hervor=".$bewertung['hervorgehoben'].'&admin='.$admin; ?>"> Hervorheben wahlen</a></td>
                @endif
            @endif
        </tr>
    @endforeach
</table>
</body>
</html>