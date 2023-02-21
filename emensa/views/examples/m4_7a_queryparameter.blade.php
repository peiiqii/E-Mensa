<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>m4_7a_queryparameter</title>
</head>
<body>
<h>
    @if(isset($name))
        Der Wert von ?name lautet:  {{$name}}

    @else
        Keine Wert vorhanden
    @endif
</h>

</body>
</html>