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
        <title>Selección Española</title>
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
                    <a class="nav-link" href="http://127.0.0.1/m07-php/ejercicios/juegoJugadores/index.php"> Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://127.0.0.1/m07-php/ejercicios/juegoJugadores/inc/ejercicio-1.php"> Ejercicio 1 </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="http://127.0.0.1/m07-php/ejercicios/juegoJugadores/inc/ejercicio-2.php"> Ejercicio 2 </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://127.0.0.1/m07-php/ejercicios/juegoJugadores/inc/ejercicio-3.php"> Ejercicio 3 </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://127.0.0.1/m07-php/ejercicios/juegoJugadores/inc/ejercicio-4.php"> Ejercicio 4 </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://127.0.0.1/m07-php/ejercicios/juegoJugadores/inc/ejercicio-5.php"> Ejercicio 5 </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://127.0.0.1/m07-php/ejercicios/juegoJugadores/inc/login.php"> Login </a>
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
