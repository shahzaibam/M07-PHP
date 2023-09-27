<?php

require_once ('./layout-structure.php');
require_once ('./functions-structure.php');


myHeader();
myMenu();

?>


<body>

<div>
    <h1> Ejercicio 1 </h1>

    <?php

        //declaramos array vacío
        $icons = array();

        //random size
        $size_array = rand(1,20);

        //Cargando icons
        cargarIconos($size_array, $icons);

        //mostrando Icons
        echo "<h1> ---- Cargando Icons ---- </h1>";
        // echo "<hr>";
        mostrarIconos($icons);


        //eliminar icons
        echo "<hr>";
        echo "<h1> ---- Eliminando el primero ---- </h1>";
        eliminarPrimero($icons);
        mostrarIconos($icons);


        //añadir al ultimo del array
        echo "<hr>";
        echo "<h1> ---- Añadiendo al ultimo ---- </h1>";
        addUltimo($icons);
        mostrarIconos($icons);
        
    ?>
</div>

</body>