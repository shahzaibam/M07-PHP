<?php

require_once ('./functions-structure.php');

myHeader();
myMenu();

?> 


<body>

<body>

<h1 class="text-center">Welcome Christmas Cards</h1>

    
<?php

$numeroImagen = array();

//definir array de imagenes
for ($i=1; $i < 21; $i++) { 
    array_push($numeroImagen, $i . ".png");
}

for ($i=0; $i < count($numeroImagen); $i++) { 
   echo ("<div class='d-flex justify-content-center align-center'> <img src=./img/" . $numeroImagen[$i] . "> </div>");
}

// print_r($numeroImagen)


?>


</body>

</body>