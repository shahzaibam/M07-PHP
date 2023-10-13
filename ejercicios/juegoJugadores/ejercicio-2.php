<?php

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
    <h1 class="text-center mt-4">Ejercicio 2</h1>
    <div>
    <?php

        $getJugadoresLetter = make_letters($names_array);

        echo ("<pre>");

        print_r($getJugadoresLetter);

        echo ("</pre>");

    ?>
    </div>

</div>
    
</body>
</html>