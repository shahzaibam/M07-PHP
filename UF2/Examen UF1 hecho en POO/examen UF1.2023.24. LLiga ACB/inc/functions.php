<?php

/**
 * comprueba si existe la variable de sesion contador
 * si existe le suma 1, si no existe lo crea con valor 1
 * @return void
 */
function checkSessionContador() {
    if(isset($_SESSION["contador"])) {
        $_SESSION["contador"] = $_SESSION["contador"] + 1;
    }else {
        $_SESSION["contador"] = 1;
    }
}


/**
 * en esta función leemos el fichero clubs y almacenamos todos los clubs en un array
 * @return array
 */
function getAllClubs()
{
    $filename = '../clubs.txt';
    $clubs = [];

    if (file_exists($filename)) {
        $contents = file($filename, FILE_IGNORE_NEW_LINES); // Leemos el archivo y almacenamos cada línea en un elemento del arreglo
        if (!empty($contents)) {
            foreach ($contents as $numeroFrase => $frase) {
                $clubs[$numeroFrase] = $frase;
            }
        } else {
            $clubs[] = "No hay Frases";
        }
    }

    return $clubs;
}


/**
 * si clubs no está vacío crearemos un array con diferentes claves que serian club_$numeroClub y instanciamos ahí, luego mostramos la instancia creada.
 */
function mostrarClubs($allClubs) {
    if (!empty($allClubs)) {

        foreach ($allClubs as $numeroClub => $club) {

            $nombreVariable = "club_" . $numeroClub;

            $instanciaClub[$nombreVariable] = new Clubs($club);

            if ($instanciaClub[$nombreVariable] != $instanciaClub["club_0"]) {
                echo "<div class='club-card'>";
                echo $instanciaClub[$nombreVariable];

                $image_src = $instanciaClub[$nombreVariable]->getImage();

                // aquí muestro las imágenes, hago un get del nombre de la imagen y lo muestro
                echo "<a href='./players/players_$club.php'><img class='club-logo' src='../images/logos_clubs/$image_src' /></a>";

                echo "</div>";
            }
        }
    } else {
        echo "No hay nada";
    }
}


/**
 * @param $all --> array de todos los jugadores
 * @param $cookie_name --> cookie Name si existe se comprueba el nombre del equipo y se le pone estilo segun eso
 * @param $nombreEquipo --> nombre del equipo
 * @return void
 */
function mostrarJugadores($all, $cookie_name, $nombreEquipo) {
    foreach ($all as $player) {

        if(isset($_COOKIE[$cookie_name])) {
            if($nombreEquipo == "BARÇA") {
                echo '<tr style="background: blue; font-size: 20px;">';
            }else if($nombreEquipo == "REAL MADRID") {
                echo '<tr style="background: white; font-size: 30px;">';
            }else if($nombreEquipo == "VALENCIA BASKET CLUB") {
                echo '<tr style="background: orange; font-size: 30px;">';
            }
        }else {
            echo '<tr>';
        }

        echo '<td>' . $player["nom"] . '</td>';
        echo '<td>' . $player["samarreta"] . '</td>';
        echo '<td>' . $player["club"] . '</td>';
        echo '<td>' . $player["posicion"] . '</td>';
        echo '<td>' . $player["nacionalidad"] . '</td>';
        echo '<td>' . $player["licencia"] . '</td>';
        echo '<td>' . $player["altura"] . '</td>';
        echo '<td>' . $player["edad"] . '</td>';
        echo '<td>' . $player["temp"] . '</td>';

        echo '<td>';
        echo '<a href="../singlePlayerView/singlePlayer.php?nombre=' . urlencode($player["nom"]) . '&imagen=' . urlencode($player["foto"]) . '&club=' . urlencode($player["club"]) . '">';
        echo '<img src="../../images/jugadores/' . $player["foto"] . '" height="100px">';
        echo '</a>';
        echo '</td>';

        echo '</tr>';
    }
}



/**
 * cargar partidos un array para los selectores
 */
function generarSelector($partidos) {
    echo "<label>Partido: </label>";
    echo '<select name="partidos">';
    foreach ($partidos as $partido) {
        echo '<option value="' . $partido . '" ' . $partido . '>' . $partido . '</option>';
    }
    echo '</select>';
    echo "<br>";
}



/**
 * cargar zonas del campo para radio button
 * @param $zonas
 * @return void
 */
function generarRadioBtn($zonas) {
    foreach ($zonas as $zona) {
        echo '<label>';
        echo '<input type="radio" name="zona" value="' . $zona . '" required> ' . $zona;
        echo '</label><br>';
    }
}


/**
 * cargar zonas del campo para radio button
 */
function generarNumeroEntradas($entradas) {
    echo "<label>Numero de Entradas: </label>";
    echo '<select name="entradas">';
    foreach ($entradas as $entrada) {
        echo '<option value="' . $entrada . '" ' . $entrada . '>' . $entrada . '</option>';
    }
    echo '</select>';
    echo "<br>";
}

