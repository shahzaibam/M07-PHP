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
        <title>Examen en POO</title>
        <link rel="stylesheet" href="styles/styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
                    <a class="nav-link" href="http://localhost/M07-PHP/UF2/Examen%20UF1%20hecho%20en%20POO/examen%20UF1.2023.24.%20LLiga%20ACB/inc/"> CLUBES </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/M07-PHP/UF2/Examen%20UF1%20hecho%20en%20POO/examen%20UF1.2023.24.%20LLiga%20ACB/inc/"> LIGA ENDESA </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/M07-PHP/UF2/Examen%20UF1%20hecho%20en%20POO/examen%20UF1.2023.24.%20LLiga%20ACB/inc/"> ACB </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/M07-PHP/UF2/Examen%20UF1%20hecho%20en%20POO/examen%20UF1.2023.24.%20LLiga%20ACB/inc/"> COPA DEL REY </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/M07-PHP/UF2/Examen%20UF1%20hecho%20en%20POO/examen%20UF1.2023.24.%20LLiga%20ACB/inc/"> SUPERCOPA ENDESA </a>
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


    echo $footerHTML;

}

?>
