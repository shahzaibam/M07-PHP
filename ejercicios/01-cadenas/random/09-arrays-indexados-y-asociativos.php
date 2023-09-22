<?php
    require_once './0901-functions.php';

    //Funcion imprime array indexado
    function printArrayByIndex($a, $t = 1):void {
        if ($t == 0) {
            echo "<ul>";
            for ($i = 0; $i < count($a); $i++) {
                echo "<li>".$a[$i]."</li>";
            }
            echo "<ul>";
        }
        else if ($t == 1) {
            for ($i = 0; $i < count($a); $i++) {
                echo "<dd>".$a[$i]."</dd>";
            }
        }
        
    }
    //Funcion imprime array asociativo
    function printArrayByKey($a) {
        echo "<dl>";
        foreach ($a as $clave => $valor) {
            echo "<dt>".$clave."</dt>";
            printArrayByIndex($valor, 1);
        }
        //imprimir contenido array
        echo "<dl>";
        echo "<pre>".print_r($a, true)."</pre>";
        echo "<pre>";
        var_dump($a);
        echo "</pre>";
    }


    ///////////// WEB CODE  //////////
    myHeader(); 
    menu();

?>

<body>
    <?php
        $array1 = ["M06", "M07", "M08", "M09"];
        $array2 = ["Asignaturas de primero"=>"M01, M02, M03, M04, M05, M10, M11", 
                    "Asignaturas de segundo"=>"M06, M07, M08, M09, M012, M13"];
        $array3 = ["Asignaturas de primero"=>["M01", "M02", "M03", "M04", "M05", "M10", "M11"], 
                    "Asignaturas de segundo"=>["M06", "M07", "M08", "M09", "M12", "M13"]];
    ?>
    <h1>Pruebas de impresión por pantalla de Arrays</h1>
        <h2>Arrays indexados</h2>
        
        <?php 
        printArrayByIndex($array1);?>

        <h2>Arrays asociativos</h2>
        <?php printArrayByKey($array3);?>

</body>
</html>

<?php 
    myFooter();
?>