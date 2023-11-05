<?php

session_start();

$_SESSION["entrado"] = false;

// Obtener los datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Ruta al archivo CSV
$csvFile = '../csvFiles/login.csv';

// Verificar las credenciales leyendo el archivo CSV
if (($handle = fopen($csvFile, "r")) !== false) {
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
        $csvUsername = $data[0];
        $csvPassword = $data[1];

        if ($csvUsername === $username && $csvPassword === $password) {
            $_SESSION["entrado"] = true;
            header("Location: ../pedidoForm.php");
            exit();
        }
    }
    fclose($handle);
}

echo "Inicio de sesión fallido. Verifica tu usuario y contraseña.";

?>
