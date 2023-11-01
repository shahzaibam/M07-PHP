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
                <p>Name: <?php echo ($info["name"]) ? $info["name"] : 'N/A'; ?></p>
                <p>Surname: <?php echo ($info["surname"]) ? $info["surname"] : 'N/A'; ?></p>
                <p>Email: <?php echo ($info["email"]) ? $info["email"] : 'N/A'; ?></p>
                <p>city: <?php echo ($info["city"]) ? $info["city"] : 'N/A'; ?></p>
                <p>Discount: <?php echo ($info["discount"]) ? $info["discount"] : 'N/A'; ?></p>
                <p>Menu1: <?php echo ($info["menu1"]) ? $info["menu1"] : 'N/A'; ?></p>
                <p>Quantity1: <?php echo ($info["quantity1"]) ? $info["quantity1"] : 'N/A'; ?></p>
                <p>Menu2: <?php echo ($info["menu2"]) ? $info["menu2"] : 'N/A'; ?></p>
                <p>Quantity2: <?php echo ($info["quantity2"]) ? $info["quantity2"] : 'N/A'; ?></p>
                <p>menu3: <?php echo ($info["menu3"]) ? $info["menu3"] : 'N/A'; ?></p>
                <p>quantity3: <?php echo ($info["quantity3"]) ? $info["quantity3"] : 'N/A'; ?></p>
                <p>custom: <?php echo ($info["custom"]) ? $info["custom"] : 'N/A'; ?></p>
                <p>QuantityCustom:<?php echo ($info["quantityCustom"]) ? $info["quantityCustom"] : 'N/A'; ?></p>
                <p>SizePizza: <?php echo ($info["sizePizza"]) ? $info["sizePizza"] : 'N/A'; ?></p>
                <p>Dough: <?php echo ($info["dough"]) ? $info["dough"] : 'N/A'; ?></p>


                <p>ingredients: <?php

                                for ($i = 0; $i < count($ingredientes); $i++) {
                                    echo $ingredientes[$i] . ", ";
                                }

                                ?>

                </p>



                <p>extras: <?php

                            for ($i = 0; $i < count($extras); $i++) {
                                echo $extras[$i] . ", ";
                            }

                            ?>
                </p>

            </div>


        </div>


        <div class="hasbyThankPicture info  m-5">
            <img src="./img/hasbyThumbsUp.jpg" alt="" height="608.15px">
        </div>

</body>

</html>