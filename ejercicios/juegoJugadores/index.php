<?php

include('./layout.php');
include('./data.php');
include('./functions.php');

myHeader(); 

myMenu();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>

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