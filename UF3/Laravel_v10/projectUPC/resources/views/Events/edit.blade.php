@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('events.update', $evento->id) }}" method="POST">
            @csrf
            @method('PUT')


            <div class="form-group">
                <label for="name">Nombre del Evento:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $evento->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea class="form-control" id="description" name="description" required>{{ $evento->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input class="form-control" type="date" id="fecha" name="fecha" rows="3" required value="{{$evento->fecha}}"/>
            </div>


            <div class="mb-3">
                <label for="hora" class="form-label">Hora</label>
                <input class="form-control" type="time" id="hora" name="hora" rows="3" required value="{{$evento->hora}}" />
            </div>


            <button type="submit" class="btn btn-primary">Actualizar Evento</button>
        </form>
    </div>
@endsection
