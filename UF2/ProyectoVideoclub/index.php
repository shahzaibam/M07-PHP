<?php
include "./Classes/Soporte.php";
include "./Classes/CintaVideo.php";
include "./Classes/Dvd.php";
include "./Classes/Juego.php";


$soporte1 = new Soporte("Tenet", 22, 3);
echo "<strong>" . $soporte1->titulo . "</strong>";
echo "<br>Precio: " . $soporte1->getPrecio() . " euros";
echo "<br>Precio IVA incluido: " . $soporte1->getPrecioConIVA() . " euros";
echo "<br>";
echo "<br>";

$soporte1->muestraResumen();

echo "<br>";
echo "<br>";
echo "<br>";


// Ejemplo de uso CintaVideo
$cintaVideo = new CintaVideo("Película en VHS", 456, 19.99, "2 horas");

echo "<strong>" . $cintaVideo->titulo . "</strong>";
echo "<br>Precio: " . $cintaVideo->getPrecio() . " euros";
echo "<br>Precio IVA incluido: " . $cintaVideo->getPrecioConIva() . " euros <br>";
echo "<br>";

$cintaVideo->muestraResumen();

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";



// Ejemplo de uso Dvd
$miDvd = new Dvd("Origen", 24, 15, "es,en,fr", "16:9");
echo "<strong>" . $miDvd->titulo . "</strong>";
echo "<br>Precio: " . $miDvd->getPrecio() . " euros";
echo "<br>Precio IVA incluido: " . $miDvd->getPrecioConIva() . " euros";
echo "<br>";

$miDvd->muestraResumen();


echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";


//Ejemplo Juego
$miJuego = new Juego("The Last of Us Part II", 26, 49.99, "PS4", 1, 1);
echo "<strong>" . $miJuego->titulo . "</strong>";
echo "<br>Precio: " . $miJuego->getPrecio() . " euros";
echo "<br>Precio IVA incluido: " . $miJuego->getPrecioConIva() . " euros";
echo "<br>";

$miJuego->muestraResumen();