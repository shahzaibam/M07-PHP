<?php

include("./layout.php");

myHeader();
myMenu();

?>

<body>



    <div>
        <div>
            <h2>Test1: Practicamos variables, estrucutras de control, pequeños formularios y recogida de valores</h2>
        </div>

        <div>
            <form method="get">
                <p>Dona'm un numero entre 0 i 20</p>
                <input type="text" name="numero" placeholder="Numero" value="<?php if (isset($_GET["numero"])) {
                                                                                    echo $_GET['numero'];
                                                                                } ?>">
                <input type="submit" value="Calcular">
            </form>


        </div>

        <table class="table">
            <?php





            $numGetted = 0;
            $num1 = 0;
            $num2 = 0;

            if (isset($_GET["numero"])) {
                // echo "$_GET[numero]";
                $numGetted = "$_GET[numero]";

                if($numGetted<21) {

                    for ($i = 1; $i < 11; $i++) {
                        echo "<th scope='col'>$i</th>";
                    }
        
                    echo "
                    <tbody>";

                    for ($numero = 1; $numero <= $numGetted; $numero++) {
                        $num1 = $numero;
        
                        echo "<tr>";
        
        
                        for ($i = 1; $i <= 10; $i++) {
        
                            $num2 = $i;
        
                            $resultMulti = $num1 * $num2;
        
                            
                           echo "<td scope='row'>$resultMulti</td>";
                         
        
        
                            // echo "$numero x $i = $resultMulti<br>";
                        }
                        echo "</tr>";
        
        
                    }
                }else {
                    echo "Numero incorrecto";
                }
            }


            ?>

            </tbody>
        </table>
    </div>

</body>

</html>