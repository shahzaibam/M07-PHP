    <div class="container">
        <h1>Lista de Propietarios</h1>
        <table class="table" style="padding: 30px;">
            <thead >
            <tr>
                <th>NIF</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
            </tr>
            </thead>
            <tbody >
                <tr>
                    <td >{{ $owner->nif }}</td>
                    <td>{{ $owner->name }}</td>
                    <td>{{ $owner->email }}</td>
                    <td>{{ $owner->phone }}</td>
                </tr>
            </tbody>
        </table>
    </div>
