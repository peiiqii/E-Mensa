<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>m4_7b_kategorie</title>

    <style type="text/css">

        .odd{
            font-weight: bolder;
        }
    </style>
</head>

<body>
<h2>Alle Namen der Kategorien in der Datenbank(aufsteigend sortiert):</h2><br></br>
<ul>
    @foreach($data as $gericht)
        @if($loop ->odd)
            <li class="odd">{{$gericht['name']}}  </li>
        @else
            <li class="notodd">{{$gericht['name']}}  </li>
        @endif
    @endforeach
</ul>

</body>
</html>