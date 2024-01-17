<div id="content" style="text-align: center;">
    <?php
    echo '<div style="display: flex; flex-wrap: wrap; justify-content: space-around;">';

    if (isset($content)) {
        foreach ($content as $item) {
            echo '<div style="width: 16.66%; margin: 10px; text-align: center; background-color: white; padding: 10px; border-radius: 8px;">';
            echo '<div style="overflow: hidden;">';
            echo "<a href='http://localhost/M07-PHP/UF2/mvc1-juego-Jugadores/util/Jugador/dataCreatedWithTemplate/html/$item.html'>" . htmlspecialchars($item) . "</a>";
            echo '</div>';
            echo '</div>';
        }
    }

    echo '</div>';
    ?>
</div>
