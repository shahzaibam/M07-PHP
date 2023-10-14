<?php

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

    echo "<p>Template creado</p>";

}

//---------------------------------------------------------------------------



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

    echo "<p>Template creado</p>";

}


//this functions creates an ARRAY that contains a TEMPLATE of HTML (a) tag with the player name link
function make_letters_index($names_array) {

    $index_template = <<<TEMPLATE
    <a href="./{{name}}.html">{{name}}</a>
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
    
    $file_name = $directory . "index.html"; 

    if($file_name) {
        foreach ($letters_array as $key => $letter) {
            file_put_contents($file_name, $letter . PHP_EOL, FILE_APPEND); //file append para que guarde todos los jugadores, si no pones file append solo mostrará el último jugador (zubimendi)
        }
    }


    echo "<p>Template creado</p>";
}



?>