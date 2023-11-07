<?php

session_start();

include("../layout.php");
include("../functions.php");

myHeader();
myMenuLoggedIn();

$_SESSION["imgXavi"] = "../csvFiles/imgEntrenadores/xaviHernandez.jpeg";
$_SESSION["imgLuis"] = "../csvFiles/imgEntrenadores/luisEnrique.jpg";



// echo ($_SESSION["imgLuis"]);

function writeUsername($nombre):array {
    $info = [];
    if(isset($nombre)) {
        if($nombre == "luis_enrique") {
            $message =  "Bienvenido, Luis Enrique";
            $foto = $_SESSION["imgLuis"];
            array_push($info, $message);
            array_push($info, $foto);

            $cookie_name = "visitsLuis";
            if(isset($_COOKIE[$cookie_name])) {
                // Mostrar el número de visitas
                echo "Número de visitas: " . $_COOKIE[$cookie_name];
            }
            // echo "<img src='" . $foto . "' height='100px'/>";
        }else if($nombre == "xavi_hernand") {
            $message =  "Bienvenido, Xavi Hernández";
            $foto = $_SESSION["imgXavi"];
            array_push($info, $message);
            array_push($info, $foto);

            $cookie_name = "visitsXavi";
            if(isset($_COOKIE[$cookie_name])) {
                // Mostrar el número de visitas
                echo "Número de visitas: " . $_COOKIE[$cookie_name];
            }
            // echo "<img src='" . $foto . "' height='100px'/>";
        }
    }

    return $info;
}





?>

<body>
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
</body>