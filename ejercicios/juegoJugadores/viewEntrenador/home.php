<?php
session_start();

include("../layout.php");
myHeader();
?>


<?php

if (isset($_SESSION["entrado"]) && $_SESSION["entrado"] == true) {

    include("../functions.php");

    myMenuLoggedIn();

    $_SESSION["imgXavi"] = "../csvFiles/imgEntrenadores/xaviHernandez.jpeg";
    $_SESSION["imgLuis"] = "../csvFiles/imgEntrenadores/luisEnrique.jpg";
    $_SESSION["imgVicente"] = "../csvFiles/imgEntrenadores/vicente.jpg";



?>

    <body>
        <div class="container">
            <div>
                <div class="user-name mt-4">
                    <?php

                    $info_array = writeUsername($_SESSION["username"]);
                    $message = "";
                    $imgsrc = "";

                    for ($i = 0; $i < count($info_array); $i++) {
                        if ($i == 0) {
                            $message = $info_array[$i];
                        } else {
                            $imgsrc = $info_array[$i];
                        }
                    }

                    echo "<h1 class='mt-4'>" .  $message . "</h1>";
                    echo "<img src=" . $imgsrc . " height='100px'>";


                    ?>
                </div>

            </div>
        </div>

        <?php
            myFooter();
        ?>

    </body>
<?php

} else {
?>

    <section class="page_404">

        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="col-sm-10 col-sm-offset-1  text-center">
                        <div class="four_zero_four_bg">
                            <h1 class="text-center ">404</h1>
                        </div>

                        <div class="contant_box_404">
                            <h3 class="h2">
                                Look like you're lost
                            </h3>

                            <p>the page you are looking for is not avaible!</p>

                            <a href="http://127.0.0.1/m07-php/ejercicios/juegoJugadores/index.php" class="link_404">Go to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
}
?>