<?php

include('./layout.php');
include('./data/data.php');
include('./functions.php');

myHeader();

myMenu();



?>

<style>
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

  .player-list {
    display: flex;
    flex-wrap: wrap;
  }

  .player {
    margin: 10px;
    text-align: center;
  }

  .image-container {
    text-align: center;
  }
</style>


<body>

  <div class="text-center m-5">

    <h2>Selección Española 23/24</h2>

    <?php

    mostrarJugadores($jugadores);

    ?>

  </div>
</body>

</html>