<?php

include_once "./Libro.php";

$libro = new Libro("Lazarillo de Tormes", "Diego Hurtado", "Novela");

$prestarLibro = $libro->prestarLibro();
$prestarLibro_2 = $libro->prestarLibro();
$devolverLibro = $libro->devolverLibro();

echo "$prestarLibro";
echo "<br>";
echo "$prestarLibro_2";
echo "<br>";
echo "$devolverLibro";
echo "<br>";
echo "$prestarLibro";
echo "<br>";
echo "$prestarLibro_2";

?>