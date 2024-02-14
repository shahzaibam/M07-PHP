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
{{--                            <h2>Gestión de {{ __('Events') }}</h2>--}}
                            <div class="mb-2">
                                <a href="#" class="btn btn-success">Agregar Evento</a>
                            </div>
                            <table class="table table-bordered table-striped">
                                <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>'hhh'</td>
                                    <td>aaa</td>
                                    <!-- Muestra más datos de tu modelo aquí -->
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm">Ver</a>
                                        <a href="#" class="btn btn-primary btn-sm">Editar</a>
                                        <form action="#" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <!-- Aquí puedes agregar paginación si es necesario -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
