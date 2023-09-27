<?php
 

//funcion que carga los iconos con un for dentro del array
function cargarIconosEnArray(&$numeroImagen) {
    for ($i=1; $i < 21; $i++) { 
        array_push($numeroImagen, $i . ".png");
    }
}

//funcion que muestra el array 
function mostrarArray(&$numeroImagen) {
    for ($i=0; $i < count($numeroImagen); $i++) { 
        echo ("<img src=./img/" . $numeroImagen[$i] . ">");
    }
}


$cards = [
    ["tag" => "#foxHappy", "likes" => 5],
    ["tag" => "#reindeerHappy", "likes" => 13],
    ["tag" => "#lightBear", "likes" => 10],
    ["tag" => "#noelOneGift", "likes" => 15],
    ["tag" => "#noelRedGreen", "likes" => 8],
    ["tag" => "#smallBear", "likes" => 9],
    ["tag" => "#noelXmas", "likes" => 17],
    ["tag" => "#noelTree", "likes" => 20],
    ["tag" => "#noelGift", "likes" => 15],
    ["tag" => "#noelBag", "likes" => 19],
    ["tag" => "#noelCandy", "likes" => 6],
    ["tag" => "#noelChimney", "likes" => 22],
    ["tag" => "#noelHappy", "likes" => 25],
    ["tag" => "#noelGreen", "likes" => 2],
    ["tag" => "#pinkRabbit", "likes" => 15],
    ["tag" => "#lightRabbit", "likes" => 25],
    ["tag" => "#pinkBear", "likes" => 43],
    ["tag" => "#pinkPig", "likes" => 14],
    ["tag" => "#fogJersey", "likes" => 19],
    ["tag" => "#noelTwoGift", "likes" => 35]
];


//------------------------------------------------------------------------------------------------------------
function myHeader(){
    $head = <<<CABECERA
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
                
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Impresiones de Stickers</title>
    </head>
    CABECERA;
    echo $head;
}

//------------------------------------------------------------------------------------------------------------
function myMenu(){
            $menu=<<<HERE
            <div class="menu">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" href="./index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./01-exercici-1.php">Exercici 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./02-exercici-2.php">Exercici 2</a>
                </li>
            </ul>
            </div>
            HERE;
            echo $menu;
            echo '<hr>';
}
 
//------------------------------------------------------------------------------------------------------------
function myFooter(){
        $footerHTML = <<<MYFOOTER
            <footer>
                <hr>
                <p>
                @Provençana
                </p>
            </footer>
        MYFOOTER;
        echo $footerHTML;
        date_default_timezone_set('Europe/Madrid');

        $fechaActual = date("d-m-Y");
        $horaActual = date("h:i:s");
    
        echo "La fecha es: $fechaActual y la hora es $horaActual " ;
}
    
// Print Line. Appends an return at the end
//------------------------------------------------------------------------------------------------------------
function println($something): void {
	echo $something . '<br>';
}
?>