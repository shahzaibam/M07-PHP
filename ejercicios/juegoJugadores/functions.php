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
function writeInFile($names_array) {
    $letters_array = make_letters($names_array);
    $directory = "./letters/";
    
    foreach ($letters_array as $key => $letter) {
        $file_name = $directory . $names_array[$key] . ".txt"; 
        file_put_contents($file_name, $letter);
    }

    echo "<p>Template creado</p>";

}



?>