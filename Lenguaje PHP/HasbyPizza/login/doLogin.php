<?php

session_start();

$_SESSION["entrado"] = false;

// Definir un array de usuarios y contraseñas válidos
$usuarios = [
    'shebi' => '123',
    'hola' => '123',
];

// Obtener los datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Verificar las credenciales
if (array_key_exists($username, $usuarios) && $usuarios[$username] === $password) {
    $_SESSION["entrado"] = true;
    header("Location: ../pedidoForm.php");
} else {
    echo "Inicio de sesión fallido. Verifica tu usuario y contraseña.";
}
?>
