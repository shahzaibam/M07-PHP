<?php

//Lo mismo que el ejercicio 1 pero las cartas no se guardan en un fichero de texto, sino que las imprimes por pantalla con tags html  <pre> ... </pre>.

include('../layout.php');
include('../data/data.php');
include('../functions.php');


myHeader();
myMenu();

$names_array = array_keys($jugadores);



// print_r($names_array);
 
?>
<!-- <style>
    @charset "UTF-8";
    /*=============== GOOGLE FONTS ===============*/
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap");

    /*=============== VARIABLES CSS ===============*/
    :root {
        /*========== Colors ==========*/
        --text-color: hsl(244, 4%, 36%);
        --body-color: #F2F2F2;
        /* Background color changed  #F2F2F2 */
        /*========== Font and typography ==========*/
        /*.5rem = 8px | 1rem = 16px ...*/
        --body-font: "Poppins", sans-serif;
    }

    /*=============== BASE ===============*/

    body {
        background-color: var(--body-color);
        font-family: var(--body-font);
        color: var(--text-color);
    }

</style> -->

<div>
    <div>
        <h1 class="text-center mt-5">Ejercicio 2</h1>
    </div>
    <div>
    <?php

        $getJugadoresLetter = make_letters($names_array);

        echo ("<pre>");

        // print_r($getJugadoresLetter);

        showTemplateJugadores($getJugadoresLetter);

        echo ("</pre>");

    ?>
    </div>

</div>
    
</body>
</html>