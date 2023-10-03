<?php

//generar numero random del 0 al 19
function numRandom(): int{
    $num = rand(0,19);

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
        $numImg = $key;

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
        echo ("<div class='p-4 m-2 border'>");
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




//Muestra el icono con más LIKES, si hay empates tienes que mostrar todos.
function mostrarIconosConMasLikes($iconsInfo): mixed
{
    $maximLike = 0;
    $iconsWithMaximLikes = [];

    // Busco el maximo numero de likes
    foreach ($iconsInfo as $icon) {
        $likes = $icon["likes"];
        if ($likes > $maximLike) {
            $maximLike = $likes;
            $iconsWithMaximLikes = [$icon];
        } elseif ($likes == $maximLike) {
            array_push($iconsWithMaximLikes, $icon);
        }
    }



    return $iconsWithMaximLikes;
}


//Muestra el icono con menos LIKES, si hay empates tienes que mostrar todos.
function mostrarIconosConMenosLikes($iconsInfo): mixed
{
    $minimLike = PHP_INT_MAX; //PHP_INT_MAX es el valor maximo que puede tener un entero, se hace esto para comparar los likes con un numero mayor que los like
    $iconsWithMinimLikes = [];

    // Busco el minimo numero de likes
    foreach ($iconsInfo as $icon) {
        $likes = $icon["likes"];
        if ($likes < $minimLike) {
            $minimLike = $likes;
            $iconsWithMinimLikes = [$icon];
        } elseif ($likes == $minimLike) {
            array_push($iconsWithMinimLikes, $icon);
        }
    }

    return $iconsWithMinimLikes;
}


// 0 - if the two likes are equal
// <0 - negative if like 1 is less than like 2
// >0 - positive if like 1 is greater than like 2
//Funcion que ordena los likes de forma descendente
function ordenDescendente($iconsInfo): mixed
{
    usort($iconsInfo, function ($a, $b) {
        return $b["likes"] - $a["likes"];
    });

    return $iconsInfo; // Devolvemos el arreglo ordenado.
}


//ordenar Array segun el tagName
function ordenTagName($iconsInfo): mixed
{
    usort($iconsInfo, function ($a, $b) {
        return strcmp($a["tagName"], $b["tagName"]);
    });

    return $iconsInfo;
}
