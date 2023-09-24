<?php
    //Iniciamos la sesión
    session_start();
    
    require_once './04-functions.php';

    myHeader();

    myMenu();

?>

<body>
    
    <div>

        <?php


            
            $reiniciar_btn = <<<REINICIAR
                <form method="post">
                    <input type='submit' name="reiniciar" id="reiniciar" value='Reiniciar'>
                </form>
            REINICIAR;

            if(!isset($_SESSION['contador'])) {
                $_SESSION['contador'] = 1;
            }else if($_SESSION['contador'] == 3) {
                echo $reiniciar_btn;
                if (isset($_POST['reiniciar'])) {
                    $_SESSION['contador'] = 1;
                }
            } else {
                $_SESSION['contador']++;
            }



        ?>

        <div style="display: flex">

        <?php


            //Function Main
            //--------------------------------------------------------
            function main():void {

                //Local vars
                $getJugador1 = tirarDado();

                //Print
                echo '<h1 style="padding-left: 100px;"> Jugador 1 </h1>';
                mostrarDado($getJugador1); 

            }


            echo "<form method='post'>";
            echo "<input type='submit' value='Recargar Página'>";
            echo "</form>";

            //Web code
            //--------------------------------------------------------
            main();
        ?>


    </div>
    <p> Se ha recargado <?php echo $_SESSION['contador'] ?> veces</p>

    </div>


</body>


<?php

myFooter();
?>