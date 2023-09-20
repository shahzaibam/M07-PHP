<?php
//PHP Functions
//-------------


//define functions with the 'function' keyword.

//Print Line. Appends an EOL at the end
// -------------------------------------------

function println($something)
{

    echo ($something);

    echo ("<br>");

}

//Global Variables
// -------------------------------------------

$is_ok = true;  //bool
$num = 23;      //int
$price = 56.25; //float
$text = "DAW";  //string


//Main
// -------------------------------------------

println("Good Morning DAW2. Print variables:");

println("-----------------------------------------------");

println($is_ok);

println($num);

println($price);

println($text);


?>