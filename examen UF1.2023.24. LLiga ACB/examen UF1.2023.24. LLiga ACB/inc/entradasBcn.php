<?php
session_start();


include('../layout.php');
include('../functions.php');

myHeader();
myMenu();


//miro si el contador existe y le sumo 1
if(isset($_SESSION["contador"])) {
    $_SESSION["contador"] = $_SESSION["contador"] + 1;
}
  
?>
<body>

<div class="entradas">
    <h1>Entradas</h1>
    <h3>Contador de visitas <?php echo $_SESSION["contador"] ?></h3>


    <div class="form-group flex-column d-flex">
        <label for="partido" class="form-control-label px-3">Partidos</label>

            <?php
                //llamo a la funcion para generar lso partidos --> shahziab asghar murni
                generarSelectPartidos();
                //llamo a la zona para geenrar lso partidos --> shahziab asghar munir
                generarZona();
            ?>
    </div>

</div>

</body>