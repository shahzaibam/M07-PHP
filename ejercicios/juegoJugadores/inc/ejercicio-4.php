<?php

//Partiendo del ejercicio 3 genera las cartas y guardalas en disco en ficheros html: ferranTorres.html, gavi.html.
//Crea también un fichero 'index.html' con una lista de los enlaces a los ficheros de las cartas generadas.


include('../layout.php');
include('../data/data.php');
include('../functions.php');

myHeader();
myMenu();

$names_array = array_keys($jugadores);

$templateLocation = "../templateToRead/index.view.html"

?>

<body>
    <div>

        <div>
            <h1 class="text-center m-5">Ejercicio 4</h1>
        </div>

        <?php

        $lettersMaken = make_letters_file($templateLocation, $names_array);
        // print_r($lettersMaken);
        writeInFileHtml($templateLocation, $names_array);


        $indexTemplateArrays = make_letters_index($names_array);

        // echo "<pre>";

        // showTemplateJugadores($indexTemplateArrays);

        // echo "</pre>";

        writeInFileTxtIndex($names_array);
        header("Location:./playerTemplateInfo.php");


        ?>

    </div>

    <?
    myFooter();
    ?>
</body>
