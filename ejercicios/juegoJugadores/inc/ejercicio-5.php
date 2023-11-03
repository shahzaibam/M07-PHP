<?php

//Partiendo del ejercicio 3 genera las cartas y guardalas en disco en ficheros html: ferranTorres.html, gavi.html.
//Crea también un fichero 'index.html' con una lista de los enlaces a los ficheros de las cartas generadas.


include('../layout.php');
include('../data/data.php');
include('../functions.php');

myHeader();
myMenu();

$archivo = "../entrenadores.csv";

echo "<h2>Listado de Entrenadores:</h2>";

function mostrarEntreandores($archivo)
{
    // Abrir el archivo en modo lectura
    if (($gestor = fopen($archivo, "r")) !== FALSE) {
        // Leer el archivo línea por línea
        while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
            // Mostrar los datos de cada entrenador
            echo " $datos[0]<br>";
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
        <?php

            mostrarEntreandores($archivo);

        ?>
    </div>

</body>