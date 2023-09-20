<?php
//PHP is an implicitly typed language.
//But you can Explicit types in function declarations.



//Print Line. Appends an EOL at the end
// -------------------------------------------

function println($something){

    echo ($something) . ("<br>");

}


 
//Add 2 integers
//------------------------------------------------------------
function sum_ints(int $num1, int $num2): int {
    $result = $num1 + $num2;

    return $result;
}


//TO DO : Add 2 floats
//------------------------------------------------------------
function sum_floats(float $num1, float $num2): float {
    $result = $num1 + $num2;

    return $result;
}


//TO DO : Add_newline : string + return
//------------------------------------------------------------
function add_newline(string $text): string {
    $result = $text . "<br>";

    return $result;
}


//Main Function
//------------------------------------------------------------
function main(): void {
    
    //Local vars
    $num = sum_ints(3.2,4);
    $price = sum_floats(2.5, 2);
    $getText = add_newline("Hola!");


    //Print
    println("Variables :");
    println("var dump:");

    var_dump($num);
    var_dump($price);
    var_dump($getText);


}



//Web code
//------------------------------------------------------------
main();


?>