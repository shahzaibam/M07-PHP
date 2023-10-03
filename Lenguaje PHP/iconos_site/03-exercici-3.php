<?php

require_once('./layout-structure.php');
require_once('./functions-structure.php');


myHeader();
myMenu();

$iconosPares = [];
$iconosImpares = [];

function mostrarArrayIconsPares($iconsInfo, &$iconosPares)
{
    $imgVeinte = 20;
    for ($i = 0; $i < 20; $i++) {

        // if ($i == $imgVeinte) {

        //     echo ("<div>");
        //     echo ("<img src='./img/" . ($i-1) . ".png'>");
        //     echo ("<b> " . $i . "</b>");
        //     echo ("</div>");

        //     array_push($iconosPares, $iconsInfo[$i-1]);
        // } 
        // else {
            if ($i % 2 == 0) {
                // print_r($iconsInfo[$i]);
                echo ("<div>");

                echo ("<img src='./img/" . $i . ".png'>");
                echo ("<b> " . $i . "</b>");
                echo ("</div>");

                if ($i < 20) {

                    array_push($iconosPares, $iconsInfo[$i]);
                }
            }
        // }
    }
}


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

// function mostrarArrayAlmacenado(&$array)
// {
//     foreach ($array as $key => $value) {
//         echo ("<div>");
//         echo ("<img src='./img/" . $value["imgName"] . "'>"); 
//         foreach ($value as $clave => $valor) {
//             echo ("<p>" . $clave .  "  --->  " . $valor . "</p>");
//         }
//         echo ("</div>");
//     }
// }



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


        <h2>Mostrar Array almacenado de PARES</h2>
        <div >
            <div class="d-flex border">

                <?php
                // mostrarArrayAlmacenado($iconosPares);
                ?>
            </div>
        </div>


        <!-------------------------------------- !-->

        <h2>Posiciones IMPARES</h2>

        <div class="d-flex">
            <?php
                mostrarArrayIconsImPares($iconsInfo, $iconosImpares);
            ?>
        </div>


        <h2>Mostrar Array almacenado de IMPARES</h2>
        <div >
            <div class="d-flex border">

                <?php
                // mostrarArrayAlmacenado($iconosImpares);
                ?>
            </div>
        </div>



    </div>
</body>