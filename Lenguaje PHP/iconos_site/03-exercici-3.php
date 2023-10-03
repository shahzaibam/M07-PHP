<?php

require_once('./layout-structure.php');
require_once('./functions-structure.php');


myHeader();
myMenu();


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
    $minimLike = 0;
    $iconsWithMinimLikes = [];

    // Busco el maximo numero de likes
    foreach ($iconsInfo as $icon) {
        $likes = $icon["likes"];
        if ($likes < $minimLike) {
            $minimLike = $likes;
            $iconsWithMinLikes = [$icon];
        } elseif ($likes == $minimLike) {
            array_push($iconsWithMinimLikes, $icon);
        }
    }

    return $iconsWithMinimLikes;
}






?>

<body>

    <div>
        <h1 class="text-center mt-4">Ejercicio 3</h1>


        <h2>Posiciones Pares</h2>

        <div class="d-flex">
            <?php
            mostrarArrayIconsPares($iconsInfo, $iconosPares);
            ?>
        </div>

        <h2>Posiciones IMPARES</h2>

        <div class="d-flex">
            <?php
            mostrarArrayIconsImPares($iconsInfo, $iconosImpares);
            ?>
        </div>



        <!-------------------------------------- !-->



        <h2>Mostrar Array almacenado de PARES</h2>
        <div>
            <div class="d-flex border">

                <?php
                mostrarArrayAlmacenado($iconosPares);
                ?>
            </div>
        </div>

        <h2>Mostrar Array almacenado de IMPARES</h2>
        <div>
            <div class="d-flex border">

                <?php
                mostrarArrayAlmacenado($iconosImpares);
                ?>
            </div>
        </div>


        <h2>Mostrar Array Unido</h2>
        <div>
            <div class="col-6 d-flex">

                <?php
                $arrayMerged = uniteArrays($iconosPares, $iconosImpares);

                mostrarArrayAlmacenado($arrayMerged);
                ?>
            </div>
        </div>


        <h2>Mostrar Icono con más likes</h2>
        <div class="d-flex">
            <?php

            $topLikes = mostrarIconosConMasLikes($iconsInfo);

            mostrarArrayAlmacenado($topLikes);

            ?>
        </div>



        <h2>Mostrar Icono con menos likes</h2>
        <div class="d-flex">
            <?php

            $bottomLikes = mostrarIconosConMenosLikes($iconsInfo);

            mostrarArrayAlmacenado($bottomLikes);

            ?>
        </div>

    </div>
</body>