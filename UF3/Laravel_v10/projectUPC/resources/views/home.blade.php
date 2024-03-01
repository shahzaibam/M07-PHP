@extends('layouts.app')

@section('content')
    <div class="container">

        @if($userType == 'empresa' || $userType == 'autonomo')

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
                                    <div class="title">
                                        <h2>Eventos</h2>

                                    </div>

                                    <div class="buttonAdd">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#addEventModal">
                                            <i class="fa-solid fa-square-plus"></i>
                                        </button>


                                        <!-- Modal para añadir un evento -->
                                        <div class="modal fade" id="addEventModal" tabindex="-1"
                                             aria-labelledby="addEventModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addEventModalLabel">Añadir
                                                            Evento</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Formulario de Evento -->
                                                        <form method="POST" action="{{ route('events.store') }}">
                                                            <!-- Cambia 'eventos.store' por tu ruta correcta -->
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="eventName" class="form-label">Nombre del
                                                                    Evento</label>
                                                                <input type="text" class="form-control" id="eventName"
                                                                       name="name" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="eventDescription"
                                                                       class="form-label">Descripción</label>
                                                                <textarea class="form-control" id="eventDescription"
                                                                          name="description" rows="3"
                                                                          required></textarea>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="fecha" class="form-label">Fecha</label>
                                                                <input class="form-control" type="date" id="fecha"
                                                                       name="fecha" rows="3" required></input>
                                                            </div>


                                                            <div class="mb-3">
                                                                <label for="hora" class="form-label">Hora</label>
                                                                <input class="form-control" type="time" id="hora"
                                                                       name="hora" rows="3" required></input>
                                                            </div>

                                                            <button type="submit" class="btn btn-primary">Guardar Evento
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

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
                                            <th>Acciones</th>
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
                                                <td>{{ $evento->nombreCreador}}</td>
                                                <td class="d-flex">


                                                    <a href="{{ route('events.edit', $evento->id) }}"
                                                       class="btn btn-success m-1"><i
                                                            class="fa-solid fa-pencil"></i></a>

                                                    <form id="delete-form-{{ $evento->id }}"
                                                          action="{{ route('events.delete', $evento->id) }}"
                                                          method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger m-1">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
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

        @endif



        @if($userType == 'empresa')
            <div class="row justify-content-center mt-5">
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
                                    <div class="title">
                                        <h2>Tournaments</h2>

                                    </div>

                                    <div class="buttonAdd">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#addTorneoModal">
                                            <i class="fa-solid fa-square-plus"></i>
                                        </button>


                                        <!-- Modal para añadir un torneo -->
                                        <div class="modal fade" id="addTorneoModal" tabindex="-1"
                                             aria-labelledby="addTorneoModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addTorneoModalLabel">Añadir
                                                            Tournaments</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Formulario de Torneo -->
                                                        <form method="POST" action="{{ route('tournaments.store') }}">
                                                            <!-- Cambia 'tournaments.store' por tu ruta correcta -->
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="torneoName" class="form-label">Nombre del
                                                                    Torneo</label>
                                                                <input type="text" class="form-control" id="torneoName"
                                                                       name="name" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="torneoDescription"
                                                                       class="form-label">Descripción</label>
                                                                <textarea class="form-control" id="torneoDescription"
                                                                          name="description" rows="3"
                                                                          required></textarea>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="fecha" class="form-label">Fecha</label>
                                                                <input class="form-control" type="date" id="fecha"
                                                                       name="fecha" rows="3" required></input>
                                                            </div>


                                                            <div class="mb-3">
                                                                <label for="hora" class="form-label">Hora</label>
                                                                <input class="form-control" type="time" id="hora"
                                                                       name="hora" rows="3" required></input>
                                                            </div>

                                                            <button type="submit" class="btn btn-primary">Guardar Torneo
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                @if($tournaments->isEmpty())
                                    <p>No hay tournaments disponibles.</p>
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
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($tournaments as $torneo)
                                            <tr>
                                                <td>{{ $torneo->id }}</td>
                                                <td>{{ $torneo->name }}</td>
                                                <td>{{ $torneo->description }}</td>
                                                <td>{{ $torneo->fecha }}</td>
                                                <td>{{ $torneo->hora }}</td>
                                                <td>{{ $torneo->nombreCreador}}</td>
                                                <td class="d-flex">


                                                    <a href="{{ route('tournaments.edit', $torneo->id) }}"
                                                       class="btn btn-success m-1"><i
                                                            class="fa-solid fa-pencil"></i></a>

                                                    <form id="delete-form-{{ $torneo->id }}"
                                                          action="{{ route('tournaments.delete', $torneo->id) }}"
                                                          method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger m-1">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
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
        @endif





        @if(isset($apuntados) && !$apuntados->isEmpty())
            <div class="container mt-5">
                <h2>Inscripciones</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Creado por</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($apuntados as $apuntado)
                        @if($apuntado->evento)
                            <tr>
                                <td>Evento</td>
                                <td class="col-2">{{ $apuntado->evento->name }}</td>
                                <td class="col-6">{{ $apuntado->evento->description }}</td>
                                <td class="col-2">{{ $apuntado->evento->fecha }}</td>
                                <td>{{ $apuntado->evento->hora }}</td>
                                <td class="col-2">{{ $apuntado->evento->user->name ?? 'Desconocido' }}</td>
                            </tr>
                        @endif

                        @if($apuntado->torneo)
                            <tr>
                                <td>Torneo</td>
                                <td>{{ $apuntado->torneo->name }}</td>
                                <td>{{ $apuntado->torneo->description }}</td>
                                <td>{{ $apuntado->torneo->fecha }}</td>
                                <td>{{ $apuntado->torneo->hora }}</td>
                                <td>{{ $apuntado->torneo->user->name ?? 'Desconocido' }}</td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>

        @endif



    </div>

@endsection
