<?php

//Lo mismo que el ejercicio 1 pero las cartas no se guardan en un fichero de texto, sino que las imprimes por pantalla con tags html  <pre> ... </pre>.

include('../layout.php');
include('../data/data.php');
include('../functions.php');


myHeader();
myMenu();

$names_array = array_keys($jugadores);




?>

<div>
    <div>
        <h1 class="text-center mt-5">Ejercicio 2</h1>
    </div>
    <div>
        <?php

        $getJugadoresLetter = make_letters($names_array);

        echo ("<pre>");

        showTemplateJugadores($getJugadoresLetter);

        echo ("</pre>");

        ?>
    </div>
</div>

    <?php

        myFooter();

    ?>

</body>

</html>