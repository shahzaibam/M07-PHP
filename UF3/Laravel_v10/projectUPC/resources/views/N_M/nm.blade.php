@extends('layouts.app')


@section('content')

    <div class="text-center">

        <h1>N:M</h1>

{{--        <table class="table table-bordered">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>ID</th>--}}
{{--                <th>Nombre</th>--}}
{{--                <th>Email</th>--}}
{{--                <!-- Agrega más columnas según necesites -->--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach ($usuarios as $usuario)--}}
{{--                <tr>--}}
{{--                    <td>{{ $usuario->id }}</td>--}}
{{--                    <td>{{ $usuario->name }}</td>--}}
{{--                    <td>{{ $usuario->email }}</td>--}}
{{--                    <!-- Agrega más datos según necesites -->--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}

{{--        @foreach ($usuarios as $usuario)--}}
{{--            <p>{{ $usuario->name }} ({{ $usuario->email }})</p>--}}
{{--            <ul>--}}
{{--                @foreach ($usuario->eventos as $evento)--}}
{{--                    <li>{{ $evento->nombre }} - {{ $evento->fecha }}</li> <!-- Asume que los eventos tienen 'nombre' y 'fecha' -->--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        @endforeach--}}


        <div class="container mt-5">
            <h2>Listado de Eventos y Usuarios Inscritos</h2>
            <div class="row">
                <div class="col-12">
                    @foreach ($eventos as $evento)
                        <div class="card mt-3">
                            <div class="card-header">
                                Evento: {{ $evento->name }} - Fecha: {{ $evento->fecha }}
                            </div>
                            <ul class="list-group list-group-flush">
                                @if($evento->usuariosInscritos->isEmpty())
                                    <li class="list-group-item">No hay usuarios inscritos</li>
                                @else
                                    @php $contador = 1; @endphp

                                    @foreach ($evento->usuariosInscritos as $usuario)
                                        <li class="list-group-item">{{ $contador }}.{{ $usuario->name }} - {{ $usuario->email }}</li>
                                        @php $contador++; @endphp

                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>










        <div class="container mt-5">
            <h2>Listado de Torneos y Usuarios Inscritos</h2>
            <div class="row">
                <div class="col-12">
                    @foreach ($torneos as $torneo)
                        <div class="card mt-3">
                            <div class="card-header">
                                Torneo: {{ $torneo->name }} - Fecha: {{ $torneo->fecha }}
                            </div>
                            <ul class="list-group list-group-flush">
                                @if($torneo->usuariosInscritos->isEmpty())
                                    <li class="list-group-item">No hay usuarios inscritos</li>
                                @else
                                    @php $contador = 1; @endphp

                                    @foreach ($torneo->usuariosInscritos as $usuario)
                                        <li class="list-group-item">{{ $contador }}.{{ $usuario->name }} - {{ $usuario->email }}</li>
                                        @php $contador++; @endphp

                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
