<?php
/*
    TO DO
        Poner contenido dinamico
        Values de campos para no perder progereso al recargar
        JS
        Añadir selector en ciuddades
        Validar numeros negativos y decimales
*/

// Array de promociones/menus
$ofertas = [
    1 => [
        "nombre" => "Pepperoni + Drink",
        "precio" => 12
    ],
    2 => [
        "nombre" => "Barbeque + Water",
        "precio" => 10
    ],
    3 => [
        "nombre" => "Special HasbyPizza + Complements",
        "precio" => 17
    ]
];


// Array de componentes para las pizzas
$ingredientes = [
    "tamaños" => [[
        "small",
        "medium",
        "big"
    ], "simple"],
    "masas" => [[
        "masa roll",
        "finizzima",
        "classic"
    ], "simple"],
    "ingredientes" => [[
        "chicken",
        "veal",
        "egg",
        "tuna",
        "mushrooms"
    ], "multiple"],
    "extras" => [[
        "olive",
        "bacon",
        "onion",
        "potato"
    ], "multiple"]
];


// Función que imprime en pantalla el array de productos que se introduzca como parametro
// El segundo array corresponde al conjunto de valores de $_POST
function mostrarProductos($array, $postValues = null) {
    foreach ($array as $id => $producto) {
        $nombre =  $producto["nombre"];
        $precio =  $producto["precio"];
        if ($postValues != null) {
            $postValues = $postValues[$id];
        }
        else {
            $valorActual = "";
        }
        echo '<tr>';
            echo <<<ROW
                <th scope="row">
                    <label for="menu$id" class="form-control-label px-3" rds-checkbox-label-edited></label>
                    <input type="checkbox" id="menu$id" name="menu$id" placeholder="" value="$nombre">
                </th>
                <td>$nombre</td>
                <td>{$precio}€</td>
                <td>
                    <label for="quantity$id" class="form-control-label px-3"></label>
                    <input type="number" id="quantity$id" name="quantity$id" placeholder="" value="">
                </td>
            ROW;
        echo '</tr>';
    }
    echo '</tbody></table></div>';
}

function mostrarSelectorIngredientes($array) {
    foreach ($array as $elemento => $valores) {
        if ($valores[1] == "simple") {
            echo <<<HEAD
                <article>
                    <span>$elemento:</span>
                HEAD;
            $tipo = "radio";
        }
        else {
            echo <<<HEAD
                <article>
                    <span>$elemento <span style="text-transform: lowercase">(puedes seleccionar varios)</span>:</span>
                HEAD;
            $tipo = "checkbox";
        }
        for ($i = 0; $i < count($valores[0]); $i++) {
            $valorActual = $valores[0][$i];
            echo <<<ARTICLE
            <div>
                <input type="$tipo" id="$valorActual" name="$elemento" value="$valorActual">    
                <label for="$valorActual" class="form-control-label px-3">$valorActual</label>
            </div>
            ARTICLE;
        }
        echo "</article>";
    }
    echo "</div>";
}


?>




