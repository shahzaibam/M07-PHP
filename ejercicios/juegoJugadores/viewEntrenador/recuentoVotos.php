<?php
session_start();

if (isset($_SESSION["entrado"]) && $_SESSION["entrado"] == true) {
    include("../layout.php");
    include("../functions.php");

    myHeader();
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
                    echo "<td>" . htmlspecialchars($fmotivadoras[$fila[0]]) . "</td>";
                    echo "<td>" . htmlspecialchars($fila[1]) . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            }
            ?>
        </div>

    </body>

<?php
} else {
    echo "No puedes acceder aquí, inicia sesión";
    echo "<br>";
    echo "<a href='../login/login.php'>Iniciar Sesión</a>";
}
?>