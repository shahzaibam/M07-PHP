<?php
/*
include "../Modelo/Soporte.php";
include "../Modelo/CintaVideo.php";
include "../Modelo/Dvd.php";
include "../Modelo/Juego.php";


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
*/


include_once "../Modelo/CintaVideo.php";
include_once "../Modelo/Dvd.php";
include_once "../Modelo/Juego.php";
include_once "../Modelo/Cliente.php";
include_once "../Modelo/Videoclub.php";


//instanciamos un par de objetos cliente
$cliente1 = new Cliente("Bruce Wayne", 23);
$cliente2 = new Cliente("Clark Kent", 33);

//mostramos el número de cada cliente creado
//echo "<br>El identificador del cliente 1 es: " . $cliente1->getNumero();
//echo "<br>El identificador del cliente 2 es: " . $cliente2->getNumero();

//instancio algunos soportes
$soporte1 = new CintaVideo("Los cazafantasmas", 1, 3.5, 107);
$soporte2 = new Juego("The Last of Us Part II", 2, 49.99, "PS4", 1, 1);
$soporte3 = new Dvd("Origen", 3, 15, "es,en,fr", "16:9");
$soporte4 = new Dvd("El Imperio Contraataca", 4, 3, "es,en", "16:9");

//alquilo algunos soportes
$cliente1->alquilar($soporte1);
$cliente1->alquilar($soporte2);
$cliente1->alquilar($soporte3);

//voy a intentar alquilar de nuevo un soporte que ya tiene alquilado
$cliente1->alquilar($soporte1);


//el cliente tiene 3 soportes en alquiler como máximo
//este soporte no lo va a poder alquilar
$cliente1->alquilar($soporte4);

//este soporte no lo tiene alquilado
$cliente1->devolver(4);

//devuelvo un soporte que sí que tiene alquilado
$cliente1->devolver(2);

//alquilo otro soporte
$cliente1->alquilar($soporte4);
//listo los elementos alquilados
$cliente1->listarAlquileres();
//este cliente no tiene alquileres
$cliente2->devolver(2);



// Crear una instancia de Videoclub
$vc = new Videoclub();

// Crear una instancia de Juego
$juego1 = new Juego("God of War", 1, 19.99, "PS4", 1, 1);

// Incluir el juego en el Videoclub
$vc->incluirJuego($juego1);

//voy a incluir unos cuantos soportes de prueba

$juego1 = new Juego("God of War", 1, 19.99, "PS4", 1, 1);
$vc->incluirJuego($juego1);


// Crear una instancia de Juego
$juego2 = new Juego("The Last of Us Part II", 2, 49.99, "PS4", 1, 1);

// Incluir el juego en el Videoclub
$vc->incluirJuego($juego2);

$dvd1 = new Dvd("Torrente", 4.5, 15,"es", "16:9");
$vc->incluirSoporte($dvd1);

$dvd2 = new Dvd("Origen", 4.5, 15, "es,en,fr", "16:9");
$vc->incluirSoporte($dvd2);

$dvd3 = new Dvd("El Imperio Contraataca",3, 13, "es,en", "16:9");
$vc->incluirSoporte($dvd3);

$cintaVideo1 = new CintaVideo("Los cazafantasmas", 3.5,15, 107);
$vc->incluirSoporte($cintaVideo1);

$cintaVideo2 = new CintaVideo("El nombre de la Rosa", 1.5,15, 140);
$vc->incluirSoporte($cintaVideo2);;

//listo los productos
$vc->listarProductos();

//voy a crear algunos socios
$vc->incluirSocio("Amancio Ortega");
$vc->incluirSocio("Pablo Picasso", 2);

$vc->alquilaSocioProducto(1, 2);
$vc->alquilaSocioProducto(1, 3);
//alquilo otra vez el soporte 2 al socio 1.
// no debe dejarme porque ya lo tiene alquilado
$vc->alquilaSocioProducto(1, 2);
//alquilo el soporte 6 al socio 1.
//no se puede porque el socio 1 tiene 2 alquileres como máximo
$vc->alquilaSocioProducto(1, 6);

//listo los socios
$vc->listarSocios();
