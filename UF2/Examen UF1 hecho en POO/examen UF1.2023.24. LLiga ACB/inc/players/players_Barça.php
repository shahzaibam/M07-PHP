<?php
session_start();

include_once("../Jugador.php");
include_once("../functions.php");

$nombreEquipo = "BARÇA";

$fichero = "../../ligaEquipos.csv";
$players = new Jugador($nombreEquipo, $fichero);
$all = $players->mostrarEquipo();

checkSessionContador();


$cookie_name = "estil";

?>


<body>

<div>
    <h1>Jugadores</h1>
    <h3>Contador de visitas <?php echo $_SESSION["contador"] ?></h3>



    <div>
        <a href="./comprarEntradas.php">Comprar Entradas</a>
    </div>

    <div>
        <div class="p-4">
            <table class="mt-5" border="1">

                <th class='p-3'>Nom</th>
                <th class='p-3'>Samarreta</th>
                <th class='p-3'>Club</th>
                <th class='p-3'>Posicio</th>
                <th class='p-3'>Nacionalitat</th>
                <th class='p-3'>Llicencia</th>
                <th class='p-3'>Altura</th>
                <th class='p-3'>Edat</th>
                <th class='p-3'>Temp</th>
                <th class='p-3'>Foto</th>


                <?php

                    mostrarJugadores($all, $cookie_name, $nombreEquipo);

                ?>


            </table>


        </div>


    </div>

</div>


</body>
