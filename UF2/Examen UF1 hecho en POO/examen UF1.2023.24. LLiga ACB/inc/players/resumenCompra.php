<?php

include_once ("../layout.php");
myHeader();
myMenu();

if(isset($_POST["partidos"])) {
    $partido = $_POST["partidos"];
}


if(isset($_POST["zona"])) {
    $zona = $_POST["zona"];
}

if(isset($_POST["email"])) {
    $email = $_POST["email"];
}

if(isset($_POST["entradas"])) {
    $entrada = $_POST["entradas"];
}

if(isset($_POST["telefono"])) {
    $telefono = $_POST["telefono"];
}


if(isset($partido) and isset($zona) and isset($email) and isset($entrada) and isset($telefono)) {
    echo "<h1>Tu compra ha sido realizada correctamente</h1>";

    echo "<p>Partido : $partido</p>";
    echo "<p>Zona : $zona</p>";
    echo "<p>Email : $email</p>";
    echo "<p>Entrada : $entrada</p>";
    echo "<p>Telefono : $telefono</p>";
}

?>