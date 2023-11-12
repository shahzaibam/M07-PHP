<?php

session_start();

include('../layout.php');
include('../data/data.php');
include('../functions.php');

myHeader();
myMenu();

$archivo = "../csvFiles/entrenadores.csv";





?>
<body>

    <div>
        <h2 class="text-center mt-4">Listado de Entrenadores:</h2>
        <div>
            <div class="d-flex justify-content-around mt-5">
                <?php



                mostrarEntreandores($archivo);

                ?>
            </div>
        </div>

    </div>

</body>