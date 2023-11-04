<?php

session_start();

if (isset($_SESSION['info'])) {
    $info = $_SESSION['info'];
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
</head>

<body>
    <div class="d-flex text-center justify-content-center">
        <div>
            <div class="info border m-5">
                <h1>Thanks for buying in HasbyPizza.</h1>
                <p><?php echo ($info["name"]) ? 'Name:' . $info["name"] : 'N/A'; ?></p>
                <p><?php echo ($info["surname"]) ? 'Surname: ' . $info["surname"] : 'N/A'; ?></p>
                <p><?php echo ($info["email"]) ? 'Email: ' . $info["email"] : 'N/A'; ?></p>
                <p><?php echo ($info["city"]) ? 'City: ' . $info["city"] : 'N/A'; ?></p>
                <p><?php echo ($info["quantityCustom"]) ? 'Cantidad: ' . $info["quantityCustom"] : 'N/A'; ?></p>
                <p><?php echo ($info["pizzaSize"]) ? 'Pizza Size: ' . $info["pizzaSize"] : 'N/A'; ?></p>
                <p><?php echo ($info["massas"]) ? 'Massa: ' . $info["massas"] : 'N/A'; ?></p>
                <!-- <p><?php //echo ($info["ingredients"]) ? 'Ingredients: ' . $info["ingredients"] : 'N/A'; 
                        ?></p> -->
                <!-- <p><?php //echo ($info["custom"]) ? 'Custom:' . $info["custom"] : 'N/A'; 
                        ?></p> -->
                <p><?php //echo ($info["quantityCustom"]) ? 'QuantityCustom:' . $info["quantityCustom"] : 'N/A'; 
                    ?></p>

                <p>
                    Ingredients:
                    <?php
                    for ($i = 0; $i < count($info["ingredients"]); $i++) {
                        echo $info["ingredients"][$i] . ", ";
                    }
                    ?>
                </p>

                <p>
                    Extras:
                    <?php
                    for ($i = 0; $i < count($info["extras"]); $i++) {
                        echo $info["extras"][$i] . ", ";
                    }
                    ?>
                </p>

                <p>
                    Precio :
                    <?php

                    if (isset($_SESSION["precioTotal"])) {
                        echo $_SESSION["precioTotal"];
                    } else {
                        echo "---";
                    }

                    ?>
                </p>


                <p>
                    Precio OFERTAS :
                    <?php

                    if (isset($_SESSION["totalPriceOfertas"])) {
                        echo $_SESSION["totalPriceOfertas"];
                    } else {
                        echo "---";
                    }

                    ?>
                </p>


            </div>

            <a href="pdf_generator.php">
                <button>Descargar PDF</button>
            </a>

        </div>


        <div class="hasbyThankPicture info " style="margin-top: 30px;">
            <img src="./img/hasbyThumbsUp.jpg" alt="" height="608.15px">
        </div>

</body>

</html>