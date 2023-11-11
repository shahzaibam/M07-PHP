<?php
session_start();

if (isset($_SESSION["entrado"]) && $_SESSION["entrado"] == true) {
    include("../layout.php");
    include("../functions.php");

    myHeader();
    myMenuLoggedIn();

?>

<body>

    <h1 class="text-center mt-5">Votar Frases Motivadoras</h1>
    <div class="text-center mt-5" style="display: flex; flex-direction: column; align-items: center; ">

        <?php
        $fmotivadoras = readFrasesMotivadoras();

        if (!empty($fmotivadoras)) {
            foreach ($fmotivadoras as $numeroFrase => $frase) {
                echo "<p class='text-center'>$frase</p>";

                echo "<form method='post' style='display: inline;'>";
                echo "<input type='hidden' name='numeroFrase' value='$numeroFrase'>";
                echo "<input type='submit' name='votar' value='Votar'>";
                echo "</form>";
            }
        } else {
            echo "<p>No hay frases motivadoras disponibles.</p>";
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["votar"])) {
            $numeroFraseVotada = $_POST["numeroFrase"];

            $votoActualizado = actualizarVotos($numeroFraseVotada);
            $_SESSION["mensajeVoto"] = "Votado a -->  $fmotivadoras[$numeroFraseVotada] ($votoActualizado votos)";

            header("Location: ./votarFraseMotivadora.php");
        }

        if (isset($_SESSION["mensajeVoto"])) {
            echo "<p>" . $_SESSION["mensajeVoto"] . "</p>";
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
