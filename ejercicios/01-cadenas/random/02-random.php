<?php
/*crear uan pagina quemuestre un numero entero aleatorio entre 1 y 100
otro numero float entre 0 y 5 */

echo("Este es un numero aleatorio entre 1 y 100 --> ");
echo(rand(1,100));
echo("<br>");

/* hago un aleatorio del 0 al 50 para que me de un float del 0 al 5, es decir dividire todos los numeros entre 10, 
por ejemplo si me sale el 46, lo divido entre 10 y me dará 4.6 */
echo("Este es un numero aleatorio float entre 0 y 5 --> ");
$numRand = rand(0,50);
$toFloat = $numRand/10;
echo(number_format($toFloat,2));
echo("<br>");





?>