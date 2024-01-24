<?php


$servidor = "localhost";
$usuario = "root";
$password = "";


try {
    $conexion = new PDO("mysql:host=$servidor;dbname=vueling", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexion realizada con exito !!!";
}catch (PDOException $pd) {
    echo "la conexion ha fallado "  . $pd->getMessage();
}

$conexion = null;
