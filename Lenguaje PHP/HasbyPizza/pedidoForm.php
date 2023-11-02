<?php

session_start();

if (isset($_SESSION["entrado"])) {
    include("./layout-structure.php");
    require_once("./validation.php");

    myHeader();

    if (isset($_SESSION['info'])) {
        $info = $_SESSION['info'];
    }

    if (isset($_SESSION['errors'])) {
        $errors = $_SESSION['errors'];
    }

    /**
     * contenido dinamico --> Raul
     * values de los campos PHP (VALIDACIONES) --> Shah Zaib
     * JS --> Raul
     * Selector de ciudades dinamicamente con un array --> Ivan
     * 
     */


?>




    <body>

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
                                        <input id="email" name="email" placeholder="" value="<?php echo $info["email"] ?? "" ?>">
                                        <span style="color: red;"><?php echo $errors["email"] ?? "" ?></span>
                                    </div>
                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <label for="phoneNumber" class="form-control-label px-3">Phone number</label>
                                        <input type="text" id="phoneNumber" name="phoneNumber" placeholder="" value="<?php echo $info["phoneNumber"] ?? "" ?>">
                                        <span style="color: red;"><?php echo $errors["phoneNumber"] ?? "" ?></span>
                                    </div>
                                </div>


                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-sm-6 flex-column d-flex">
                                        <!-- <label for="city" class="form-control-label px-3">City</label>
                                    <input type="text" id="city" name="city" placeholder=""> -->

                                        <div class="form-group flex-column d-flex">
                                            <label for="city" class="form-control-label px-3">City</label>

                                            <?php
                                            // Array de ciudades
                                            $ciudades = array("Almería", "Barcelona", "Castellón", "Málaga", "Madrid");

                                            // Función para generar el select de ciudades
                                            function generarSelectCiudades($ciudades)
                                            {
                                                echo '<select name="city" id="city">';
                                                foreach ($ciudades as $ciudad) {
                                                    echo "<option value='$ciudad'>$ciudad</option>";
                                                }
                                                echo '</select>';
                                            }

                                            // Llamada a la función para generar el select
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


                                <div class="row justify-content-between mt-5">
                                    <div class="form-group col-sm-2 flex-column d-flex"> <label for="discount" class="form-control-label px-3">Discount</label>
                                        <input type="checkbox" id="discount" name="discount" placeholder="" value="discount">
                                    </div>
                                </div>

                                <div class="row justify-content-between text-left mt-5">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Menu</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">
                                                    <label for="menu1" class="form-control-label px-3"></label> <input type="checkbox" id="menu1" name="menu[]" placeholder="" value="Pepperoni + Drink">
                                                </th>
                                                <td>Pepperoni + Drink</td>
                                                <td>12€</td>
                                                <td>
                                                    <label for="quantity1" class="form-control-label px-3"></label> <input type="number" id="quantity1" name="quantity[]" placeholder="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <label for="menu2" class="form-control-label px-3"></label> <input type="checkbox" id="menu2" name="menu[]" placeholder="" value="Barbeque + Water">
                                                </th>
                                                <td>Barbeque + Water</td>
                                                <td>10€</td>
                                                <td>
                                                    <label for="quantity2" class="form-control-label px-3"></label> <input type="number" id="quantity2" name="quantity[]" placeholder="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <label for="menu3" class="form-control-label px-3"></label> <input type="checkbox" id="menu3" name="menu[]" placeholder="" value="Special HasbyPizza + Complements">
                                                </th>
                                                <td>Special HasbyPizza + Complements</td>
                                                <td>17€</td>
                                                <td>
                                                    <label for="quantity3" class="form-control-label px-3"></label> <input type="number" id="quantity3" name="quantity[]" placeholder="">

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <span><?php $info["menu"] ?? "" ?></span>
                                    <span><?php echo $errors["menu"] ?? "" ?></span>

                                    <span><?php $info["quantity"] ?? "" ?></span>
                                    <span><?php $errors["quantity"] ?? "" ?></span>



                                </div>
                                <span><?php $errors["quantity"] ?? "" ?></span>
                                <span><?php $errors["discount"] ?? "" ?></span>


                                <div class="row justify-content-between mt-5">
                                    <div class="form-group col-sm-2 flex-column d-flex"> <label for="custom" class="form-control-label px-3">Custom Pizza</label> <input type="checkbox" id="custom" name="custom" placeholder="" value="CustomPizza"> </div>
                                </div>

                                <div class="d-flex">

                                    <div class="row text-left mt-5">
                                        <div class="form-group col-m-2">
                                            <label for="quantityCustom" class="form-control-label px-3">Quantity </label>
                                            <input type="number" id="quantityCustom" name="quantityCustom" placeholder="">
                                        </div>

                                    </div>

                                    <div class="row text-left mt-5 ml-4">
                                        <div class="form-group col-sm-3 flex-column">
                                            <span>Tamaño:</span>
                                        </div>

                                        <div class="form-group col-sm-2 flex-column">
                                            <label for="small" class="form-control-label px-3">Small</label>
                                            <input type="radio" id="small" name="sizePizza[]" value="small">
                                        </div>

                                        <div class="form-group col-sm-2 flex-column">
                                            <label for="medium" class="form-control-label px-3">Medium</label>
                                            <input type="radio" id="medium" name="sizePizza[]" value="medium">
                                        </div>

                                        <div class="form-group col-sm-2 flex-column">
                                            <label for="big" class="form-control-label px-3">Big</label>
                                            <input type="radio" id="big" name="sizePizza[]" value="big">
                                        </div>
                                    </div>

                                </div>


                                <div class="d-flex">

                                    <div class="row text-left mt-5 ml-4">
                                        <div class="form-group col-sm-3 flex-column">
                                            <span>Mass:</span>
                                        </div>

                                        <div class="form-group col-sm-3 flex-column">
                                            <label for="masa" class="form-control-label px-2">Masa Roll</label>
                                            <input type="radio" id="masa" name="dough[]" value="Masa Roll">
                                        </div>

                                        <div class="form-group col-sm-2 flex-column">
                                            <label for="finizzima" class="form-control-label px-3">Finizzima</label>
                                            <input type="radio" id="finizzima" name="dough[]" value="Finizzima">
                                        </div>

                                        <div class="form-group col-sm-2 flex-column">
                                            <label for="classic" class="form-control-label px-3">Classic</label>
                                            <input type="radio" id="classic" name="dough[]" value="Classic">
                                        </div>
                                    </div>

                                </div>



                                <div class="d-flex">

                                    <div class="row text-left mt-5 ml-4">
                                        <div class="form-group col-sm-2 flex-column">
                                            <span>Ingredientes:</span>
                                        </div>

                                        <div class="form-group col-sm-1 flex-column">
                                            <label for="chicken" class="form-control-label px-2">Chicken</label>
                                            <input type="checkbox" id="chicken" name="ingredients[]" value="chicken">
                                        </div>

                                        <div class="form-group col-sm-1 flex-column">
                                            <label for="veal" class="form-control-label px-3">Veal</label>
                                            <input type="checkbox" id="veal" name="ingredients[]" value="finizzima">
                                        </div>

                                        <div class="form-group col-sm-1 flex-column">
                                            <label for="egg" class="form-control-label px-3">Egg</label>
                                            <input type="checkbox" id="egg" name="ingredients[]" value="egg">
                                        </div>

                                        <div class="form-group col-sm-1 flex-column">
                                            <label for="tuna" class="form-control-label px-3">Tuna</label>
                                            <input type="checkbox" id="tuna" name="ingredients[]" value="tuna">
                                        </div>


                                        <div class="form-group col-sm-1 flex-column">
                                            <label for="mushrooms" class="form-control-label px-3">Mushrooms</label>
                                            <input type="checkbox" id="mushrooms" name="ingredients[]" value="mushrooms">
                                        </div>
                                    </div>
                                    <!-- <span style="color: red;"><?php //print_r( $info["ingredients"]) ?? "" 
                                                                    ?></span>
                                <span style="color: red;"><?php //echo $errors["ingredients"] ?? "" 
                                                            ?></span>
                                 -->

                                </div>


                                <div class="d-flex">

                                    <div class="row text-left mt-5 ml-4">
                                        <div class="form-group col-sm-3 flex-column">
                                            <span>Extras:</span>
                                        </div>

                                        <div class="form-group col-sm-2 flex-column">
                                            <label for="olive" class="form-control-label px-2">Olive (0,25)</label>
                                            <input type="checkbox" id="olive" name="extras[]" value="olive">
                                        </div>

                                        <div class="form-group col-sm-2 flex-column">
                                            <label for="bacon" class="form-control-label px-3">Bacon (0,50)</label>
                                            <input type="checkbox" id="bacon" name="extras[]" value="bacon">
                                        </div>

                                        <div class="form-group col-sm-2 flex-column">
                                            <label for="onion" class="form-control-label px-3">Onion (0,25)</label>
                                            <input type="checkbox" id="onion" name="extras[]" value="onion">
                                        </div>

                                        <div class="form-group col-sm-2 flex-column">
                                            <label for="potato" class="form-control-label px-3">Potato (0,50)</label>
                                            <input type="checkbox" id="potato" name="extras[]" value="potato">
                                        </div>
                                    </div>

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

    </body>

<?php
} else {
    echo "No puedes acceder aqui, logeate";

    echo "<br>";

    echo "<a href='./login/login.php'>Logear</a>";
}
?>