<?php
session_start();

if (isset($_SESSION["entrado"]) && $_SESSION["entrado"] == true) {
    include("../layout.php");
    include("../functions.php");

    myHeader();
    myMenuLoggedIn();

    $archivoAleer = './recuentoVotos.php';

    
    
    
    ?>

<body>
    
    <h1>Recuento de Votos</h1>
    
    <div>
        <?php
        leerArchivo($archivoAleer);

            ?>
        </div>

    </body>

<?php
} else {
    echo "No puedes acceder aquí, inicia sesión";
    echo "<br>";
    echo "<a href='../login/login.php'>Iniciar Sesión</a>";
}
?>