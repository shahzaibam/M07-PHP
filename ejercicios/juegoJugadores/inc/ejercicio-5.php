<?php

//Partiendo del ejercicio 3 genera las cartas y guardalas en disco en ficheros html: ferranTorres.html, gavi.html.
//Crea también un fichero 'index.html' con una lista de los enlaces a los ficheros de las cartas generadas.


include('../layout.php');
include('../data/data.php');
include('../functions.php');

myHeader();
myMenu();

$archivo = "../csvFiles/entrenadores.csv";

function mostrarEntreandores($archivo)
{
    // Abrir el archivo en modo lectura
    if (($gestor = fopen($archivo, "r")) !== FALSE) {
        // Leer el archivo línea por línea
        while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
            // Mostrar los datos de cada entrenador

            if (strpos($datos[0], 'img') == true) {

                echo " <img src=\"$datos[0]\" height='200px'/> <br>";
            } else {
                echo " $datos[0]<br>";
            }
        }
        // Cerrar el archivo
        fclose($gestor);
    } else {
        echo "No se pudo abrir el archivo.";
    }
}


?>

<body>

    <div>
        <h2 class="text-center mt-4">Listado de Entrenadores:</h2>
        <div>
            <div class="d-flex justify-content-around mt-5">
                <?php



                mostrarEntreandores($archivo);

                ?>
            </div>
        </div>

    </div>

</body>