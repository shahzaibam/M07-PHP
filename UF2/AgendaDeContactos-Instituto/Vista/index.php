<?php

include("../Modelo/Alumno.php");

//TESTS
$alumno1 = new Alumno("Juan", "Pérez", "2000-01-01", "juan@gmail.com", "1A", ["Matemáticas", "Historia"]);
$alumno2 = new Alumno("Ana", "García", "2002-05-15", "ana@gmail.com", "2B", ["Inglés", "Ciencias"]);


echo "Alumno 1:<br>";
echo "------------------ <br>"; 
echo "$alumno1\n";
echo "------------------ <br>"; 
echo "Alumno 2:<br>";
echo "------------------ <br>"; 
echo "$alumno2\n";
echo "------------------ <br>"; 

$asignatura_a_mirar = "Historia";

echo "¿Alumno 1 tiene la asignatura '$asignatura_a_mirar'? " . ($alumno1->hasAsignatura($asignatura_a_mirar) ? "Sí" : "No") . "\n <br>";
echo "------------------ <br>"; 


?>