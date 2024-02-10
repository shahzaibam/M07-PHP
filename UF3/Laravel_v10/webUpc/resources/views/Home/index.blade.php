<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Street Racers</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link href="{{ asset('css/home/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-4.0.0-dist/css/bootstrap.min.css') }}" rel="stylesheet">

</head>
<body>

<header>
    <!-- Aquí se incluiría la barra de navegación, asegurándose de que es responsiva -->
    @include('layout.navigation')
</header>

<div class="hero">

    <div class="container text-center" style="margin-top: 400px;">
        <h1 id="title"></h1>
    </div>
</div>

<div class="content">

    <div>
        @include("home.serviceCards");
    </div>

</div>


<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('css/bootstrap-4.0.0-dist/js/bootstrap.min.js') }}"></script>

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
