@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-0 shadow">
                    <div class="card-header bg-primary text-white">Gestión de {{ __('Tournaments') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="text-center mb-4">
                            <h2 class="mb-0">Torneos Destacados</h2>
                            <p>Explora y participa en los próximos torneos</p>
                        </div>

                        @if($tournaments->isEmpty())
                            <div class="alert alert-info">No hay torneos disponibles en este momento.</div>
                        @else
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                @foreach($tournaments as $torneo)
                                    <div class="col">
                                        <div class="card h-100 border-0">
                                            <div class="card-body">
                                                <h5 class="card-title text-primary">{{ $torneo->name }}</h5>
                                                <p class="card-text">{{ $torneo->description }}</p>
                                                <p class="card-text">
                                                    <small class="text-muted">Fecha: {{ $torneo->fecha }}</small> |
                                                    <small class="text-muted">Hora: {{ $torneo->hora }}</small>
                                                </p>
                                                <p class="card-text"><small class="text-muted">Organizador: {{ $torneo->nombreCreador }}</small></p>
                                            </div>
                                            <div class="card-footer bg-transparent">
                                                <a href="#" class="btn btn-outline-primary">Más info</a>
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
@endsection
