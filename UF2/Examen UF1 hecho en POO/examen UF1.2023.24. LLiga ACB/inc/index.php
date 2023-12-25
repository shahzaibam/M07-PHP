<?php

session_start();

if(isset($_SESSION["contador"])) {
    $_SESSION["contador"] = $_SESSION["contador"] + 1;
}else {
    $_SESSION["contador"] = 1;

}






$cookie_name = "estil";
$value = "hola";


setcookie($cookie_name, $value, time() + (365 * 24 * 60 * 60), "/");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clubs</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<h3>Contador de visitas <?php echo $_SESSION["contador"] ?></h3>

<?php

include_once("./Clubs.php");

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

$allClubs = getAllClubs();

echo "<div class='club-container'>";

/**
 * si clubs no está vacío crearemos un array con diferentes claves que serian club_$numeroClub y instanciamos ahí, luego mostramos la instancia creada.
 */
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

echo "</div>";




?>

</body>
</html>