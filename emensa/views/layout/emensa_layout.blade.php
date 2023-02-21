<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @yield('style')
</head>
<body>
@yield ('navi')
@yield ('ank')
@yield('speisanzeigen')
@yield ('zahl')
@yield ('newsletter')
@yield ('wichtig')
<footer>
    @yield('footer')
</footer>
</body>
</html>