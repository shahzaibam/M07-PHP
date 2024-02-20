@include('components.layout')

<h1>Add Owner</h1>
<form action="{{ route('owner.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nif">NIF:</label>
        <input type="text" name="nif" class="form-control" id="nif">
    </div>

    <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" name="name" class="form-control" id="name">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" class="form-control" id="email">
    </div>

    <div class="form-group">
        <label for="phone">Telefono:</label>
        <input type="text" name="phone" class="form-control" id="phone">
    </div>

    <button type="submit" class="btn btn-primary">Agregar Propietario</button>
</form>
