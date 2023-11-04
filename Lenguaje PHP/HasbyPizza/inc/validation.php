<?php
require_once("./layout-structure.php");
require_once("./inc/functions.php");
require_once("./pedidoForm.php");
require_once("./inc/data.php");

myHeader();

$info = [];
$errors = [];


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //name
    if (isset($_POST['name'])) {
        $name = htmlspecialchars($_POST['name']);

        if (!empty($name)) {
            if (preg_match("/^[a-zA-Z-' ]+$/", $name)) {
                $info['name'] = trim($name);
            } else {
                $errors['name'] = "Porfavor introduce un nombre válido";
            }
        } else {
            $errors['name'] = "El nombre no puede estar vacío";
        }
    }



    //surname
    if (isset($_POST['surname'])) {
        $surname = htmlspecialchars($_POST['surname']);

        if (!empty($surname)) {
            if (preg_match("/^[a-zA-Z-' ]+$/", $surname)) {
                $info['surname'] = trim($surname);
            } else {
                $errors['surname'] = "Porfavor introduce un apellido válido";
            }
        } else {
            $errors['surname'] = "El apellido no puede estar vacío";
        }
    }


    //email
    if (isset($_POST['email'])) {
        $email = htmlspecialchars($_POST['email']);

        if (!empty($email)) {
            if ((filter_var($email, FILTER_VALIDATE_EMAIL))) {
                $info['email'] = trim($email);
            } else {
                $errors['email'] = "Porfavor introduce un email válido";
            }
        } else {
            $errors['email'] = "El email no puede estar vacío";
        }
    }


    //phoneNumber
    if (isset($_POST['phoneNumber'])) {
        $phoneNumber = htmlspecialchars($_POST['phoneNumber']);

        if (!empty($phoneNumber)) {
            if (preg_match("/^[6789]\d{8}$/", $phoneNumber)) {
                $info['phoneNumber'] = trim($phoneNumber);
            } else {
                $errors['phoneNumber'] = "Porfavor introduce un telefono válido";
            }
        } else {
            $errors['phoneNumber'] = "El phoneNumber no puede estar vacío";
        }
    }





    //city
    if (isset($_POST['city'])) {
        $city = htmlspecialchars($_POST['city']);
        $info['city'] = trim($city);
    } else {
        $errors['city'] = "La ciudad no puede estar vacía";
    }




    //address
    if (isset($_POST['address'])) {
        $address = htmlspecialchars($_POST['address']);

        if (!empty($address)) {
            if (preg_match("/^[A-Za-z0-9\s\-\.\,\/]+$/", $address)) {
                $info['address'] = trim($address);
            } else {
                $errors['address'] = "La dirección es incorrecta";
            }
        } else {
            $errors['address'] = "La dirección no puede estar vacía";
        }
    }







    $totalPriceOfertas = 0.0;

    if (isset($_POST['ofertas'])) {
        if(!empty($_POST['ofertas'])) {
            foreach ($_POST['ofertas'] as $nombreOferta => $cantidad) {
                $cantidad = filter_var($cantidad, FILTER_VALIDATE_INT);
                if ($cantidad !== false && $cantidad >= 0) {
                    foreach ($ofertasDelDia as $oferta) {
                        if ($oferta['nombre'] === $nombreOferta) {
                            $precioOferta = $oferta['precio'];
                            $totalPriceOfertas += $precioOferta * $cantidad;
    
                            break;
                        }
                    }
                }else {
                    $errors["ofertas"] = "porfavor introduce bien la cantidad";
                }
            }
        }else {
            $errors["ofertas"] = "porfavor introduce bien la cantidad";
        }

    }

    $_SESSION["totalPriceOfertas"] = $totalPriceOfertas;












    //quantity
    if (isset($_POST['quantityCustom'])) {
        $quantityCustom = htmlspecialchars($_POST['quantityCustom']);

        if (!empty($quantityCustom)) {

            if ((filter_var($quantityCustom, FILTER_VALIDATE_INT))) {
                if ($quantityCustom < 1) {
                    $errors["quantityCustom"] = "No puede ser menor de cero";
                } else {
                    $info['quantityCustom'] = trim($quantityCustom);
                }
            } else {
                $errors["quantityCustom"] = "Cantidad no válida";
            }
        } else {
            $errors["quantityCustom"] = "Cantidad no puede estar vacía";
        }
    }


    $pizzaSize = filter_input(INPUT_POST, 'pizzaSizes', FILTER_SANITIZE_STRING);
    if ($pizzaSize && array_key_exists($pizzaSize, $pizzaSizes)) {
        $pizzaSize = htmlspecialchars($pizzaSize);
        $info["pizzaSize"] = $pizzaSize;
    } else {
        $errors['pizzaSize'] = 'Selecciona una Pizza.';
    }



    $massa = filter_input(INPUT_POST, 'massas', FILTER_SANITIZE_STRING);


    if ($massa && array_key_exists($massa, $massas)) {
        $massa = htmlspecialchars($massa);
        $info["massas"] = $massa;
    } else {
        $errors['massas'] = 'Selecciona una massa.';
    }







    $totalPrice = 0.0;

    if (isset($_POST['ingredients'])) {
        $ingredientes = $_POST['ingredients'];
        $info['ingredients'] = $ingredientes;

        foreach ($ingredientes as $ingredient) {
            if (array_key_exists($ingredient, $ingredientPrices)) {
                $totalPrice += $ingredientPrices[$ingredient];
            }
        }
    } else {
        $errors['ingredients'] = "Porfavor selecciona ingredientes";
    }


    if (isset($_POST['extras'])) {
        $extras = $_POST['extras'];
        $info['extras'] = $extras;

        foreach ($extras as $extra) {
            if (array_key_exists($extra, $extraPrices)) {
                $totalPrice += $extraPrices[$extra];
            }
        }
    } else {
        $errors['extras'] = "Porfavor selecciona extras";
    }









    $_SESSION["precioTotal"] = $totalPrice;




    if (!empty($errors)) {
        redirect_with("./pedidoForm.php", [
            'info' => $info,
            'errors' => $errors
        ]);
    }

    if (empty($errors)) {
        // Si no hay errores, redirecciona a la página de ticket
        redirect_with("./ticket.php", [
            'info' => $info
        ]);
    }
}
