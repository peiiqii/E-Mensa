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
        <td> Gericht </td>
        <td> Bemerkung</td>
        <td> Sterne</td>
        <td> Zeit </td>
        <td> loeschen</td>
    </tr>
    @foreach($bewertungen as $bewertung)
        <tr>

            <td>{{$bewertung['gerichtname']}}</td>
            <td>{{$bewertung['bemerkung']}}</td>
            <td>{{$bewertung['sterne_bewertung']}}</td>
            <td>{{$bewertung['bewertung_zeitpunkt']}}</td>
                <?php     ?>
            <td> <a href="/loeschenbewertungen?id={{ $bewertung['id'] }} &benutzerid={{$bewertung['benutzer_id']}}">löschen</a></td>
        </tr>
    @endforeach
</table>
</body>
</html>