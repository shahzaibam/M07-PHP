<?php

include_once ("../layout.php");
myHeader();
myMenu();

?>
<body>

<h1>Detalles del Jugador</h1>

<?php
// Recupero los parámetros que le he pasado desde la URL
$nombre = isset($_GET['nombre']) ? urldecode($_GET['nombre']) : '';
$imagen = isset($_GET['imagen']) ? urldecode($_GET['imagen']) : '';
$club = isset($_GET['club']) ? urldecode($_GET['club']) : '';


if ($nombre && $imagen && $club) {
    echo "<p>Nombre: $nombre</p>";
    echo "<p>Club: $club</p>";
    echo "<img src='../../images/jugadores/$imagen'>";
} else {
    echo "<p>No se proporcionaron detalles del jugador.</p>";
}
?>

</body>

</html>
