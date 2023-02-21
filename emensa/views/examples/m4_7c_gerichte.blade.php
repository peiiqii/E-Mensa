<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>m4_7c_gerichte</title>

    <style type="text/css">
        table tr th{
            text-align: left;
            font-size:20px;
            font-weight: normal;
        }
        table tr:nth-child(0){
            color: #00b5ad;
        }

        table tr:nth-child(2n) th{
            font-weight: bolder;
        }
    </style>
</head>

<body>
<h2>Alle Namen und interne Preise von Gerichten, die
    intern mehr als 2€ kosten(nach Name absteigend sortiert):</h2><br></br>
<ul>
    @if(!empty($data))
        @foreach($data as $gericht)
            <li> {{$gericht['name']}} {{$gericht['preis_intern']}}</li>

        @endforeach
    @else
        <div> Es sind keine Gerichte vorhanden</div>
    @endif
</ul>

</body>
</html>