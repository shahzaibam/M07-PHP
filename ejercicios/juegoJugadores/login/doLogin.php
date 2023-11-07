<?php

session_start();

$_SESSION["entrado"] = false;

// Obtener los datos del formulario
$username = $_POST['username'];
<<<<<<< HEAD
$password = $_POST['password'];
=======
$password = $_POST['pass'];

$_SESSION["username"] = $username;
>>>>>>> ec3585090f19b5a89b9954a5a7239f3ed49d728d

// Ruta al archivo CSV
$csvFile = '../csvFiles/login.csv';

// Verificar las credenciales leyendo el archivo CSV
if (($handle = fopen($csvFile, "r")) !== false) {
<<<<<<< HEAD
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
        $csvUsername = $data[0];
        $csvPassword = $data[1];

        if ($csvUsername === $username && $csvPassword === $password) {
            $_SESSION["entrado"] = true;
            header("Location: ../pedidoForm.php");
            exit();
=======
    while (($data = fgetcsv($handle, 1000, ";")) !== false) {
        if (count($data) >= 2) {  // Asegurarse de que haya al menos dos elementos en el array
            $csvUsername = $data[0];
            $csvPassword = $data[1];

            if ($csvUsername === $username && $csvPassword === $password) {
                $_SESSION["entrado"] = true;

                header("Location: ../viewEntrenador/home.php");
                exit();
            }
>>>>>>> ec3585090f19b5a89b9954a5a7239f3ed49d728d
        }
    }
    fclose($handle);
}

<<<<<<< HEAD
=======

>>>>>>> ec3585090f19b5a89b9954a5a7239f3ed49d728d
echo "Inicio de sesión fallido. Verifica tu usuario y contraseña.";

?>
