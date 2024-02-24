<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Present Cards con Bootstrap</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="{{ asset('css/aboutUs/styles.css') }}" rel="stylesheet">
</head>
<body>

@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="title">
            <h1 class="text-center">¿Quien somos?</h1>
        </div>

        <div class="row mt-5">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('img/avatar1.jpg') }}" alt="Avatar 1">
                    <div class="card-body">
                        <h5 class="card-title">Abdullah Waris</h5>
                        <p class="card-text">Estudios: FP-DAW</p>
                        <p class="card-text">Descripción: Programador Full Stack con 2 años de experiencia, programa en JS y PHP, usa Angular, React y Laravel como frameworks</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('img/avatar2.jpg') }}" alt="Avatar 2">
                    <div class="card-body">
                        <h5 class="card-title">Shah Zaib</h5>
                        <p class="card-text">Estudios: FP-DAW</p>
                        <p class="card-text">Descripción: Programador Full Stack con 2 años de experiencia, programa en JS y PHP, usa Angular, React y Laravel como frameworks</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('img/avatar3.jpg') }}" alt="Avatar 3">
                    <div class="card-body">
                        <h5 class="card-title">Pol Moreno</h5>
                        <p class="card-text">Estudios: FP-DAW</p>
                        <p class="card-text">Descripción: Programador Full Stack con 2 años de experiencia, programa en JS y PHP, usa Angular, React y Laravel como frameworks</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('img/avatar3.jpg') }}" alt="Avatar 3">
                    <div class="card-body">
                        <h5 class="card-title">Jan Viñas</h5>
                        <p class="card-text">Estudios: Teleco UPC</p>
                        <p class="card-text">Descripción: Programador Full Stack con 2 años de experiencia, programa en JS y PHP, usa Angular, React y Laravel como frameworks</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('img/avatar1.jpg') }}" alt="Avatar 1">
                    <div class="card-body">
                        <h5 class="card-title">David Peludo</h5>
                        <p class="card-text">Estudios: Teleco UPC</p>
                        <p class="card-text">Descripción: Programador Full Stack con 2 años de experiencia, programa en JS y PHP, usa Angular, React y Laravel como frameworks</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('img/avatar2.jpg') }}" alt="Avatar 2">
                    <div class="card-body">
                        <h5 class="card-title">Alex Calvo</h5>
                        <p class="card-text">Estudios: Teleco UPC</p>
                        <p class="card-text">Descripción: Programador Full Stack con 2 años de experiencia, programa en JS y PHP, usa Angular, React y Laravel como frameworks</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

</body>
</html>
