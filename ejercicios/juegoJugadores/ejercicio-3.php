<?php

// Lo mismo que el ejercicio 2 pero la plantilla de la carta ha de estar en un fichero que el programa lo ha de leer, el fichero se llamará: index.view.html (es un html con el texto de la carta) 

include('./layout.php');
include('./data.php');
include('./functions.php');

 
myHeader();
myMenu();

$names_array = array_keys($jugadores);

$templateLocation = "templateToRead/index.view.html";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div>
        <div>
            <h1 class="text-center mt-5">Ejercicio 3</h1>
        </div>

        <?php
            $lettersGen = make_letters_file($templateLocation, $names_array);

            if($lettersGen) {
                echo "<p> Leído... Imprimiendo....";
                echo "<pre>";

                showTemplateJugadores($lettersGen);

                echo "</pre>";
            }


        ?>

    </div>

</body>

</html>