<?php


$message = 'Hello';
$message2 = 'Adios';

function say()
{
    global $message;
    echo $message; // Hello
}

say();

echo "<br>";
print_r($GLOBALS);