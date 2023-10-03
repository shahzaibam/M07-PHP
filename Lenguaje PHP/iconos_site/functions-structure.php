<?php

//generar numero random del 1 al 20
function numRandom(): int{
    $num = rand(1,20);

    return $num;
}


//Cargar iconos con un size random y iconos
function cargarIconos(int $rand, array &$icons) {
    for ($i=0; $i < $rand ; $i++) { 
        $numIcon = numRandom();

        array_push($icons, $numIcon);
        
    }
}

//mostrar iconos
function mostrarArrayIcons($icons) {
    for ($i=0; $i < count($icons); $i++) { 
        echo ("<img src=./img/" . $icons[$i] . ".png>"); 
    }
}

//pasar array y eliminar el primer icono
function eliminarPrimero(array &$array) {
    array_shift($array);
}


//pasar array y añadir icono al final
function addUltimo(array &$array) {

    $numRand = numRandom();

    array_push($array, $numRand);
}



//mostrar arrays multidimensionales con sus keys y valores
function mostrarArrayAsociativoIcons(&$cards) {
    foreach ($cards as $key => $icon) {
        $numImg = $key + 1;

        echo ("<img src=./img/$numImg.png>");

        foreach ($icon as $property => $valor) {
            echo ("<span> $property : $valor </span>");

        }


    }
}

//funcion para mostrar los iconos pares y a la vez ir guardando los en una variable array
function mostrarArrayIconsPares($iconsInfo, &$iconosPares)
{
    $imgVeinte = 20;
    for ($i = 0; $i < 20; $i++) {

        if ($i % 2 == 0) {
            echo ("<div>");

            echo ("<img src='./img/" . $i . ".png'>");
            echo ("<b> " . $i . "</b>");
            echo ("</div>");

            if ($i < 20) {

                array_push($iconosPares, $iconsInfo[$i]);
            }
        }
    }
}

//funcion para mostrar los iconos impares y a la vez ir guardando los en una variable array
function mostrarArrayIconsImPares($iconsInfo, &$iconosImpares)
{
    for ($i = 0; $i < 21; $i++) {

        if (!($i % 2 == 0)) {

            echo ("<img src='./img/" . $i . ".png'>");
            echo ("<b> " . $i . "</b>");

            array_push($iconosImpares, $iconsInfo[$i]);
        }
    }
}


//funcion para mostrar el array
function mostrarArrayAlmacenado(&$array)
{
    foreach ($array as $key => $value) {
        echo ("<div>");
        echo ("<img src='./img/" . $value["imgName"] . "'>"); 
        foreach ($value as $clave => $valor) {
            echo ("<p>" . $clave .  "  --->  " . $valor . "</p>");
        }
        echo ("</div>");
    }
}


//funcion para hacer un merge de los array
function uniteArrays(&$arrayUno, &$arrayDos):mixed {
    $arrayUnited = array_merge($arrayUno, $arrayDos);

    return $arrayUnited;
}


?>