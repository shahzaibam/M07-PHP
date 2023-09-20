<?php


//Obtener numero aleatorio (1-6)
//-------------------------------------------------------
function tirarDado() {
    $randomImg = rand(1,6); 

    return $randomImg;
}

//Mostrar la imagen del dado segun el numero aleatorio
//-------------------------------------------------------
function mostrarDado(int $random) {
    echo("<img src='../random/img/" . $random . ".png' width='500' height='600'>"); 
    echo($random);
}

//Function Main
//--------------------------------------------------------
function main():void {

    //Local vars
    $getRandom = tirarDado();


    //Print
    mostrarDado($getRandom);


}

//Web code
//--------------------------------------------------------
main();

?>

