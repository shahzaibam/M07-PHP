<?php
// Iniciamos la sesión

require_once './04-functions.php';

myHeader();
myMenu();

?>

<body>
    <div>
        <h1 class="text-center mt-4 mb-4">Juego 1</h1>
        <div class="d-flex justify-content-around" style="margin-top: 80px;" >
            <?php


            // Function Main
            //--------------------------------------------------------
            function main(): void {

                $puntos = 0;
                $tiradas = 0;

                //se hace una tirada 3 veces, se llama a la funcion tirarDado tres veces.
                while($tiradas < 3) {
                    // Local vars
                    $getJugador1 = tirarDado();
                    mostrarDado($getJugador1);

                    $puntos = $puntos + $getJugador1;

                    $tiradas++;

                    echo "Tirada $tiradas: $getJugador1 puntos <br>";

                    
                }
                echo "Total Puntos: $puntos";

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
