
<?php
/* 

EJERCICIO 1:
Asigna a una variable una cadena y muestra por pantalla:
-longitud:
-cadena invertida:
-cuantas palabras tiene:
-cuantas 'a' contiene la Cadena:
-reemplaza las 'a' por 'A':

*/


$cadena = "Hola esto es una cadena compai" . "<br>";
print ($cadena);
echo "Longitud cadena: " . strlen($cadena) . "<br>"; 
echo "Contiene: ";
$contarA = substr_count(strtolower($cadena), 'a');
print ($contarA);

?>