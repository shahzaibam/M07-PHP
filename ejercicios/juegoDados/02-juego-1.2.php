<?php

session_start();

require_once './04-functions.php';

myHeader();

myMenu();

const MAX_TIRADAS = 3;

// $_SESSION["tiradas"];


function inicioJugada() {
    $_SESSION["contador"] = 0;
    $_SESSION["puntos"] = 0;
}



//tirarDadoRecarga es una funcion que cuenta las veces que se ha hecho la tirada, cada vez que se recargue la pagina hará un contador++; si el contador llega a 3, el valor de contador será 1.
function tirarDadoRecarga():int {
    if (!isset($_SESSION["contador"])) {
        $_SESSION["contador"] = 0;
    } else if ($_SESSION["contador"] == MAX_TIRADAS) {
        inicioJugada();
    } else {
        $_SESSION["contador"] = $_SESSION["contador"] + 1;
    }


    return $_SESSION["contador"];
}




?>

<body>
    <div>
        <h1 class="text-center mt-4 mb-4">Juego 1.2</h1>
        <div class="d-flex justify-content-around" style="margin-top: 80px;">
            <?php




            function main()
            {
                $numTiradas = tirarDadoRecarga();

                echo "<p>Tirada numero  : " . $numTiradas . "</p>";
                if($numTiradas == 0) {
                    echo "<h1> PULSA F5 PARA INICIAR EL JUEGO <h1>";
                }else {



                    $numDadoRandom = tirarDado();

                    $_SESSION["puntos"] =  $_SESSION["puntos"] + $numDadoRandom;


                    mostrarDado($numDadoRandom);


                    echo ("<br> <br> <br> <h1> Puntos : " . $_SESSION["puntos"] . " <h1>");

                    if($numTiradas == MAX_TIRADAS) {
                        echo ("<h1> Juego Finalizado <h1>");
                    }


                }


            }





            // Web code
            //--------------------------------------------------------
            main();
            ?>
        </div>

    </div>
</body>

<?php
myFooter();
?>