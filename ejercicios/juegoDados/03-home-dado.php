<?php
    require_once './04-functions.php';
    

    myHeader();

    myMenu();

?>



<body>
    <?php
        //Function Main
        //--------------------------------------------------------
        function main():void {
 
            //Local vars
            $getJugador1 = tirarDado();
            $getJugador2 = tirarDado();

            //Print
            echo '<h1> Tira el dado </h1>';
            echo '<div style="display: flex">';
            echo '<h1> Jugador 1 </h1>';
            mostrarDado($getJugador1); 

            echo '<h1> Jugador 2 </h1>';
            mostrarDado($getJugador2);    

            $mensaje = calcularGanador($getJugador1, $getJugador2);

            echo("<h3> $mensaje </h3>");

            echo '</div>';

        }

        //Web code
        //--------------------------------------------------------
        main();



    ?>

</body>


<?php

myFooter();
?>