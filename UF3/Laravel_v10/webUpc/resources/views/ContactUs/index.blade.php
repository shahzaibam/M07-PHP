<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contacto</title>

    <!-- Enlace al CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>


    <!-- Contenedor del video de fondo -->
    <div id="video-container">
        <video autoplay muted loop id="video-background">
            <source src="{{ asset('Video/Fondo.mp4') }}" type="video/mp4">
        </video>
    </div>

    <!-- Contenedor del formulario -->
    <div class="contact-form">
        <h1>Contacto</h1>
        <form action="#" method="post">
            {{-- Div con el nombre --}}
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>

            {{--  Div con el correo electronico --}}
            <div class="form-group">
                <label for="correo">Correo electrónico:</label>
                <input type="email" id="correo" name="correo" required>
            </div>

            {{--  Div con el mensaje --}}
            <div class="form-group">
                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" rows="6" required></textarea>
            </div>

            {{--  Boton de envio--}}
            <button type="submit" class="submit-btn">Enviar</button>
        </form>
    </div>
</body>

</html>
