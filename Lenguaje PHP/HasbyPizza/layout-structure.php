<?php

function myHeader(){
    $head = <<<CABECERA
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HasbyPizza</title>
        <link rel="stylesheet" href="./styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    </head>
    CABECERA;
    echo $head;
}

function myMenu(){
    $menu=<<<HERE

    

    <div>
        <ul class="header-img">

            <li><a href=""><img class="hasby-pizza" alt="Hasby pizza" src="./img/hasby-pizza-logo.png" /></a></li>
        </ul>
        <div class="header">

            <ul class="menu">
                <li class="text-wrapper"><a href="default.asp">Home</a></li>
                <li class="div"><a href="pedidoForm.php">Pedido</a></li>
                <li class="text-wrapper-2"><a href="contact.asp">About Us</a></li>
                <li class="text-wrapper-3"><a href="about.asp">Contact Us</a></li>
            </ul>
        </div>
    </div>
    HERE;
    echo $menu;
}

?>