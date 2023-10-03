<?php

require_once('./layout-structure.php');
require_once('./functions-structure.php');


myHeader();
myMenu();






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


    </div>
</body>