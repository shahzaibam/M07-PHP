<?php

session_start();

include_once("./layout.php");
include_once("./Clubs.php");
include_once("./functions.php");

myHeader();
myMenu();

checkSessionContador();

$cookie_name = "estil";
$value = "hola";

setcookie($cookie_name, $value, time() + (365 * 24 * 60 * 60), "/");
?>

<body>

<h3>Contador de visitas <?php echo $_SESSION["contador"] ?></h3>

<?php
    $allClubs = getAllClubs();

    echo "<div class='club-container'>";
        mostrarClubs($allClubs);
    echo "</div>";
?>

</body>
