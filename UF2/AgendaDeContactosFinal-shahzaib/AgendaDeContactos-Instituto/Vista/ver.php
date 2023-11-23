<?php

include_once("../Controlador/Mostrar.php"); 
$mostrar = new Mostrar();

$contacto1 = new Contacto("Juan", "Pérez", "2000-01-01", "juan@gmail.com");
$contacto2 = new Contacto("Ana", "García", "2002-05-15", "ana@gmail.com");

$agenda = [$contacto1, $contacto2];

//mostrar lista de contacto
echo "<h2>Mostrar Lista de Contactos:</h2>";
$mostrar->mostrarListaContactos($agenda);

?>