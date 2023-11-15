<?php


/**
 * esta funcion comprueba si existe el fichero de clubs.txt, si existe guarda el contenido del fichero en la variable de $contents como string, luego comprueba si hay algo en $contents, si $contents lleva algo va guardar todo el string en $clubs haciendo lineBreaks con el metodo nl2br. Finalmente si no hay nada en $contents retorna la variable de error. --> Shah Zaib Asghar Munir
 */
function readClubs()
{
    $filename = './clubs.txt';
    $clubs = [];

    if (file_exists($filename)) {
        $contents = file($filename, FILE_IGNORE_NEW_LINES); // Leemos el archivo y almacenamos cada línea en un elemento del arreglo
        if (!empty($contents)) {
            foreach ($contents as $numeroFrase => $frase) {
                $clubs[$numeroFrase] = $frase;
            }
        } else {
            $clubs[] = "No hay Frases";
        }
    }

    return $clubs;
}



/**
 * esta funcion comprueba abre el fichero que le pasamos por parametro, lo intenta abrir y si le da falso muere la funcion, y si no le da falso sigue con la funcion y va guardando cada $row en el array $data, finalmente hace un return del array de data --> Shah Zaib Asghar Munir
 */
function listarJugadores($filename) {
  
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

    return $data;
}



/**
 * en esta funcion estoy generando los partidos dinamicamente --> shahzaib asghar munir
 */
function generarSelectPartidos(){
    $partidos = array("bcn vs monaco", "bcn vs c zaragoza", "bcn vs mozar", "bcn vs rio");

    echo '<select name="equipos" id="city">';
        foreach ($partidos as $partido) {
            echo "<option value='$partido'>$partido</option>";
        }
    echo '</select>';
}


/**
 * en esta funcion estoy generando las zonas de los partidos dinamicamente --> shahzaib asghar munir
 */
function generarZona(){
    $zonas = array("zona1 -> 100€", "zona2 --> 110€", "zona3 --> 120€", "zona4 --> 130€");

        foreach ($zonas as $zona) {
            echo "<label for='$zona'>$zona</label>";
            echo "<input type='radio' name='zona' id='$zona' value='$zona'>";
        }

}

?>