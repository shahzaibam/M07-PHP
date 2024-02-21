@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Gestión de {{ __('Tournaments') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container">
                            <div class="d-flex justify-content-between m-3">
                                <h2>Tournaments</h2>
                            </div>

                            @if($tournaments->isEmpty())
                                <p>No hay torneos disponibles.</p>
                            @else
                                <div class="row">
                                    @foreach($tournaments as $torneo)
                                        <div class="col-md-4">
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $torneo->name }}</h5>
                                                    <p class="card-text">{{ $torneo->description }}</p>
                                                    <p class="card-text"><small class="text-muted">Fecha: {{ $torneo->fecha }} | Hora: {{ $torneo->hora }} </small></p>
                                                    <p><small>Autor: {{$torneo->nombreCreador}}</small></p>
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
