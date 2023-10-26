<?php

session_start();

include("./layout-structure.php");
myHeader();
 

if (isset($_POST['sizePizza'])) {
    // $_SESSION['sizePizza'] = $_POST['sizePizza'][0]; // Assuming only one option can be selected

    for ($i = 0; $i < count($_POST['sizePizza']); $i++) {
        $sizePizza = $_POST['sizePizza'][$i];
    }

    // echo "Selected size: " . $selectedSize;
} else {
    echo "error en size pizza";
}


if (isset($_POST['dough'])) {
    // $_SESSION['sizePizza'] = $_POST['sizePizza'][0]; // Assuming only one option can be selected

    for ($i = 0; $i < count($_POST['dough']); $i++) {
        $dough = $_POST['dough'][$i];
    }

    // echo "Selected size: " . $selectedSize;
} else {
    echo "error en size pizza";
}


if (isset($_POST['ingredients'])) {

    // foreach ($_POST['ingredients'] as $key => $value) {
    //     $_POST['ingredients'];
    //     array_push($_POST["ingredients"], $value);


    // }

} else {
    echo "error en size pizza";
}


if (isset($_POST['extras'])) {
    // $_SESSION['sizePizza'] = $_POST['sizePizza'][0]; // Assuming only one option can be selected

    // for ($i = 0; $i < count($_POST['extras']); $i++) {
    //     $_SESSION['extras'] = $_POST['extras'][$i];
    // }

    // echo "Selected size: " . $selectedSize;
} else {
    echo "error en size pizza";
}

$_SESSION['name'] = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$city = $_POST['city'];
$discount = $_POST['discount'];
$menu1 = $_POST['menu1'];
$quantity1 = $_POST['quantity1'];
$menu2 = $_POST['menu2'];
$quantity2 = $_POST['quantity2'];
$menu3 = $_POST['menu3'];
$quantity3 = $_POST['quantity3'];
$custom = $_POST['custom'];
$quantityCustom = $_POST['quantityCustom'];


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
                <p>Name: <?php echo $_SESSION["name"]; ?></p>
                <p>Surname: <?php echo $surname; ?></p>
                <p>Email: <?php echo $email ?></p>
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

                                for ($i = 0; $i < count($_POST['ingredients']); $i++) {
                                    echo $_POST["ingredients"][$i] . ", ";
                                }

                                ?>

                </p>



                <p>extras: <?php

                            for ($i = 0; $i < count($_POST['extras']); $i++) {
                                echo $_POST["extras"][$i] . ", ";
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