<?php

require_once ('./layout-structure.php');
require_once ('./functions-structure.php');


myHeader();
myMenu();

function mostrarImagenesIcons(&$cards) {
    foreach ($cards as $key => $value) {
        $numImg = $key + 1;
        echo ("<img src=./img/$numImg.png>");

        foreach ($value as $key => $value) {
            echo ("<span>tag :  $value </span>");
        }

    }
}

?>


<body>

    <?php
        // print_r($cards);
        mostrarImagenesIcons($cards);
    ?>

</body>
