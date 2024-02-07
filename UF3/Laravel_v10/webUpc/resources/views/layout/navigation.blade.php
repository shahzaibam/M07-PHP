<!doctype html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="utf-8">
    <title>Upc</title>
    <base href="/">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../public/css/home/hola.css">
</head>
<body>

<nav class="navbar navbar-expand-lg" id="menuBar" style="width: 100vw; height: 12vh;" data-bs-theme="dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('events.index') }}">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('aboutus.index') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact.index') }}">Contact Us</a>
                </li>
            </ul>
            <div style="margin-right: 100px;">
                <img src="{{ asset('img/logo.png') }}" width="100px" height="100px">

            </div>
        </div>
    </div>
</nav>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>
</html>