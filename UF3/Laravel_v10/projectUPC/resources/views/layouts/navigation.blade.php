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

<nav class="navbar navbar-expand-lg" id="menuBar" style="width: 100vw; height: 12vh; text-shadow: 2px 2px 8px #FFFFFF;
" data-bs-theme="dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('welcome') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('events.index') }}">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('tournaments.index') }}">Tournaments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('aboutus.index') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('contact.index') }}">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="/register">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="/login">Log In</a>
                </li>
            </ul>
            <div style="margin-right: 100px;">
                <img id="logo" src="{{ asset('img/logo.png') }}" width="100px" height="100px">

            </div>
        </div>
    </div>
</nav>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const title = "Racing, the never Ending...";
        let currentTitle = '';
        let index = 0;
        const intervalId = setInterval(() => {
            currentTitle += title[index];
            document.getElementById('title').textContent = currentTitle;
            index++;
            if (index === title.length) {
                clearInterval(intervalId);
            }
        }, 100);
    });

    window.addEventListener('scroll', function () {
        const header = document.querySelector('header'); // Selecciona el header
        if (window.scrollY > 0) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }

        const logo = document.getElementById('logo'); // Asegúrate de que tu logo tenga este id o cámbialo por el que esté usando
        if (window.scrollY > 0) {
            logo.src = '{{ asset('img/logo_black.png') }}'; // Cambia esto por la ruta al logo para cuando hay scroll
        } else {
            logo.src = '{{ asset('img/logo.png') }}'; // Cambia esto por la ruta al logo predeterminado
        }
    });


</script>
</body>
</html>
