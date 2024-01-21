<div id="content">
        <?php
        echo '<div style="display: flex; flex-wrap: wrap; justify-content: space-around;">';

        if (isset($content)) {
            foreach ($content as $entrenador) {
                echo '<div style="width: 16.66%; margin: 10px; text-align: center; background-color: white; padding: 10px; border-radius: 8px;">';
                echo "<img src='http://127.0.0.1/m07-php/UF2/mvc1-juego-Jugadores/view/img/Entrenadores/{$entrenador->getFoto()}' width='150px' height=''>";
                echo "<div>";
                echo "<span>Nombre: {$entrenador->getNombre()}</span> <br>";
                echo "<span>Equipo: {$entrenador->getEquipo()}</span> <br>";
                echo "<span>Fecha de nacimiento: {$entrenador->getfNacimiento()}</span> <br>";
                echo "<span>Any de entrenador: {$entrenador->getAnyDeEntrenador()}</span> <br>";
                echo "<span>Nivel de liderago: {$entrenador->getNivelDeLiderazgo()}</span> <br>";
                echo "</div>";
                echo '</div>';
            }
        }

        echo '</div>';
        ?>
</div>
