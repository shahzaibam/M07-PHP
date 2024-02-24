@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-0 shadow">
                    <div class="card-header bg-primary text-white">Gestión de {{ __('Events') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="text-center mb-4">
                            <h2 class="mb-0">Eventos Destacados</h2>
                            <p>Descubre los próximos eventos</p>
                        </div>

                        @if($eventos->isEmpty())
                            <div class="alert alert-info">No hay eventos disponibles en este momento.</div>
                        @else
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                @foreach($eventos as $evento)
                                    <div class="col">
                                        <div class="card h-100 border-0">
                                            <div class="card-body">
                                                <h5 class="card-title text-primary">{{ $evento->name }}</h5>
                                                <p class="card-text">{{ $evento->description }}</p>
                                                <p class="card-text">
                                                    <small class="text-muted">Fecha: {{ $evento->fecha }}</small> |
                                                    <small class="text-muted">Hora: {{ $evento->hora }}</small>
                                                </p>
                                                <p class="card-text"><small
                                                        class="text-muted">Autor: {{ $evento->nombreCreador }}</small>
                                                </p>
                                            </div>


                                            @if(isset($userType) && $userType == 'guest')
                                                <form id="apuntar-form-{{ $evento->id }}"
                                                      action="{{ route('events.apuntar', $evento->id) }}" method="GET">
                                                    @csrf
                                                        <input type="submit" class="btn btn-outline-primary" value="Apuntar">
                                                </form>
                                            @endif


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
