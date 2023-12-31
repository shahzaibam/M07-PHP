<?php

session_start();

include_once("./Clubs.php");
include_once("./functions.php");

checkSessionContador();

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
    $allClubs = getAllClubs();

    echo "<div class='club-container'>";
        mostrarClubs($allClubs);
    echo "</div>";
?>

</body>
</html>