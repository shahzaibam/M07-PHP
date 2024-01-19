<?php

session_start();

$_SESSION["entrado"] = false;

// Obtener los datos del formulario
$username = $_POST['username'];
$password = $_POST['pass'];

$_SESSION["username"] = $username;

// Ruta al archivo CSV
$csvFile = 'http://127.0.0.1/m07-php/UF2/mvc1-juego-Jugadores/view/form/JugadorForm/LoginForm/csvFiles/login.csv';

// Verificar las credenciales leyendo el archivo CSV
if (($handle = fopen($csvFile, "r")) !== false) {
    while (($data = fgetcsv($handle, 1000, ";")) !== false) {
        if (count($data) >= 2) {  // Asegurarse de que haya al menos dos elementos en el array
            $csvUsername = $data[0];
            $csvPassword = $data[1];

            if ($csvUsername === $username && $csvPassword === $password) {
                $_SESSION["entrado"] = true;

                header("Location: http://127.0.0.1/m07-php/UF2/mvc1-juego-Jugadores/");

                if ($username == "xavi_hernand") {
                    $cookie_name = "visitsXavi";
                    $visits = 1;

                    // Verificar si la cookie existe
                    if (isset($_COOKIE[$cookie_name])) {
                        $visits = $_COOKIE[$cookie_name];
                        $visits++;
                    }

                    // Establecer la cookie con el nuevo valor y una duración de 365 días
                    setcookie($cookie_name, $visits, time() + (365 * 24 * 60 * 60), "/");
                } else if ($username == "luis_enrique") {
                    $cookie_name = "visitsLuis";
                    $visits = 1;

                    // Verificar si la cookie existe
                    if (isset($_COOKIE[$cookie_name])) {
                        $visits = $_COOKIE[$cookie_name];
                        $visits++;
                    }

                    // Establecer la cookie con el nuevo valor y una duración de 365 días
                    setcookie($cookie_name, $visits, time() + (365 * 24 * 60 * 60), "/");
                } else if ($username == "vicente_bosque") {
                    $cookie_name = "visitsVicente";
                    $visits = 1;

                    // Verificar si la cookie existe
                    if (isset($_COOKIE[$cookie_name])) {
                        $visits = $_COOKIE[$cookie_name];
                        $visits++;
                    }

                    // Establecer la cookie con el nuevo valor y una duración de 365 días
                    setcookie($cookie_name, $visits, time() + (365 * 24 * 60 * 60), "/");
                }


                exit();
            }
        }
    }
    fclose($handle);
}

?>


<body>

  <header>
    <div class="head-text">
      <p>Incorrect Credentials</p>
    </div>
  </header>

  <main>
    <div class="main-wrapper">
      <picture class="scarecrow-img">
        <img src="https://raw.githubusercontent.com/nat-oku/devchallenges/main/Scarecrow.png" alt="scarecrow">
      </picture>
      <div class="error-text">
        <h2>I have bad news for you</h2>
        <p>The page you are looking for needs you to Login.</p>
        <span class="input-group-btn">
           <a href="http://127.0.0.1/m07-php/ejercicios/juegoJugadores/index.php"> <button class="btn" type="button"> Back to homepage</button></a>
        </span>
      </div>
    </div>

  </main>

</body>