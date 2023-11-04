<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Pizza</title>
</head>

<body>

    <?php
    session_start();

    if (isset($_SESSION["entrado"])) {
        include("./layout-structure.php");
        require_once("./inc/validation.php");
        require_once("./inc/data.php");

        myHeader();

        if (isset($_SESSION['info'])) {
            $info = $_SESSION['info'];
        }

        if (isset($_SESSION['errors'])) {
            $errors = $_SESSION['errors'];
        }
    ?>
        <a href="./login/logout.php">Cerrar Sesión</a>



        <div class="container mt-5 text-center">
            <h1>Custom Pizza</h1>

            <div class="container-fluid px-1 py-5 mx-auto">
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-8 col-lg-8 col-md-9 col-11 text-center">
                        <div class="card">
                            <form class="form-card" method="post">
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label for="name" class="form-control-label px-3">Name</label>
                                        <input type="text" id="name" name="name" placeholder="Enter your Name" value="<?php echo $info["name"] ?? "" ?>">
                                        <span style="color: red;"><?php echo $errors["name"] ?? "" ?></span>
                                    </div>
                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label for="surname" class="form-control-label px-3">Surname</label>
                                        <input type="text" id="surname" name="surname" placeholder="Enter your Surname" value="<?php echo $info["surname"] ?? "" ?>">
                                        <span style="color: red;"><?php echo $errors["surname"] ?? "" ?></span>
                                    </div>
                                </div>

                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label for="email" class="form-control-label px-3">Email</label>
                                        <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo $info["email"] ?? "" ?>">
                                        <span style="color: red;"><?php echo $errors["email"] ?? "" ?></span>
                                    </div>
                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label for="phoneNumber" class="form-control-label px-3">Phone number</label>
                                        <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Enter your phone number" value="<?php echo $info["phoneNumber"] ?? "" ?>">
                                        <span style="color: red;"><?php echo $errors["phoneNumber"] ?? "" ?></span>
                                    </div>
                                </div>




                                <div class="form-group col-sm-6 flex-column d-flex">

                                    <div class="form-group flex-column d-flex">
                                        <label for="city" class="form-control-label px-3">City</label>

                                        <?php
                                        $ciudades = array("Almería", "Barcelona", "Castellón", "Málaga", "Madrid");

                                        function generarSelectCiudades($ciudades)
                                        {
                                            echo '<select name="city" id="city">';
                                            foreach ($ciudades as $ciudad) {
                                                echo "<option value='$ciudad'>$ciudad</option>";
                                            }
                                            echo '</select>';
                                        }

                                        generarSelectCiudades($ciudades);
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label for="address" class="form-control-label px-3">Address</label>
                                    <input type="text" id="address" name="address" placeholder="Escribe tu dirección" value="<?php echo $info["address"] ?? "" ?>">
                                    <span style="color:red;"><?php echo $errors["address"] ?? "" ?></span>
                                </div>
                        </div>




                        <div class="form-group">
                            <label for="ofertas">Ofertas del Día:</label>
                            <ul>
                                <?php foreach ($ofertasDelDia as $oferta) : ?>
                                    <li>
                                        <input type='number' name='ofertas[<?= $oferta['nombre'] ?>]' value='0' min='0'>
                                        <?= $oferta['nombre'] ?> - Precio: $<?= $oferta['precio'] ?>
                                    </li>
                                <?php endforeach; ?>

                            </ul>

                            <span><?php echo $errors["ofertas"] ?? "" ?></span>
                        </div>







                        <div class="row text-left mt-5 ml-4">
                            <div class="form-group col-sm-3 flex-column">
                                <span>Cantidad:</span>
                            </div>

                            <input type="number" id="quantityCustom_1" name="quantityCustom" value="<?php echo $info["quantityCustom"] ?? "" ?>" style="width: 100px;">


                            <span style="color: red;">
                                <?php echo $errors["quantityCustom"] ?? "" ?>
                            </span>
                        </div>




                        <!-- Parte de los radio buttons -->
                        <div class="row text-left mt-5 ml-4">
                            <div class="form-group col-sm-3 flex-column">
                                <span>Tamaño:</span>
                            </div>
                            <?php


                            foreach ($pizzaSizes as $key => $value) {
                                echo "<div>";
                                echo "<input type='radio' name='pizzaSizes' id='pizzaSizes_$key' value='$key' />";
                                echo "<label for='pizzaSizes_$key'>" . " $value </label>";
                                echo "</div>";
                            }
                            ?>



                            <span style="color: red;">
                                <?php echo $errors["pizzaSize"] ?? "" ?>
                            </span>
                        </div>


                        <!-- Parte de los radio buttons -->
                        <div class="row text-left mt-5 ml-4">
                            <div class="form-group col-sm-3 flex-column">
                                <span>Massa:</span>
                            </div>
                            <?php


                            foreach ($massas as $key => $value) {
                                echo "<div>";
                                echo "<input type='radio' name='massas' id='massas_$key' value='$key' />";
                                echo "<label for='massas_$key'>" . " $value </label>";
                                echo "</div>";
                            }
                            ?>



                            <span style="color: red;">
                                <?php echo $errors["massas"] ?? "" ?>
                            </span>
                        </div>


                        <!-- Parte de los checkboxes -->
                        <div class="row text-left mt-5 ml-4">
                            <div class="form-group col-sm-3 flex-column">
                                <span>Ingredientes:</span>
                            </div>
                            <?php
                            $ingredientsOptions = [
                                ["id" => "chicken", "value" => "Chicken"],
                                ["id" => "veal", "value" => "Vealll"],
                                ["id" => "egg", "value" => "Eggss"],
                                ["id" => "tuna", "value" => "Tuna"],
                                ["id" => "mushrooms", "value" => "Mushrooms"],
                            ];

                            foreach ($ingredientsOptions as $ingredient) {
                                echo "<div class='form-group col-sm-2 flex-column p-5' >";
                                echo "<label for='{$ingredient['id']}' class='form-control-label p-2'>" . $ingredient['value'] . "</label>";
                                echo "<input type='checkbox' id='{$ingredient['id']}' name='ingredients[]' value='{$ingredient['id']}'";
                                if (isset($info["ingredients"]) && in_array($ingredient['id'], $info["ingredients"])) {
                                    echo " checked"; 
                                }
                                echo ">";
                                echo "</div>";
                            }
                            ?>


                            <span style="color: red;">
                                <?php echo $errors["ingredients"] ?? "" ?>
                            </span>
                        </div>


                        <div class="row text-left mt-5 ml-4">
                            <div class="form-group col-sm-3 flex-column">
                                <span>Extras:</span>
                            </div>

                            <?php

                            foreach ($extrasOptions as $extra) {
                                echo "<div class='form-group col-sm-2 flex-column p-5' >";
                                echo "<label for='{$extra['id']}' class='form-control-label p-2'>" . $extra['name'] . "</label>";
                                echo "<input type='checkbox' id='{$extra['id']}' name='extras[]' value='{$extra['value']}'";
                                if (isset($info["extras"]) && in_array($extra['value'], $info["extras"])) {
                                    echo " checked";
                                }
                                echo ">";
                                echo "</div>";
                            }
                            ?>

                            <span style="color: red;">
                                <?php echo $errors["extras"] ?? "" ?>
                            </span>
                        </div>





                        <div class="row justify-content-end">
                            <div class="form-group col-sm-6"> <input type="submit" class="btn-block btn-primary"> </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <?php
    } else {
        echo "No puedes acceder aquí, inicia sesión";
        echo "<br>";
        echo "<a href='./login/login.php'>Iniciar Sesión</a>";
    }
    unset($_SESSION['info']);
    unset($_SESSION['errors']);
    ?>


</body>

</html>