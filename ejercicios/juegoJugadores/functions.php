<?php

//HOME

function mostrarJugadores($jugadores)
{
    echo '<div class="player-list">';

    foreach ($jugadores as $key => $value) {
        echo "<div class=\"player border pb-3 mt-4 \">";
        echo "<div class=\"image-container\">";
        echo "<img class=\"p-5\" src=\"./img/$key.png\"/>";
        echo "</div>";
        echo "<span>nombre: $key</span> <br>";

        foreach ($value as $prop => $valor) {
            echo "<span>$prop: </span>";
            echo "<span>$valor</span><br>";
        }

        echo "</div>";
    }

    echo '</div>';
}


//EJERCICIO 1-------------


//function that makes letters by a template using strtr() and saves all the templates with the players name in a associative array
function make_letters($names_array)
{

    $letter_template = <<<TEMPLATE
    Dear {{name}},
    Congratulations! You have been selected to be part of the Spanish national football team. 
    I wish you the best!
    TEMPLATE;


    $letters = [];

    foreach ($names_array as $key => $value) {
        $strParams = [
            '{{name}}' => $value,
        ];
        $letter =  strtr($letter_template, $strParams);
        $letters[] = $letter;
    }


    return $letters;
}


//this function writes the saved templates in the array to txt files.
function writeInFileTxt($names_array)
{
    $letters_array = make_letters($names_array);
    $directory = "../letters/";

    foreach ($letters_array as $key => $letter) {
        $file_name = $directory . $names_array[$key] . ".txt";
        file_put_contents($file_name, $letter);
    }

    echo "<p>Template creado de jugadores (.TXT)</p>";
}

//---------------------------------------------------------------------------


//EJERCICIO 2 ------------------------------

//this function shows the array template of all players.
function showTemplateJugadores($letter)
{
    foreach ($letter as $key => $value) {
        echo "<p>$value </p>";
    }
}



//----------------------------------------------------------------------------


//EJERCICIO 3 -------------------------------

//this function gets the location of the file, reads its content and replaces the name with the value of the array and returns the array with the names of all players replaced
function make_letters_file($templateLocation, $names_array)
{
    $letter_template_content = file_get_contents($templateLocation);
    $letters = [];

    foreach ($names_array as $key => $value) {
        $strParams = [
            '{{name}}' => $value,
        ];
        $letter =  strtr($letter_template_content, $strParams);
        $letters[] = $letter;
    }


    return $letters;
}


//----------------------------------------------------------------------------------------



//EJERCICIO 4 ----------------------------------

//this function writes the saved templates in the array to HTML files.
function writeInFileHtml($templateLocation, $names_array)
{
    $letters_array = make_letters_file($templateLocation, $names_array);
    $directory = "../disco/ficheros/";

    foreach ($letters_array as $key => $letter) {
        $file_name = $directory . $names_array[$key] . ".html";
        file_put_contents($file_name, $letter);
    }

    echo "<p>Template creado de jugadores (HTML)</p>";
}


//this functions creates an ARRAY that contains a TEMPLATE of HTML (a) tag with the player name link
function make_letters_index($names_array)
{

    $index_template = <<<TEMPLATE
    <a href="http://127.0.0.1/m07-php/ejercicios/juegoJugadores/disco/ficheros/{{name}}.html">{{name}}</a>
    TEMPLATE;


    $letters = [];

    foreach ($names_array as $key => $value) {
        $strParams = [
            '{{name}}' => $value,
        ];
        $letter =  strtr($index_template, $strParams);
        $letters[] = $letter;
    }


    return $letters;
}



//this function writes all the players files into a single file named index.html and if youu click on any players name it will show the message with the players name you clicked
function writeInFileTxtIndex($names_array)
{
    $letters_array = make_letters_index($names_array);
    $directory = "../disco/ficheros/";


    $fileDeleted = unlink($directory . "index.html"); //here we delete the file which was created with all the player name, after deleting we will create it again so it will not be duplicated players

    $file_name = $directory . "index.html";

    if ($file_name) {
        foreach ($letters_array as $key => $letter) {
            file_put_contents($file_name, $letter . PHP_EOL, FILE_APPEND); //file append para que guarde todos los jugadores, si no pones file append solo mostrará el último jugador (zubimendi)
        }
    }


    echo "<p>Template creado (Index.html)</p>";
}






function mostrarEntreandores($archivo)
{
    // Abrir el archivo en modo lectura
    if (($gestor = fopen($archivo, "r")) !== FALSE) {
        // Leer el archivo línea por línea
        while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {

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







//home del entrenador
function writeUsername($nombre):array {
    $info = [];
    if(isset($nombre)) {
        if($nombre == "luis_enrique") {
            $message =  "Bienvenido, Luis Enrique";
            $foto = $_SESSION["imgLuis"];
            array_push($info, $message);
            array_push($info, $foto);

            $cookie_name = "visitsLuis";
            if(isset($_COOKIE[$cookie_name])) {
                // Mostrar el número de visitas
                echo "Número de visitas: " . $_COOKIE[$cookie_name];
            }
            // echo "<img src='" . $foto . "' height='100px'/>";
        }else if($nombre == "xavi_hernand") {
            $message =  "Bienvenido, Xavi Hernández";
            $foto = $_SESSION["imgXavi"];
            array_push($info, $message);
            array_push($info, $foto);

            $cookie_name = "visitsXavi";
            if(isset($_COOKIE[$cookie_name])) {
                // Mostrar el número de visitas
                echo "Número de visitas: " . $_COOKIE[$cookie_name];
            }
            // echo "<img src='" . $foto . "' height='100px'/>";
        }else if($nombre == "vicente_bosque") {
            $message =  "Bienvenido, Vicente del Bosque";
            $foto = $_SESSION["imgVicente"];
            array_push($info, $message);
            array_push($info, $foto);

            $cookie_name = "visitsVicente";
            if(isset($_COOKIE[$cookie_name])) {
                // Mostrar el número de visitas
                echo "Número de visitas: " . $_COOKIE[$cookie_name];
            }
            // echo "<img src='" . $foto . "' height='100px'/>";
        }
    }

    return $info;
}






/**
 * esta funcion valida que los carácteres introducidos no sean numeros, solo letras, comprueba si son letras y si da true escribe la frase en el fichero frasesMotivadoras.txt, retorna el valor de $error porque se comprobará si hay algo en el error muestra el error, si no hay nada seguirá con la funcion de readFrasesMotivadoras(); 
 */
function writeFrasesMotivadoras(): string
{
    $error = "";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $frase = $_POST['frase'];

        if (!preg_match('/[0-9]/', $frase)) {
            file_put_contents('frasesMotivadoras.txt', $frase . PHP_EOL, FILE_APPEND);
            header("Location: frasesMotivadoras.php");
        } else {
            $error = "La frase no debe contener números.";
        }
    }

    return $error;
}



/**
 * esta funcion comprueba si existe el fichero de frasesMotivadoras.txt, si existe guarda el contenido del fichero en la variable de $contents como string, luego comprueba si hay algo en $contents, si $contents lleva algo va guardar todo el string en $fmotivadoras haciendo lineBreaks con el metodo nl2br. Finalmente si no hay nada en $contents retorna la variable de error.
 */
function readFrasesMotivadoras()
{
    $filename = './frasesMotivadoras.txt';
    $fmotivadoras = [];

    if (file_exists($filename)) {
        $contents = file($filename, FILE_IGNORE_NEW_LINES); // Leemos el archivo y almacenamos cada línea en un elemento del arreglo
        if (!empty($contents)) {
            foreach ($contents as $numeroFrase => $frase) {
                $fmotivadoras[$numeroFrase] = $frase;
            }
        } else {
            $fmotivadoras[] = "No hay Frases";
        }
    }

    return $fmotivadoras;
}



/**
 * esta funcion actualiza los votos, primero lee lo que hay, y según el numero de frase pasada le actualiza los votos, por ejemplo si es la frase 1 seria actualizar los votos de [0]. Cada numero de frase tiene un recuento al lado en el csv, al pulsar en el boton de la frase que numero de frase es, y se le actualiza el recuento haciendo un +1.
 */
function actualizarVotos($numeroFraseVotada)
{
    $archivoVotos = "./recuentoVotos.csv";
    $recuento = [];

    // open the file
    $f = fopen($archivoVotos, 'r');

    if ($f === false) {
        die('Cannot open the file ' . $archivoVotos);
    }

    while (($row = fgetcsv($f)) !== false) {
        $recuento[$row[0]] = $row[1];
    }

    fclose($f);

    if (isset($recuento[$numeroFraseVotada])) {
        $recuento[$numeroFraseVotada]++;
    } else {
        $recuento[$numeroFraseVotada] = 1;
    }

    escribirRecuento($recuento, $archivoVotos);

    return $recuento[$numeroFraseVotada];
}


function escribirRecuento($recuento, $archivoVotos)
{
    // Escribir el nuevo recuento al archivo

    // open csv file for writing
    $f = fopen($archivoVotos, 'w');

    if ($f === false) {
        die('Error opening the file ' . $archivoVotos);
    }

    // write each row at a time to a file
    foreach ($recuento as $numeroFrase => $numeroVotos) {
        fputcsv($f, [$numeroFrase, $numeroVotos]);
    }

    fclose($f);
}

function leerArchivo($archivoAleer): array
{
    $recuento = [];

    // open the file
    $f = fopen($archivoAleer, 'r');

    if ($f === false) {
        die('Cannot open the file ' . $archivoAleer);
    }

    // read each line in CSV file at a time
    while (($row = fgetcsv($f, 0, ',')) !== false) {
        $recuento[] = $row;
    }

    // close the file
    fclose($f);

    return $recuento;
}
