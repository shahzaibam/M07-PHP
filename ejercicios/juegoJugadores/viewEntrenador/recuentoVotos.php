<?php
session_start();
include("../layout.php");
myHeader();

if (isset($_SESSION["entrado"]) && $_SESSION["entrado"] == true) {
    include("../functions.php");

    myMenuLoggedIn();

    $archivoAleer = './recuentoVotos.csv';




?>

    <body>

        <h1 class="text-center mt-5">Recuento de Votos</h1>

        <div class="mt-5">
            <?php
            $recuento = leerArchivo($archivoAleer);

            $fmotivadoras = readFrasesMotivadoras();

            if (empty($recuento)) {
                echo "<p>No hay votos registrados</p>";
            } else {
                echo "<table class='table'>";
                echo "<thead>";
                echo "<tr><th>Frase</th><th>Votos</th></tr>";
                echo "</thead>";
                echo "<tbody>";
                foreach ($recuento as $fila) {
                    echo "<tr>";
                    echo "<td>" . $fmotivadoras[$fila[0]] . "</td>";
                    echo "<td>" . $fila[1] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            }
            ?>
        </div>
        <?php
            myFooter();
        ?>
    </body>

<?php
} else {
?>

    <section class="page_404">

        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="col-sm-10 col-sm-offset-1  text-center">
                        <div class="four_zero_four_bg">
                            <h1 class="text-center ">404</h1>
                        </div>

                        <div class="contant_box_404">
                            <h3 class="h2">
                                Look like you're lost
                            </h3>

                            <p>the page you are looking for is not avaible!</p>

                            <a href="http://127.0.0.1/m07-php/ejercicios/juegoJugadores/index.php" class="link_404">Go to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
}
?>