<?php
session_start();


require_once('./layout-structure.php');
require_once('./functions-structure.php');


myHeader();
myMenu();

echo "Bienvenido al ejercicio 3 .<br>";
echo "Tu nombre es  " . $_SESSION["nombre"] . ".<br>";
echo "Tu color favorito es " . $_SESSION["favColor"] . ".<br>";
echo "Tu animal favorito es " . $_SESSION["favAnimal"] . ".<br>";


if(isset($_SESSION["contador"])) {
    $_SESSION["contador"] = $_SESSION["contador"] + 1;
}

echo ($_SESSION["contador"]);


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


        <h2>Mostrar Icono orden desc like</h2>
        <div class="d-flex">
            <?php

            $ordenDesc = ordenDescendente($iconsInfo);

            mostrarArrayAlmacenado($ordenDesc);

            ?>
        </div>


        <h2>Mostrar Icono orden desc tagname</h2>
        <div class="d-flex">
            <?php

            $ordenDescTag = ordenTagName($iconsInfo);

            mostrarArrayAlmacenado($ordenDescTag);

            ?>
        </div>



        <h2>Mostrar Icono segun tagname</h2>
        <div class="d-flex">
            <?php

            findTagName($iconsInfo);

            ?>
        </div>

    </div>
</body>