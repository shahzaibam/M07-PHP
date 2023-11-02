<?php

session_start();

$_SESSION["entrado"] = false;

// Definir un array de usuarios y contraseñas válidos
$usuarios = [
    'shebi' => '123',
    'usuario2' => 'contrasena2',
    'usuario3' => 'contrasena3',
];

// Obtener los datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Verificar las credenciales
if (array_key_exists($username, $usuarios) && $usuarios[$username] === $password) {
    // Inicio de sesión exitoso
    $_SESSION["entrado"] = true;
    header("Location: ../pedidoForm.php");
    echo "¡Bienvenido, $username!";
} else {
    // Credenciales incorrectas
    echo "Inicio de sesión fallido. Verifica tu usuario y contraseña.";
}
?>
