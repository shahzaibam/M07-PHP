<?php
session_start();

include('./layout.php');
include('./functions.php');

myHeader();

myMenu();


if(isset($_SESSION["contador"])) {
  $_SESSION["contador"] = $_SESSION["contador"] + 1;
}else {
  $_SESSION["contador"] = 1;

}






$cookie_name = "estil";
$value = "hola";


setcookie($cookie_name, $value, time() + (365 * 24 * 60 * 60), "/");
?>


<body>

  <div class="text-center m-5">

    <h2>Clubes</h2>

    <h3>Contador de visitas <?php echo $_SESSION["contador"] ?></h3>

    <div class="d-flex">

        <?php

          //llamo a la funcion de readClubs que me lee todos los clubx que hay, y me muestra sus imagenes
          $clubs = readClubs();
            if (!empty($clubs)) {

                foreach ($clubs as $numeroClub => $club) {

                  echo "<div>";
                  echo "<a href='./inc/players_$club.php'><img src='./images/logos_clubs/$club.png' height='100px'></a>";
                  echo "<p>$club</p>";
                  echo "</div>";
                }
            } else {
              echo "no hay nada";   
            }
          

        ?>
    </div>


  </div>

  

  <?php

    myFooter();

  ?>

</body>

</html>