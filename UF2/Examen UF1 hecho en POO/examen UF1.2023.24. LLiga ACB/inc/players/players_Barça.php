<?php
session_start();

include_once("../Jugador.php");

$fichero = "../../ligaEquipos.csv";


$players = new Jugador("BARÇA", $fichero);


$all = $players->mostrarEquipo();

//miro si el contador existe y le sumo 1
if(isset($_SESSION["contador"])) {
    $_SESSION["contador"] = $_SESSION["contador"] + 1;
}

$cookie_name = "estil";

?>


<body>

<div>
    <h1>Jugadores</h1>
    <h3>Contador de visitas <?php echo $_SESSION["contador"] ?></h3>

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


                <?php foreach ($all as $player) { ?>
                    <?php
                        if(isset($_COOKIE[$cookie_name])) {
                            echo '<tr style="background: blue; font-size: 20px;">';
                        }else {
                            echo '<tr>';
                        }
                    ?>
                        <td><?php echo $player["nom"]; ?></td>
                        <td><?php echo $player["samarreta"]; ?></td>
                        <td><?php echo $player["club"]; ?></td>
                        <td><?php echo $player["posicion"]; ?></td>
                        <td><?php echo $player["nacionalidad"]; ?></td>
                        <td><?php echo $player["licencia"]; ?></td>
                        <td><?php echo $player["altura"]; ?></td>
                        <td><?php echo $player["edad"]; ?></td>
                        <td><?php echo $player["temp"]; ?></td>
                        <td>
                            <a href="../singlePlayerView/singlePlayer.php?nombre=<?= urlencode($player["nom"]) ?>&imagen=<?= urlencode($player["foto"]) ?>&club=<?= urlencode($player["club"]) ?>">
                                <img src="../../images/jugadores/<?php echo $player["foto"]; ?>" height="100px">
                            </a>
                        </td>
                    </tr>
                <?php } ?>


            </table>


        </div>


    </div>
</div>


</body>
