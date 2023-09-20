<?php

echo("<h2> Pulsa en el botón para tirar el dado</h2>");

echo("<button onclick='window.location.reload()'> Tirar Dardo </button>"); //window.location.reload() recarga la página

echo("<br>");
echo("<br>");

$randomImg = rand(1,6); //nos saldrá un numero random del 1 al 6
echo("<img src='../random/img/" . $randomImg . ".png' width='500' height='600'>"); //pondremos el path donde está la imagen, y en el nombre de la imagen pondremos la variable randomImg que nos devuelve un num random.
echo($randomImg);

?>

