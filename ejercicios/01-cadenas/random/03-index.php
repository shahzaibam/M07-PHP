<?php
    require_once './04-functions.php';

    myHeader();

    myMenu();

?>

<body>

<div>

    <h2 class="text-center mt-4" style="margin-bottom: 50px;">Bienvenido al juego </h2>

    <img src="./img/letsplay.jpg" class="mx-auto d-block mt-4" style="margin-bottom: 100px;">

    <div class="d-flex justify-content-around mt-4 mb-4" >
        <div class="card" style="width: 20rem;">
            <img class="card-img-top" src="./img/homeCasa.jpg" alt="Card image cap" height="285rem">
            <div class="card-body">
                <p class="fw-bold"> Home </p>
                <p class="card-text">Bienvenida a los usuarios con un breve texto explicativo sobre el propósito o la temática de los juegos.</p>
            </div>
        </div>

        <div class="card" style="width: 20rem;">
            <img class="card-img-top" src="./img/dados.jpg" alt="Card image cap" height="285rem">
            <div class="card-body">
                <p class="fw-bold"> Juego 1 </p>
                <p class="card-text">Un jugador tira un dado tres veces recargando la página y suma los resultados.</p>
            </div>
        </div>


        <div class="card" style="width: 20rem;">
            <img class="card-img-top" src="./img/dados-2.jpg" alt="Card image cap" height="285rem">
            <div class="card-body">
                <p class="fw-bold"> Juego 2 </p>
                <p class="card-text">Dos jugadores tiran dados recargando la página, quien obtiene más puntos es el ganador.</p>
            </div>
        </div>


        <div class="card" style="width: 20rem;">
            <img class="card-img-top" src="./img/dados-3.jpg" alt="Card image cap" height="285rem">
            <div class="card-body">
                <p class="fw-bold"> Juego 3 </p>
                <p class="card-text">Tres jugadores lanzan dados haciendo recargar la página, el que saca más puntos es ganador.</p>
            </div>
        </div>

    </div>

</div>

<?php

myFooter();

?>

</body>