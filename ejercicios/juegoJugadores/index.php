<?php

include('./layout.php');
include('./data/data.php');
include('./functions.php');

myHeader();

myMenu();



?>


<body>

  <div class="text-center m-5">

    <h2>Selección Española 23/24</h2>

    <?php

    mostrarJugadores($jugadores);

    ?>

  </div>

  <?php

    myFooter();

  ?>

</body>

</html>