<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

</head>
<body>
<form method="post" action="/verfizieren" >
    <fieldset>
        <legend>anmeldungen</legend>
        <label for="email"> Email</label>
        <br>
        <input type="text" name="email" id="email">
        <br>
        <label for="password">Password</label>
        <br>
        <input type="text" name="password" id="password">
        <br>
        <input type="hidden" name="ret" value="{{$ret}}">
        <input type="submit" value="anmelden">

    </fieldset>
</form>
@if(isset($fehlermeldungen))
    {{$fehlermeldungen}}
@endif
</body>
</html>
