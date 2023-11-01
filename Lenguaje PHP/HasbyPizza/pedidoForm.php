<?php

session_start();


require_once("./validation.php");
// include("./layout-structure.php");
require_once "./products.php";

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
                                    <input type="text" id="name" name="name" placeholder="Enter your Name" value="<?php echo $info['name'] ?? ''; ?>">
                                    <span style="color: red;"><?php echo $errors['name'] ?? ''; ?></span>
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label for="surname" class="form-control-label px-3">Surname</label>
                                    <input type="text" id="surname" name="surname" placeholder="Enter your Surname" value="<?php echo $info['surname'] ?? ''; ?>">
                                    <span style="color: red;"><?php echo $errors['surname'] ?? ''; ?></span>
                                </div>
                            </div>

                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label for="email" class="form-control-label px-3">Email</label>
                                    <input id="email" name="email" placeholder="" value="<?php echo $info['email'] ?? ''; ?>">
                                    <span style="color: red;"><?php echo $errors['email'] ?? ''; ?></span>
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label for="phoneNumber" class="form-control-label px-3">Phone number</label>
                                    <input type="text" id="phoneNumber" name="phoneNumber" placeholder="" value="<?php echo $info['phoneNumber'] ?? ''; ?>">
                                    <span style="color: red;"><?php echo $errors['phoneNumber'] ?? ''; ?></span>
                                </div>
                            </div>

                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label for="city" class="form-control-label px-3">City</label>
                                    <select name="city" id="city">
                                        <?php
                                        $ciudades = array("Almería", "Barcelona", "Castellón", "Málaga", "Madrid");
                                        foreach ($ciudades as $ciudad) {
                                            $selected = ($info['city'] ?? '') == $ciudad ? 'selected' : '';
                                            echo "<option value='$ciudad' $selected>$ciudad</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label for="address" class="form-control-label px-3">Address</label>
                                    <input type="text" id="address" name="address" placeholder="Escribe tu dirección" value="<?php echo $info['address'] ?? ''; ?>">
                                    <span style="color:red;"><?php echo $errors['address'] ?? ''; ?></span>
                                </div>
                            </div>

                            <div class="row justify-content-between mt-5">
                                <div class="form-group col-sm-2 flex-column d-flex">
                                    <label for="discount" class="form-control-label px-3">Discount</label>
                                    <input type="checkbox" id="discount" name="discount" placeholder="" value="discount" <?php echo isset($info['discount']) ? 'checked' : ''; ?>>
                                </div>
                            </div>

                            <div class="row justify-content-between text-left mt-5">
                                <div id="tabla-descuentos">
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
                                            <?php mostrarProductos($ofertas, $info); 
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row justify-content-between mt-5">
                                    <div class="form-group col-sm-2 flex-column d-flex">
                                        <label for="custom" class="form-control-label px-3">Custom Pizza</label>
                                        <input type="checkbox" id="custom" name="custom" placeholder="" value="CustomPizza" <?php echo isset($info['custom']) ? 'checked' : ''; ?>>
                                    </div>
                                </div>

                                <div class="d-flex">

                                    <div id="customPizza">
                                        <article>
                                            <label for="quantityCustom" class="form-control-label px-3">Quantity </label>
                                            <input type="number" id="quantityCustom" name="quantityCustom" placeholder="">
                                        </article>

                                         <?php mostrarSelectorIngredientes($ingredientes, $info); ?> 


                                    </div>
                                        <div class="row justify-content-end">
                                            <div class="form-group col-sm-6">
                                                <input type="submit" class="btn-block btn-primary">
                                            </div>
                                        </div>
                                    </div>
                        </form>




                    </div>


                </div>
            </div>
        </div>
    </div>

    <script src="./js/main.js"></script>


</body>