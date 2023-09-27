<?php

require_once ('./layout-structure.php');
require_once ('./functions-structure.php');


myHeader();
myMenu();




?>


<body>

<body>

<div class="text-center">

    <h1 class="text-center">Welcome Christmas Cards</h1>

    
    <?php

        $numeroImagen = array();

        //definir array de imagenes
        cargarIconosEnArray($numeroImagen);

        //mostrar Array
        mostrarArray($numeroImagen);

    ?>

</div>

</body>

</body>