<?php

require_once ('./layout-structure.php');
require_once ('./functions-structure.php');


myHeader();
myMenu();

function mostrarArrayIconsPares($iconsInfo) {
    for ($i=0; $i < 20; $i++) { 

        if($i%2 == 0) {
            print_r($iconsInfo[$i]);
        }

    }
}

?>

<body>

    <div>
        <h1 class="text-center mt-4">Ejercicio 3</h1>


        <h2>Posiciones Pares</h2>
        <?php
            // print_r($iconsInfo);

            mostrarArrayIconsPares($iconsInfo);
            
        ?>
    </div>

</body>