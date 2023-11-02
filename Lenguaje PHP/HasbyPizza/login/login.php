<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" type="text/css" href="loginStyles.css">
</head>
<body>


    <div class="login-container">
    <h2>Log In</h2>
    <form method="post" action="doLogin.php">
        <label for="username">Usuario:</label>
        <input type="text" name="username" id="username" required><br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required><br>

        <input type="submit" value="Log In">
    </form>
    </div>

</body>
</html>
