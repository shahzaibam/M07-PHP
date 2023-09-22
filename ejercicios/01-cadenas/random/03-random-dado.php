<?php
declare(strict_types = 1);

//Obtener numero aleatorio (1-6)
//-------------------------------------------------------
function tirarDado():int {
    $randomImg = rand(1,6); 

    return $randomImg;
}


//Mostrar la imagen del dado segun el numero aleatorio
//-------------------------------------------------------
function mostrarDado(int $random):void {
    echo("<img src='../random/img/" . $random . ".png' width='500' height='600'>"); 
    // echo($random);
}


function calcularGanador(int $getJugador1, int $getJugador2):string {

    $jugadores = ["Peter" => $getJugador1, "Jhon" => $getJugador2];

        if($getJugador1>$getJugador2) {
            $message = "El Ganador es Jugador 1";
        }else if($getJugador1<$getJugador2){
            $message = 'El Ganador es el Jugador 2';
        }else {
            $message = 'Han quedado empate';
        }

    return $message;
}




//Function Main
//--------------------------------------------------------
function main():void {

    //Local vars
    $getJugador1 = tirarDado();
    $getJugador2 = tirarDado();

    //Print
    echo '<h1> Tira el dado </h1>';
    echo '<div style="display: flex">';
    echo '<h1> Jugador 1 </h1>';
    mostrarDado($getJugador1); 

    echo '<h1> Jugador 2 </h1>';
    mostrarDado($getJugador2);    

    $mensaje = calcularGanador($getJugador1, $getJugador2);

    echo("<h3> $mensaje </h3>");

    echo '</div>';

}

//Web code
//--------------------------------------------------------
main();

?>

