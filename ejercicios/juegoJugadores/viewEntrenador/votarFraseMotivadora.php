<?php

session_start();

if(isset($_SESSION["entrado"])) {
    if($_SESSION["entrado"] == true) {
        
        include("../layout.php");
        include("../functions.php");
        
        myHeader();
        myMenuLoggedIn();
    }
}else {
    echo "No puedes acceder aquí, inicia sesión";
    echo "<br>";
    echo "<a href='../login/login.php'>Iniciar Sesión</a>";
}


?>