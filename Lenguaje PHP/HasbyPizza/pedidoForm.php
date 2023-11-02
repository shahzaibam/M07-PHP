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
                                        <?php
                                        // Opciones de menú con sus detalles (nombre, precio)
                                        $menuOptions = [
                                            ["name" => "Pepperoni + Drink", "price" => "12€", "id" => "menu1"],
                                            ["name" => "Barbeque + Water", "price" => "10€", "id" => "menu2"],
                                            ["name" => "Special HasbyPizza + Complements", "price" => "17€", "id" => "menu3"],
                                        ];

                                        // Generación dinámica de las filas de la tabla con las opciones de menú
                                        echo "<tbody>";
                                        foreach ($menuOptions as $key => $option) {
                                            $menuId = $option['id'];
                                            $menuName = $option['name'];
                                            $menuPrice = $option['price'];

                                            echo "<tr>";
                                            echo "<th scope='row'>";
                                            echo "<label for='$menuId' class='form-control-label px-3'></label>";
                                            echo "<input type='checkbox' id='$menuId' name='$menuId' placeholder='' value='$menuName'>";
                                            echo "</th>";
                                            echo "<td>$menuName</td>";
                                            echo "<td>$menuPrice</td>";
                                            echo "<td>";
                                            echo "<label for='quantity$key' class='form-control-label px-3'></label>";
                                            echo "<input type='number' id='quantity$key' name='quantity$key' placeholder=''>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                        echo "</tbody>";
                                        ?>
                                    </table>

                                    <span style="color: red;"><?php echo $errors['menu'] ?? "" ?></span>

                                </div>



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

                                        <?php
                                        // Tamaños de pizza
                                        $pizzaSizes = ["Small", "Medium", "Big"];

                                        // Generación dinámica de los tamaños de pizza (radio buttons)
                                        foreach ($pizzaSizes as $size) {
                                            $sizeId = strtolower($size); // ID de tamaño en minúsculas

                                            echo "<div class='form-group col-sm-2 flex-column'>";
                                            echo "<label for='$sizeId' class='form-control-label px-3'>$size</label>";
                                            echo "<input type='radio' id='$sizeId' name='sizePizza[]' value='$size'>";
                                            echo "</div>";
                                        }
                                        ?>
                                    </div>

                                </div>


                                <div class="d-flex">

                                    <div class="row text-left mt-5 ml-4">
                                        <div class="form-group col-sm-3 flex-column">
                                            <span>Mass:</span>
                                        </div>
                                        <?php
                                        // Opciones de masa
                                        $doughOptions = [
                                            ["id" => "masa", "value" => "Masa Roll"],
                                            ["id" => "finizzima", "value" => "Finizzima"],
                                            ["id" => "classic", "value" => "Classic"],
                                            // Puedes añadir más opciones de masa si es necesario
                                        ];

                                        // Generación dinámica de las opciones de masa (radio buttons)
                                        foreach ($doughOptions as $dough) {
                                            echo "<div class='form-group col-sm-2 flex-column'>";
                                            echo "<label for='{$dough['id']}' class='form-control-label px-3'>" . $dough['value'] . "</label>";
                                            echo "<input type='radio' id='{$dough['id']}' name='dough[]' value='{$dough['value']}'>";
                                            echo "</div>";
                                        }
                                        ?>
                                    </div>

                                </div>



                                <div class="d-flex">

                                    <div class="row text-left mt-5 ml-4">
                                        <div class="form-group col-sm-2 flex-column">
                                            <span>Ingredientes:</span>
                                        </div>
                                        <?php
                                        // Opciones de ingredientes
                                        $ingredientsOptions = [
                                            ["id" => "chicken", "value" => "Chicken"],
                                            ["id" => "veal", "value" => "Veal"],
                                            ["id" => "egg", "value" => "Egg"],
                                            ["id" => "tuna", "value" => "Tuna"],
                                            ["id" => "mushrooms", "value" => "Mushrooms"],
                                            // Puedes añadir más opciones de ingredientes si es necesario
                                        ];

                                        // Generación dinámica de las opciones de ingredientes (checkboxes)
                                        foreach ($ingredientsOptions as $ingredient) {
                                            echo "<div class='form-group col-sm-1 flex-column'>";
                                            echo "<label for='{$ingredient['id']}' class='form-control-label px-3'>" . $ingredient['value'] . "</label>";
                                            echo "<input type='checkbox' id='{$ingredient['id']}' name='ingredients[]' value='{$ingredient['value']}'>";
                                            echo "</div>";
                                        }
                                        ?>
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

                                        <?php
                                        // Opciones de ingredientes adicionales con sus precios
                                        $extrasOptions = [
                                            ["id" => "olive", "name" => "Olive (0,25)", "value" => "olive"],
                                            ["id" => "bacon", "name" => "Bacon (0,50)", "value" => "bacon"],
                                            ["id" => "onion", "name" => "Onion (0,25)", "value" => "onion"],
                                            ["id" => "potato", "name" => "Potato (0,50)", "value" => "potato"],
                                            // Puedes agregar más ingredientes adicionales con sus precios si es necesario
                                        ];

                                        // Generación dinámica de las opciones de ingredientes adicionales (checkboxes)
                                        foreach ($extrasOptions as $extra) {
                                            echo "<div class='form-group col-sm-2 flex-column'>";
                                            echo "<label for='{$extra['id']}' class='form-control-label px-3'>{$extra['name']}</label>";
                                            echo "<input type='checkbox' id='{$extra['id']}' name='extras[]' value='{$extra['value']}'>";
                                            echo "</div>";
                                        }
                                        ?>
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