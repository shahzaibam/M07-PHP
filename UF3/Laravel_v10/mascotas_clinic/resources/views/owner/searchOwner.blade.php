@include('components.layout')

<h1>Search Owner</h1>

<form action="{{ route('owner.searchByForm') }}" method="GET">
    <div>
        <label for="ownerId">Owner ID:</label>
        <input id="ownerId" type="text" name="ownerId">
    </div>
    <div>
        <input type="submit" value="Search">
    </div>
</form>

@section('content')
    <div class="container">
        <h1>Lista de Propietarios</h1>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>NIF</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($owners as $owner)
                <tr>
                    <td>{{ $owner->id }}</td>
                    <td>{{ $owner->nif }}</td>
                    <td>{{ $owner->name }}</td>
                    <td>{{ $owner->email }}</td>
                    <td>{{ $owner->phone }}</td>
                    <td>
                        <a href="{{ route('owner.modify', ['id' => $owner->id]) }}" class="btn btn-primary">Editar</a>
                        <a href="{{ route('owner.delete', ['id' => $owner->id]) }}" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
