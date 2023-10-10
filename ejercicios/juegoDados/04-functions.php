<?php

declare(strict_types=1);

//HEADER
//-------------------------------------------------------
function myHeader()
{
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
function myMenu()
{
    $menu = <<<MENU

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php"> Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="02-juego-1.php"> Juego 1 </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="02-juego-1.2.php"> Juego 1.2 </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="03-juego-2.php"> Juego 2 </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="04-juego-3.php"> Juego 3 </a>
                </li>
            </ul>
        </div>
    </nav>

MENU;

    echo $menu;
}


//FOOTER
//-------------------------------------------------------
function myFooter()
{
    $footerHTML = <<<MYFOOTER
        <footer  class="footer navbar-fixed-bottom" style="margin-top: 80px; ">
            <hr>
            <p class="text-center">
            &copy;Shah Zaib
            </p>
        </footer>



    MYFOOTER;

    $fechaActual = date("d-m-Y");
    $horaActual = date("h:i:s");

    echo $footerHTML;
    // echo "La fecha es: $fechaActual y la hora es $horaActual " ;



}


//Obtener numero aleatorio (1-6)
//-------------------------------------------------------
function tirarDado(): int
{
    $randomImg = rand(1, 6);

    return $randomImg;
}


//Mostrar la imagen del dado segun el numero aleatorio
//-------------------------------------------------------
function mostrarDado(int $random): void
{
    $ruta = "./img/";
    echo ("<div style='border: 1px solid black;'><img src='" . $ruta . $random . ".png' width='500' height='600'></div>");
    // echo($random);
}

 
//Calcula el ganador de los 2 dados
//-------------------------------------------------------
function calcularGanador(int $getJugador1, int $getJugador2): string
{

    if ($getJugador1 > $getJugador2) {
        $message = "El Ganador es Jugador 1";
    } else if ($getJugador1 < $getJugador2) {
        $message = 'El Ganador es el Jugador 2';
    } else {
        $message = 'Han quedado empate';
    }

    return $message;
}


//cuando se llegue al maximo de tiradas, se ejecutará esta funcion para poner contador y puntos a 0
function inicioJugada() {
    $_SESSION["contador"] = 0;
    $_SESSION["puntos"] = 0;
}



//tirarDadoRecarga es una funcion que cuenta las veces que se ha hecho la tirada, cada vez que se recargue la pagina hará un contador++; si el contador llega a 3, el valor de contador será 1.
function tirarDadoRecarga():int {
    if (!isset($_SESSION["contador"])) {
        $_SESSION["contador"] = 0;
    } else if ($_SESSION["contador"] == MAX_TIRADAS) {
        inicioJugada();
    } else {
        $_SESSION["contador"] = $_SESSION["contador"] + 1;
    }


    return $_SESSION["contador"];
}






///////////////////   JUEGO - 2 /////////////////////////////////////

//cuando se llegue al maximo de tiradas, se ejecutará esta funcion para poner contador y puntos del jugador 1 y jugador 2 a 0
function inicioJugadaJ2() {
    $_SESSION["contador"] = 0;
    $_SESSION["puntosJ1"] = 0;
    $_SESSION["puntosJ2"] = 0;
}

function tirarDadoRecargaJ2():int {
    if (!isset($_SESSION["contador"])) {
        $_SESSION["contador"] = 0;
    } else if ($_SESSION["contador"] == MAX_TIRADAS_J2) {
        inicioJugadaJ2();
    } else {
        $_SESSION["contador"] = $_SESSION["contador"] + 1;
    }


    return $_SESSION["contador"];
}


//calcular ganador y sumar un punto al que gana, si los dos quedan empate los dos se llevan un punto cada uno ---- JUEGO NUMERO 2
function calcularPuntos($numDadoRandomJ1, $numDadoRandomJ2) {
    if($numDadoRandomJ1>$numDadoRandomJ2) {
        if(!isset( $_SESSION["puntosJ1"])) {
            $_SESSION["puntosJ1"] = 0;
        }
        $_SESSION["puntosJ1"] = $_SESSION["puntosJ1"] + 1;
    }else if($numDadoRandomJ2>$numDadoRandomJ1) {
        if(!isset( $_SESSION["puntosJ2"])) {
            $_SESSION["puntosJ2"] = 0;
        }
        $_SESSION["puntosJ2"] = $_SESSION["puntosJ2"] + 1;
    }else {
        if(!isset( $_SESSION["puntosJ1"])) {
            $_SESSION["puntosJ1"] = 0;
        }

        if(!isset( $_SESSION["puntosJ2"])) {
            $_SESSION["puntosJ2"] = 0;
        }
        $_SESSION["puntosJ1"] = $_SESSION["puntosJ1"] + 1;
        $_SESSION["puntosJ2"] = $_SESSION["puntosJ2"] + 1;

    }
}

//decidir ganador, si el numero de tiradas es igual al maximo permitido, se comparan los puntos de los dos jugadores el que tenga más puntos gana, si quedan empate se imprime otro mensaje
function decidirGanador($numTiradas) {
    if($numTiradas == MAX_TIRADAS_J2) {

        if($_SESSION["puntosJ1"] > $_SESSION["puntosJ2"]) {
            return "Ganador es el Jugador 1";
        }else if($_SESSION["puntosJ2"] > $_SESSION["puntosJ1"]) {
            return "Ganador es el Jugador 2";
        }else {
            return "Han quedado empate";
        }
    }
}






///////////////////   JUEGO - 3 /////////////////////////////////////

//cuando se llegue al maximo de tiradas, se ejecutará esta funcion para poner contador y puntos del jugador 1 y jugador 2 a 0
function inicioJugadaJ3() {
    $_SESSION["contador"] = 0;
    $_SESSION["puntosJ1"] = 0;
    $_SESSION["puntosJ2"] = 0;
    $_SESSION["puntosJ3"] = 0;
}

function tirarDadoRecargaJ3():int {
    if (!isset($_SESSION["contador"])) {
        $_SESSION["contador"] = 0;
    } else if ($_SESSION["contador"] == MAX_TIRADAS_J3) {
        inicioJugadaJ3();
    } else {
        $_SESSION["contador"] = $_SESSION["contador"] + 1;
    }


    return $_SESSION["contador"];
}


//calcular ganador y sumar un punto al que gana, si los dos quedan empate los dos se llevan un punto cada uno ---- JUEGO NUMERO 2
function calcularPuntosJ3($numDadoRandomJ1, $numDadoRandomJ2, $numDadoRandomJ3) {
    if($numDadoRandomJ1>$numDadoRandomJ2) {
        if(!isset( $_SESSION["puntosJ1"])) {
            $_SESSION["puntosJ1"] = 0;
        }
        $_SESSION["puntosJ1"] = $_SESSION["puntosJ1"] + 1;
    }else if($numDadoRandomJ1>$numDadoRandomJ3) {
        if(!isset( $_SESSION["puntosJ1"])) {
            $_SESSION["puntosJ1"] = 0;
        }
        $_SESSION["puntosJ1"] = $_SESSION["puntosJ1"] + 1;
    } else if($numDadoRandomJ2>$numDadoRandomJ1) {
        if(!isset( $_SESSION["puntosJ2"])) {
            $_SESSION["puntosJ2"] = 0;
        }
        $_SESSION["puntosJ2"] = $_SESSION["puntosJ2"] + 1;
    }else if($numDadoRandomJ2>$numDadoRandomJ3) {
        if(!isset( $_SESSION["puntosJ2"])) {
            $_SESSION["puntosJ2"] = 0;
        }
        $_SESSION["puntosJ2"] = $_SESSION["puntosJ2"] + 1;
    }else if($numDadoRandomJ3>$numDadoRandomJ1) {
        if(!isset( $_SESSION["puntosJ3"])) {
            $_SESSION["puntosJ3"] = 0;
        }
        $_SESSION["puntosJ3"] = $_SESSION["puntosJ3"] + 1;
    }else if($numDadoRandomJ3>$numDadoRandomJ2) {
        if(!isset( $_SESSION["puntosJ3"])) {
            $_SESSION["puntosJ3"] = 0;
        }
        $_SESSION["puntosJ3"] = $_SESSION["puntosJ3"] + 1;
    }else {
        if(!isset( $_SESSION["puntosJ1"])) {
            $_SESSION["puntosJ1"] = 0;
        }

        if(!isset( $_SESSION["puntosJ2"])) {
            $_SESSION["puntosJ2"] = 0;
        }

        if(!isset( $_SESSION["puntosJ3"])) {
            $_SESSION["puntosJ3"] = 0;
        }

        $_SESSION["puntosJ1"] = $_SESSION["puntosJ1"] + 1;
        $_SESSION["puntosJ2"] = $_SESSION["puntosJ2"] + 1;
        $_SESSION["puntosJ3"] = $_SESSION["puntosJ3"] + 1;

    }
}

//decidir ganador, si el numero de tiradas es igual al maximo permitido, se comparan los puntos de los dos jugadores el que tenga más puntos gana, si quedan empate se imprime otro mensaje
function decidirGanadorJ3($numTiradas) {
    if($numTiradas == MAX_TIRADAS_J2) {

        if($_SESSION["puntosJ1"] > $_SESSION["puntosJ2"]) {
            return "Ganador es el Jugador 1";
        }else if($_SESSION["puntosJ2"] > $_SESSION["puntosJ1"]) {
            return "Ganador es el Jugador 2";
        }else {
            return "Han quedado empate";
        }
    }
}