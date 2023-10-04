<?php
session_start();

require_once ('./layout-structure.php');
require_once ('./functions-structure.php');


myHeader();
myMenu();

echo "Bienvenido al ejercicio 2 .<br>";
echo "Tu nombre es  " . $_SESSION["nombre"] . ".<br>";
echo "Tu color favorito es " . $_SESSION["favColor"] . ".<br>";
echo "Tu animal favorito es " . $_SESSION["favAnimal"] . ".";


?>


<body>

<div class="text-center align-center" style="width: 80%">

    <div>
        <?php
            mostrarArrayAsociativoIcons($cards);
        ?>

    </div>

</div>
</body>
