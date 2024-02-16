@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Gestión de {{ __('Events') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{--                    {{ __('You are logged in!') }}--}}

                            <div class="container">
                                <h2>Eventos</h2>
                                @if($eventos->isEmpty())
                                    <p>No hay eventos disponibles.</p>
                                @else
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Fecha</th>
                                            <th>Hora</th>
                                            <th>Creado por</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($eventos as $evento)
                                            <tr>
                                                <td>{{ $evento->id }}</td>
                                                <td>{{ $evento->name }}</td>
                                                <td>{{ $evento->description }}</td>
                                                <td>{{ $evento->fecha }}</td>
                                                <td>{{ $evento->hora }}</td>
                                                <td>{{ $evento->autonomo_id ? 'Autónomo' : 'Empresa' }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
