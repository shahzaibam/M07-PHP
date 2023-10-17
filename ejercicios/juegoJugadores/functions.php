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
        echo "<span>nombre: $key</span> <br>" ;

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
function make_letters($names_array) {

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
function writeInFileTxt($names_array) {
    $letters_array = make_letters($names_array);
    $directory = "./letters/";
    
    foreach ($letters_array as $key => $letter) {
        $file_name = $directory . $names_array[$key] . ".txt"; 
        file_put_contents($file_name, $letter);
    }

    echo "<p>Template creado de jugadores (.TXT)</p>";

}

//---------------------------------------------------------------------------


//EJERCICIO 2 ------------------------------

//this function shows the array template of all players.
function showTemplateJugadores($letter) {
    foreach ($letter as $key => $value) {
        echo "<p>$value </p>";
    }
}



//----------------------------------------------------------------------------


//EJERCICIO 3 -------------------------------

//this function gets the location of the file, reads its content and replaces the name with the value of the array and returns the array with the names of all players replaced
function make_letters_file($templateLocation, $names_array) {
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
function writeInFileHtml($templateLocation, $names_array) {
    $letters_array = make_letters_file($templateLocation, $names_array);
    $directory = "./disco/ficheros/";
    
    foreach ($letters_array as $key => $letter) {
        $file_name = $directory . $names_array[$key] . ".html"; 
        file_put_contents($file_name, $letter);
    }

    echo "<p>Template creado de jugadores (HTML)</p>";

}


//this functions creates an ARRAY that contains a TEMPLATE of HTML (a) tag with the player name link
function make_letters_index($names_array) {

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
function writeInFileTxtIndex($names_array) {
    $letters_array = make_letters_index($names_array);
    $directory = "./disco/ficheros/";


    $fileDeleted = unlink($directory . "index.html"); //here we delete the file which was created with all the player name, after deleting we will create it again so it will not be duplicated players

    $file_name = $directory . "index.html"; 

    if($file_name) {
        foreach ($letters_array as $key => $letter) {
            file_put_contents($file_name, $letter . PHP_EOL, FILE_APPEND); //file append para que guarde todos los jugadores, si no pones file append solo mostrará el último jugador (zubimendi)
        }

    }


    echo "<p>Template creado (Index.html)</p>";
}



?>