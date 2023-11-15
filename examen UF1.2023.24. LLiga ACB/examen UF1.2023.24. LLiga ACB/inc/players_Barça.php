<?php
session_start();


include('../layout.php');
include('../functions.php');

myHeader();
myMenu();

$filename = "../lligaACB - lligaACB.csv";

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
            <a href="./entradasBcn.php">Comprar Entradas</a>
        </div>

        <div>
            <div class="p-4">
            <?php

                $jugadores = listarJugadores($filename);



                echo '<table class="mt-5" border="1">';

                
                echo "<th class='p-3'>";
                    echo "Nom";
                echo "</th>";

                echo "<th class='p-3'>";
                    echo "Samarreta";
                echo "</th>";


                echo "<th class='p-3'>";
                    echo "Club";
                echo "</th>";

                echo "<th class='p-3'>";
                    echo "Posicio";
                echo "</th>";

                echo "<th class='p-3'>";
                    echo "Nacionalitat";
                echo "</th>";

                echo "<th class='p-3'>";
                    echo "Llicencia";
                echo "</th>";

                
                echo "<th class='p-3'>";
                    echo "Altura";
                echo "</th>";

                                
                echo "<th class='p-3'>";
                    echo "Edat";
                echo "</th>";


                echo "<th class='p-3'>";
                    echo "Temp";
                echo "</th>";

                echo "<th class='p-3'>";
                    echo "Foto";
                echo "</th>";


                foreach ($jugadores as $row) {
                    
                    if($row[2] == "BARÇA") { //compruebo que solo muestre los jugadores del barca


                        
                        $nom = isset($row[0]) ? '' . $row[0] : ''; 
                        $samarreta = isset($row[1]) ? '' . $row[1] : ''; 
                        $club = isset($row[2]) ? '' . $row[2] : '';
                        $posicion = isset($row[3]) ? '' . $row[3] : '';
                        $nacionalidad = isset($row[4]) ? '' . $row[4] : '';
                        $licencia = isset($row[5]) ? '' . $row[5] : '';
                        $altura = isset($row[6]) ? '' . $row[6] : '';
                        $edad = isset($row[7]) ? '' . $row[7] : '';
                        $temp = isset($row[8]) ? '' . $row[8] : '';
                        $foto = isset($row[9]) ? '' . $row[9] : '';
                        $image = "<a href='./singleView.php'><img id='image' src='../images/jugadores/$foto' height='100px'></a>";

                        
                    }else {
                        $nom = "";
                        $samarreta = "";
                        $club = "";
                        $posicion = "";
                        $nacionalidad = "";
                        $licencia = "";
                        $altura = "";
                        $edad = "";
                        $temp = "";
                        $foto = "";
                        $image = "";

                    }



                   
                    if(isset($_COOKIE[$cookie_name])) {
                        echo '<tr style="background: blue; font-size: 20px;">';
                    }


                        echo '<td>' . $nom . '</td>';
                        echo '<td>' . $samarreta . '</td>';
                        echo '<td>' . $club . '</td>';
                        echo '<td>' . $posicion . '</td>';
                        echo '<td>' . $nacionalidad . '</td>';
                        echo '<td>' . $licencia . '</td>';
                        echo '<td>' . $altura . '</td>';
                        echo '<td>' . $edad . '</td>';
                        echo '<td>' . $temp . '</td>';
                        echo '<td>' . $image . '</td>';



                    echo '</tr>';
                }

                echo '</table>';
?>
                </div>


        </div>
    </div>

    <script src="./singleView.js"></script>

    <script>

    </script>

</body>