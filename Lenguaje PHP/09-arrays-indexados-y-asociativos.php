<?php

//Arrays Indexados
//----------------------------------------
$coches = ['Toyota', 'Honda', 'Mercedes', 'Audi'];



//Funciones
//----------------------------------------
function showCars() {
    global $coches;
    foreach ($coches as $car) {
        echo $car . "<br>";
    }
}



//Arrays Asociativos
//----------------------------------------
$ages = ["Peter" => 35, "Jhon" => 22, "Alice" => 19];

// Tambien es posible hacer lo así
// $ages["Peter"] = 35;
// $ages["Jhon"] = 22;
// $ages["Alice"] = 19;




//Funciones
//----------------------------------------
function showAges() {
    global $ages;
    foreach ($ages as $key => $value) {
        echo $key . ' ' . $value . '<br>';
    }
}



//Main
//------------------------
function main():void {

    echo "<h1> Array Indexado </h1>";
    showCars();


    echo "<h1> Array Asociativo </h1>";
    showAges();
}


//Web code
//----------------------------------------
main();


?>