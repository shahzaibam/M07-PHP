<?php

include('../layout.php');
include('../data/data.php');
include('../functions.php');


myHeader();
myMenu();

$names_array = array_keys($jugadores);


?>

<body>
    <div>
        <h1 class="text-center mt-5">Redireccionado desde ejercicio-4.php</h1>
    </div>
    <?php

    $indexTemplateArrays = make_letters_index($names_array);


    echo "<h3> Jugadores </h3>";

    echo "<pre>";

    showTemplateJugadores($indexTemplateArrays);

    echo "</pre>";
    ?>
</body>

</html>