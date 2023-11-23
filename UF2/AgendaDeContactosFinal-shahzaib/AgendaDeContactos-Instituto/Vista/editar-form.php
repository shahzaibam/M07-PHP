<?php

include_once("../Controlador/Editar.php"); 


$editar = new Editar();

$contacto1 = new Contacto("Juan", "Pérez", "2000-01-01", "juan@gmail.com");

//muestro el formulario de edicion con los parametros del contacto 1
echo "<h2>Mostrar Formulario de Edición:</h2>";
$editar->mostrarFormularioEdicion($contacto1);

?>