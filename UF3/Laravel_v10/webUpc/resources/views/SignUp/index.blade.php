<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
</head>
<body>
<form method="POST" action="{{ route('signUp.store') }}">
    @csrf
    <div>
        <label>NIF:</label>
        <input type="text" name="nif" required>
    </div>
    <div>
        <label>Nombre de la Empresa:</label>
        <input type="text" name="nombre" required>
    </div>
    <div>
        <label>Email:</label>
        <input type="email" name="email" required>
    </div>
    <div>
        <label>Tipo:</label>
        <input type="text" name="type" required>
    </div>
    <div>
        <label>Password:</label>
        <input type="password" name="password" required>
    </div>

    <button type="submit">Registrar Empresa</button>
</form>

</body>
</html>
