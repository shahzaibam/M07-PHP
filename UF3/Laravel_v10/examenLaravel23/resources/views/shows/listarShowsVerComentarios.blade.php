@extends('layouts.app')


@section('content')
    <div class="text-danger m-5">
        <h1 class="text-center">Listar todo</h1>
    </div>



    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-0 shadow">
                    <div class="card-header bg-primary text-white">Gestión de {{ __('Shows') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        @if($shows->isEmpty())
                            <div class="alert alert-info">No hay eventos disponibles en este momento.</div>
                        @else
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                @foreach($shows as $evento)
                                    <div class="col">
                                        <div class="card h-100 border-0">
                                            <div class="card-body">


                                                <a href="{{ route('listarTodoId', $evento->id) }}"
                                                   class="btn btn-success m-1">
                                                    <img src='{{ asset("img/$evento->id.jpg") }}' >

                                                </a>
                                                <h5 class="card-title text-primary">{{ $evento->nombre }}</h5>
                                                <h5 class="card-title text-primary">{{ $comentarios }}</h5>
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
