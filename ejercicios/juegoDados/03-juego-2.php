<?php

declare(strict_types=1);

session_start();

require_once './04-functions.php';


myHeader();

myMenu();

const MAX_TIRADAS_J2 = 5;



?>


<body>

    <div>

        <h1 class="text-center mt-4">
            Juego 2
        </h1>

        <div class="d-flex justify-content-around">


            <?php

            // inicioJugada();
            $numTiradas = tirarDadoRecargaJ2();

            echo "<p>Tirada numero  : " . $numTiradas . "</p>";


            if($numTiradas == 0) {
                echo "<h1> Pulsa F5 para jugar<h1>";
            }else {
                echo "<div>";
                echo " <p>Jugador 1 </p>";
                $numDadoRandomJ1 = tirarDado();
                mostrarDado($numDadoRandomJ1);
                echo "<p> $numDadoRandomJ1 </p>";
                echo "</div>";
    


                echo "<div>";
                echo "<p>Jugador 2 </p>";
                $numDadoRandomJ2 = tirarDado();
                mostrarDado($numDadoRandomJ2);
                echo "<p> $numDadoRandomJ2 </p>";
                echo "</div>";

                calcularPuntos($numDadoRandomJ1, $numDadoRandomJ2);


                echo "Puntos Jugador 1  : " . $_SESSION["puntosJ1"];
                echo ("<br>");
                echo "Puntos Jugador 2  : " . $_SESSION["puntosJ2"];


                $mensaje = decidirGanador($numTiradas);

                echo "<h2> $mensaje </h2>";


            }


            ?>
        </div>



    </div>


    </div>

</body>