<?php

require_once ('./layout-structure.php');
require_once ('./functions-structure.php');


myHeader();
myMenu();


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
