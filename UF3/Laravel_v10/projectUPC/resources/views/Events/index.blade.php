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

                        <div class="container">
                            <div class="d-flex justify-content-between m-3">
                                <h2>Eventos</h2>
                            </div>

                            @if($eventos->isEmpty())
                                <p>No hay eventos disponibles.</p>
                            @else
                                <div class="row">
                                    @foreach($eventos as $evento)
                                        <div class="col-md-4">
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $evento->name }}</h5>
                                                    <p class="card-text">{{ $evento->description }}</p>
                                                    <p class="card-text"><small class="text-muted">Fecha: {{ $evento->fecha }} | Hora: {{ $evento->hora }} </small></p>
                                                    <p><small>Autor: {{$evento->nombreCreador}}</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
