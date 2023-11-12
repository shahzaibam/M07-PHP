<?php
session_start();

?>

<body>

    <?php

        if(isset($_SESSION["entrado"])) {
            if($_SESSION["entrado"] == true) {

                include("../layout.php");
                include("../functions.php");

                myHeader();
                myMenuLoggedIn();

                $_SESSION["imgXavi"] = "../csvFiles/imgEntrenadores/xaviHernandez.jpeg";
                $_SESSION["imgLuis"] = "../csvFiles/imgEntrenadores/luisEnrique.jpg";
                $_SESSION["imgVicente"] = "../csvFiles/imgEntrenadores/vicente.jpg";


                
    ?>
            <div class="container">
                <div>
                    <div class="user-name">
                        <?php

                            $info_array = writeUsername($_SESSION["username"]);
                            $message = "";
                            $imgsrc = "";

                            for ($i=0; $i < count($info_array); $i++) { 
                                if($i == 0) {
                                    $message = $info_array[$i];
                                }else{
                                    $imgsrc = $info_array[$i];
                                }
                            }

                            echo "<h1>" .  $message . "</h1>";
                            echo "<img src=" . $imgsrc . " height='100px'>";
                                            

                        ?>

                        

                    </div>

                </div>
            </div>
    <?php
    }
}else {
    echo "No puedes acceder aquí, inicia sesión";
    echo "<br>";
    echo "<a href='../login/login.php'>Iniciar Sesión</a>";
}
?>


   
</body>