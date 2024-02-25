<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contacto</title>

    <!-- Enlace al CSS -->
    <link href="{{ asset('css/contact/styles.css') }}" rel="stylesheet">
</head>

<body>

@extends('layouts.app')

@section('content')
<!-- Contenedor del formulario -->

<div class="d-flex justify-content-center">
    <div class="contact-form">
        <h1 class="text-center">Contacto</h1>
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
</div>


@endsection
</body>

</html>
