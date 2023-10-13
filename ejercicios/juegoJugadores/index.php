<?php

include('./layout.php');
include('./data.php');

myHeader();

myMenu();

function mostrarJugadores($jugadores)
{
    echo '<div class="player-list">';
    
    foreach ($jugadores as $key => $value) {
        echo "<div class=\"player\">";
        echo "<div class=\"image-container\">";
        echo "<img class=\"p-5\" src=\"./img/$key.png\"/>";
        echo "</div>";
        echo "<span>$key</span>";
        echo "</div>";
    }

    echo '</div>';
}

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