<?php
include(__DIR__ . "/Contacto.php");
include("./layout.php");

myHeader();
myMenu();

// $agenda = isset($_COOKIE["agenda"]) ? unserialize($_COOKIE["agenda"]) : [];


$contacto1 = showContacto("shahzaib", "asghar", "2004-08-30", "shah5@gmail.com");
$contacto2 = showContacto("shahzaib", "asghar", "2010-08-30", "shah5@gmail.com");
$contacto3 = showContacto("shahzaib", "asghar", "2016-08-30", "shah5@gmail.com");
$contacto4 = showContacto("shahzaib", "asghar", "1999-08-30", "shah5@gmail.com");


$agenda = [];


//si ya existe una cookie de agenda le hace unserializar, si no existe y le añade los 4 contactos
if (isset($_COOKIE["agenda"])) {
    $agenda = unserialize($_COOKIE["agenda"]);
} else {
    $agenda[] = $contacto1;
    $agenda[] = $contacto2;
    $agenda[] = $contacto3;
    $agenda[] = $contacto4;

}



if (!empty($_POST)) {

    if (isset($_POST["nombre"])) {
        $nom = ($_POST["nombre"]);
    }

    if (isset($_POST["apellidos"])) {
        $apellidos = ($_POST["apellidos"]);
    }

    if (isset($_POST["fNacimiento"])) {
        $fNacimiento = ($_POST["fNacimiento"]);
    }

    if (isset($_POST["email"])) {
        $email = ($_POST["email"]);
    }

    $contacto = showContacto($nom, $apellidos, $fNacimiento, $email);


    $agenda[] = $contacto;



    // Guardar la agenda en la cookie
    setcookie("agenda", serialize($agenda), time() + 60 * 60 * 24 * 365); // La cookie expira en 1 año



    // Redirigir a la misma página para evitar el reenvío del formulario
    header("Location: index.php");
    exit();
}



?>


<body>

    <div class="text-center">

        <div>

            <h2>Agregar Contacto</h2>

            <form method="post" class="mt-5">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre">
                </div>

                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos">
                </div>


                <div class="form-group">
                    <label for="fNacimiento">Fecha de Nacimiento</label>
                    <input type="date" name="fNacimiento" id="fNacimiento">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email">
                </div>

                <div class="form-group">
                    <input type="submit" name="submit">
                </div>
            </form>
        </div>


        <div class="contacto-container">

            <?php

            //ordenar por fecha de nacimiento
            usort($agenda, 'compararPorFechaNacimiento');

            foreach ($agenda as $contacto) {
                echo "<div class='contacto mt-5'>";
                echo "$contacto";
                echo "</div>";
                echo "<br>";
            }

            ?>
        </div>
    </div>

</body>

</html>