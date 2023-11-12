<?php

session_start();
include("../layout.php");
myHeader();



if (isset($_SESSION["entrado"]) && $_SESSION["entrado"] == true) {

    include("../functions.php");

    myMenuLoggedIn();

?>

    <body>
        <h1 class="text-center mt-4">Frases Motivadoras</h1>
        <div class="text-center mt-5">

            <?php
            $error = writeFrasesMotivadoras();

            if (empty($error)) {

                $fmotivadoras = readFrasesMotivadoras();
                if ($fmotivadoras == '') {

                    // echo "<p> $fmotivadoras </p>";
                    foreach ($fmotivadoras as $numeroFrase => $frase) {
                        echo "<p>$frase</p>";
                    }
                } else {
                    // echo "<p> $fmotivadoras </p>";
                    foreach ($fmotivadoras as $numeroFrase => $frase) {
                        echo "<p>$frase</p>";
                        // echo "<form method='post'>";
                        // echo "<input type='hidden' name='numeroFrase' value='$numeroFrase'>";
                        // echo "<input type='submit' name='votar' value='Votar'>";
                        // echo "</form>";
                    }
                }
            } else {
                echo "<p> $error </p>";
            }
            ?>

            <form method="post">
                <label for="frase">Agregar una Frase:</label>
                <input type="text" id="frase" name="frase" required>
                <input type="submit" value="Submit">
            </form>
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