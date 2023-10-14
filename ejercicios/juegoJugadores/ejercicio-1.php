<?php

//Genera una carta para todos los jugadores/as y guarda los archivos en disco. Los jugadores/as estarán definidos en un array, los archivos generados se llamarán: ferranTorres.txt, gavi.txt


include('./layout.php');
include('./data.php');
include('./functions.php');



myHeader();
myMenu();

$names_array = array_keys($jugadores);

// print_r($names_array);




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
        <h1 class="text-center mt-5">Ejercicio 1</h1>
    </div>

    <?php
        make_letters($names_array);
        writeInFileTxt($names_array);
    ?>

    <?php
    myFooter();

    ?>
</body>

</html>