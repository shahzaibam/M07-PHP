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
        <title>Examen</title>
        <!--=============== CSS ===============-->

        <link rel="stylesheet" href="./vendor/bootstrap-5.3.2-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="./vendor/bootstrap-5.3.2-dist/js/bootstrap.min.js">
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
                    <a class="nav-link" href="http://127.0.0.1/m07-php/examen%20UF1.2023.24.%20LLiga%20ACB/examen%20UF1.2023.24.%20LLiga%20ACB/index.php"> CLUBES </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="http://127.0.0.1/m07-php/examen%20UF1.2023.24.%20LLiga%20ACB/examen%20UF1.2023.24.%20LLiga%20ACB/index.php"> LIGA ENDESA </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="http://127.0.0.1/m07-php/examen%20UF1.2023.24.%20LLiga%20ACB/examen%20UF1.2023.24.%20LLiga%20ACB/index.php"> ACB </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="http://127.0.0.1/m07-php/examen%20UF1.2023.24.%20LLiga%20ACB/examen%20UF1.2023.24.%20LLiga%20ACB/index.php"> COPA DEL REY </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="http://127.0.0.1/m07-php/examen%20UF1.2023.24.%20LLiga%20ACB/examen%20UF1.2023.24.%20LLiga%20ACB/index.php"> SUPERCOPA ENDESA </a>
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
