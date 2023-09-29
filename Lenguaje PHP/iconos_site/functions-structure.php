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


//mostrar iconos pares

?>