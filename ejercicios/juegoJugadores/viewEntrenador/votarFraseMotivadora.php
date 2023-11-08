<?php

session_start();

if(isset($_SESSION["entrado"])) {
    if($_SESSION["entrado"] == true) {
        
        include("../layout.php");
        include("../functions.php");
        
        myHeader();
        myMenuLoggedIn();

        ?>

        <body>

            <h1 class="text-center mt-5">Votar Frases Motivadoras</h1>
            <div class="text-center mt-5" style="display: flex; flex-direction: column; align-items: center; ">
                
                <?php
                if (empty($error)) {
                    $fmotivadoras = readFrasesMotivadoras();
                    if ($fmotivadoras == '') {
                        foreach ($fmotivadoras as $numeroFrase => $frase) {
                            echo "<p class='text-center'>$frase</p>";
                        }
                    } else {
                        echo "<table>";
                        foreach ($fmotivadoras as $numeroFrase => $frase) {
                            echo "<tr>";
                            echo "<td><p class='text-center'>$frase</p></td>";
                            echo "<td>";
                            echo "<form method='post' style='display: inline;'>";
                            echo "<input type='hidden' name='numeroFrase' value='$numeroFrase'>";
                            echo "<input type='submit' name='votar' value='Votar'>";
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                } else {
                    echo "<p> $error </p>";
                }
                ?>
            </div>

        </body>

<?php
    }
}else {
    echo "No puedes acceder aquí, inicia sesión";
    echo "<br>";
    echo "<a href='../login/login.php'>Iniciar Sesión</a>";
}
?>
