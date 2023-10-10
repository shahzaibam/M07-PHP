<?php

declare(strict_types=1);

session_start();

require_once './04-functions.php';



myHeader();

myMenu();


const MAX_TIRADAS_J3 = 5;

?>

<body>

    <div>

        <h1 class="text-center mt-4">
            Juego 3
        </h1>

        <div>
            <?php

            $tiradas = tirarDadoRecargaJ3();

            echo "<p>tirada" . $tiradas . "</p>";


            if ($tiradas == 0) {

                echo "<h1 class=\"text-center\"> Pulsa F5 para jugar </h1>";
            } else {
                echo ("<div class=\"d-flex justify-content-around mt-5\">");
                echo ("<div>");
                echo ("<h1> Jugador 1 </h1>");

                $tirarDado1Jug1 = tirarDado();
                $tirarDado2Jug1 = tirarDado();

                mostrarDado($tirarDado1Jug1);
                mostrarDado($tirarDado2Jug1);

                $puntosTotalJ1 = $tirarDado1Jug1 + $tirarDado2Jug1;

                echo "<h1> Puntos Jugador 1 : $puntosTotalJ1 </h2>";

                echo ("</div>");




                echo ("<div>");
                echo ("<h1> Jugador 2 </h1>");
                $tirarDado1Jug2 = tirarDado();
                $tirarDado2Jug2 = tirarDado();

                mostrarDado($tirarDado1Jug2);
                mostrarDado($tirarDado2Jug2);

                $puntosTotalJ2 = $tirarDado1Jug2 + $tirarDado2Jug2;

                echo "<h1> Puntos Jugador 1 : $puntosTotalJ2 </h2>";

                echo ("</div>");



                echo ("<div>");
                echo ("<h1> Jugador 3 </h1>");
                $tirarDado1Jug3 = tirarDado();
                $tirarDado2Jug3 = tirarDado();

                mostrarDado($tirarDado1Jug3);
                mostrarDado($tirarDado2Jug3);

                $puntosTotalJ3 = $tirarDado1Jug3 + $tirarDado2Jug3;

                echo "<h1> Puntos Jugador 1 : $puntosTotalJ3 </h2>";

                echo ("</div>");
                echo ("</div>");


                // calcularPuntosJ3($puntosTotalJ1, $puntosTotalJ2, $puntosTotalJ3); 


                // echo "Puntos Jugador 1  : " . $_SESSION["puntosJ1"];
                // echo ("<br>");
                // echo "Puntos Jugador 2  : " . $_SESSION["puntosJ2"];
                // echo("<br>");
                // echo "Puntos Jugador 3 : " . $_SESSION["puntosJ3"];
            }




            ?>

        </div>
    </div>

</body>