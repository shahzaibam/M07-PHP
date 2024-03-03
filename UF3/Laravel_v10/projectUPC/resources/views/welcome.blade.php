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
    @include('layouts.app')
</header>

<div class="hero">
    <div class="container text-center" style="margin-top: 700px;">
        <h1 id="title"></h1>
    </div>
</div>

<div class="content">
    <div>
        @include("layouts.serviceCards");
    </div>
</div>

<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('css/bootstrap-4.0.0-dist/js/bootstrap.min.js') }}"></script>
<script>
    $(document).ready(function() {
        var text = "Keep pushing, the stars are within reach...";
        var i = 0;
        var speed = 100; // Velocidad en milisegundos

        function typeWriter() {
            console.log('Executing typeWriter', i);
            if (i < text.length) {
                $('#title').html($('#title').html() + text.charAt(i));
                i++;
                setTimeout(typeWriter, speed);
            }
        }


        typeWriter(); // Iniciar la animación
    });
</script>


</body>
</html>
