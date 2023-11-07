<?php

session_start();

$_SESSION["entrado"] = false;

// Obtener los datos del formulario
$username = $_POST['username'];
$password = $_POST['pass'];

$_SESSION["username"] = $username;

// Ruta al archivo CSV
$csvFile = '../csvFiles/login.csv';

// Verificar las credenciales leyendo el archivo CSV
if (($handle = fopen($csvFile, "r")) !== false) {
    while (($data = fgetcsv($handle, 1000, ";")) !== false) {
        if (count($data) >= 2) {  // Asegurarse de que haya al menos dos elementos en el array
            $csvUsername = $data[0];
            $csvPassword = $data[1];

            if ($csvUsername === "luis_enrique" && $csvPassword === $password) {
                $_SESSION["entrado"] = true;

                header("Location: ../viewEntrenador/home.php");



                $cookie_name = "visitsLuis";
                $visits = 1;

                // Verificar si la cookie existe
                if(isset($_COOKIE[$cookie_name])) {
                    $visits = $_COOKIE[$cookie_name];
                    $visits++;
                }

                // Establecer la cookie con el nuevo valor y una duración de 365 días
                setcookie($cookie_name, $visits, time() + (365 * 24 * 60 * 60), "/");


                exit();
            }else if($csvUsername === "xavi_hernand" && $csvPassword === $password){
                $_SESSION["entrado"] = true;

                header("Location: ../viewEntrenador/home.php");



                $cookie_name = "visitsXavi";
                $visits = 1;

                // Verificar si la cookie existe
                if(isset($_COOKIE[$cookie_name])) {
                    $visits = $_COOKIE[$cookie_name];
                    $visits++;
                }

                // Establecer la cookie con el nuevo valor y una duración de 365 días
                setcookie($cookie_name, $visits, time() + (365 * 24 * 60 * 60), "/");


                exit();
            }
        }
    }
    fclose($handle);
}

echo "Inicio de sesión fallido. Verifica tu usuario y contraseña.";

?>
