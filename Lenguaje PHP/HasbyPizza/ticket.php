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
                <p>Name: <?php echo $name; ?></p>
                <p>Surname: <?php echo $surname; ?></p>
                <p>Email: <?php if ($emailValid) {
                                echo $email;
                            } else {
                                echo "Email Invalido";
                            } ?></p>
                <p>city: <?php echo $city; ?></p>
                <p>Discount: <?php echo $discount; ?></p>
                <p>Menu1: <?php echo $menu1; ?></p>
                <p>Quantity1: <?php echo $quantity1; ?></p>
                <p>Menu2: <?php echo $menu2; ?></p>
                <p>Quantity2: <?php echo  $quantity2; ?></p>
                <p>menu3: <?php echo $menu3; ?></p>
                <p>quantity3: <?php echo $quantity3; ?></p>
                <p>custom: <?php echo $custom; ?></p>
                <p>QuantityCustom: <?php echo $quantityCustom; ?></p>
                <p>SizePizza: <?php echo $sizePizza; ?></p>
                <p>Dough: <?php echo $dough; ?></p>


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