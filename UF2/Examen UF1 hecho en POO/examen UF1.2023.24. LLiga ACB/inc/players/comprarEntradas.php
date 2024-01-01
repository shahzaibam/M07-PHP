<?php

include_once ("../functions.php");
include_once ("../layout.php");
myHeader();
myMenu();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clubs</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>

    <div class="container">
        <h3>
            Formulario Booking
        </h3>
        <form action="resumenCompra.php" method="post">
            <?php

                $partidos = ["Barça VS AS Monaco", "Barça VS Casademont Zaragoza", "Barça VS Río Breogán"];
                $zonas = ['ZONA 1 INFERIOR - 114€', 'ZONA 1 SUPERIOR - 95€', 'ZONA 2 INFERIOR - 80€', "ZONA 2 CENTRE - 65€"];

                echo "<div>";
                    generarSelector($partidos);
                echo "</div>";


                echo "<div style='margin-top: 30px;'>";
                    generarRadioBtn($zonas);
                echo "</div>";
            ?>

            <div style="margin-top: 30px">
                <label for="email">Email:</label>
                <input type="email" name="email" required><br>
            </div>


            <?php
                $entradas = [1,2,3,4,5];

                echo "<div style='margin-top: 30px;'>";
                    generarNumeroEntradas($entradas);
                echo "</div>";
            ?>


            <div style="margin-top: 30px">
                <label for="telefono">Telefono:</label>
                <input type="tel" name="telefono" required><br>
            </div>


            <div>
                <input type="submit">
            </div>

        </form>
    </div>

</body>
</html>