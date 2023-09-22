<?php

declare(strict_types = 1);

//HEADER
//-------------------------------------------------------
function myHeader() {
    $head = <<<CABECERA

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tirar dado</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    CABECERA;

    echo $head;
}

//MENU
//-------------------------------------------------------
function myMenu() {
    $menu = <<<MENU


    <div class="menu">
    <ul class="nav">
        <li class="nav-item">
        <a class="nav-link" href="03-home-dado.php"> Home </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="05-juego-1.php"> Juego 1 </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="06-juego-2.php"> Juego 2 </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="07-juego-3.php"> Juego 3 </a>
        </li>
    </ul>
    </div>


    MENU;

    echo $menu;
}


//FOOTER
//-------------------------------------------------------
function myFooter(){
    $footerHTML = <<<MYFOOTER
        <footer>
            <hr>
            <p>
            @Provençana
            </p>
        </footer>
    MYFOOTER;
    echo $footerHTML;
    date_default_timezone_set('Europe/Madrid');

    $fechaActual = date("d-m-Y");
    $horaActual = date("h:i:s");

    echo "La fecha es: $fechaActual y la hora es $horaActual " ;
}


//Obtener numero aleatorio (1-6)
//-------------------------------------------------------
function tirarDado():int {
    $randomImg = rand(1,6); 

    return $randomImg;
}


//Mostrar la imagen del dado segun el numero aleatorio
//-------------------------------------------------------
function mostrarDado(int $random):void {
    $ruta = "../random/img/";
    echo("<img src='" . $ruta . $random . ".png' width='500' height='600'>"); 
    // echo($random);
}


//Calcula el ganador de los 2 dados
//-------------------------------------------------------
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



?>