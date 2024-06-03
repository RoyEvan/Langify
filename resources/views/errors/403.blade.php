<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Forbidden!</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/icon/globe2.svg') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/errorPage.css') }}">

    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"
        as="style">

    @yield('cdn-links')
</head>
<body>
    <h1>403</h1>
    <p>You shall not pass!</p>
</body>
</html>
