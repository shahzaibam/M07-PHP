<?php

include ('./layout.php');

myHeader();

myMenu();


// $names_array = ... nombre de jugadroes;

$letter_template = <<<TEMPLATE
    Dear {{name}}
    Congratulations! You have been selected to the part of the spanisg national footbal terma!
    I wish you the best
    TEMPLATE;


    // $letters_aarray = make_letters($letter_template, $names_array);

    // foreach ($letters_aarray as $key => $letter) {
    //     file_put_contents(......);
    // }



?>