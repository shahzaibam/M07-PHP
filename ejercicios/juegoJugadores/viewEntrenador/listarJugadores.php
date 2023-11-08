<?php


session_start();


if(isset($_SESSION["entrado"])){
    if($_SESSION["entrado"] == true) {
        include("../layout.php");
        include("../functions.php");

        myHeader();
        myMenuLoggedIn();



        
        $filename = '../csvFiles/jugadores.csv';
        $data = [];

        $f = fopen($filename, 'r');

        if ($f === false) {
            die('Cannot open the file ' . $filename);
        }

        while (($row = fgetcsv($f)) !== false) {
            $data[] = $row;
        }

        // close the file
        fclose($f);

        
        ?>

        <body>
            <div>
                <h2 class="text-center mt-4">Listado de Entrenadores:</h2>
                <div>
                    <div class="d-flex justify-content-around mt-5">
                        <?php


                            echo '<table border="1">';
                            // echo '<tr><th>Imagen</th><th>Nombre</th><th>País</th><th>Número de Camiseta</th><th>Fecha de Nacimiento</th><th>Rol</th><th>Goles</th><th>Partidos</th></tr>';

                            foreach ($data as $row) {
                                $img = isset($row[0]) ? '' . $row[0] : ''; // Añadir 'img/' al principio de la ruta
                                $nombre = isset($row[1]) ? $row[1] : '';
                                $pais = isset($row[2]) ? $row[2] : '';
                                $numCamiseta = isset($row[3]) ? $row[3] : '';
                                $fechaNacimiento = isset($row[4]) ? $row[4] : '';
                                $rol = isset($row[5]) ? $row[5] : '';
                                $goles = isset($row[6]) ? $row[6] : '';
                                $partidos = isset($row[7]) ? $row[7] : '';

                                echo '<tr>';
                                if($img == "img") {
                                    echo '<td>' . $img . '</td>';
                                }else {
                                    echo '<td><img src="' . $img . '" style="width: 100px; height: 100px;"></td>';
                                }
                                echo '<td>' . $nombre . '</td>';
                                echo '<td>' . $pais . '</td>';
                                echo '<td>' . $numCamiseta . '</td>';
                                echo '<td>' . $fechaNacimiento . '</td>';
                                echo '<td>' . $rol . '</td>';
                                echo '<td>' . $goles . '</td>';
                                echo '<td>' . $partidos . '</td>';
                                echo '</tr>';
                            }

                            echo '</table>';

                        ?>
                    </div>
                </div>

            </div>

            <?php
                myFooter();
            ?>
        </body>


<?php
    }
}else {
    echo "No puedes acceder aquí, inicia sesión";
    echo "<br>";
    echo "<a href='../login/login.php'>Iniciar Sesión</a>";
}
?>
