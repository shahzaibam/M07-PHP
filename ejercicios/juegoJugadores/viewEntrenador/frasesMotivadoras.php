<?php

session_start();

if(isset($_SESSION["entrado"])){
    if($_SESSION["entrado"] == true) {
        include("../layout.php");
        include("../functions.php");
        
        myHeader();
        myMenuLoggedIn();

        ?>

<body>
    <h1 class="text-center mt-4">Frases Motivadoras</h1>
    <div class="text-center mt-5">

        <?php
            $error = writeFrasesMotivadoras();
    
            if(empty($error)) {
    
                $fmotivadoras = readFrasesMotivadoras();
                if($fmotivadoras == '') {
    
                    echo "<p> $fmotivadoras </p>";
                
                }else {
                    echo "<p> $fmotivadoras </p>";
                }
    
            }else {
                echo "<p> $error </p>";
            }
        ?>
    
        <form method="post">
            <label for="frase">Agregar una Frase:</label>
            <input type="text" id="frase" name="frase" required>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>

<?php
    }
}else {
    echo "No puedes acceder aquí, inicia sesión";
    echo "<br>";
    echo "<a href='../login/login.php'>Iniciar Sesión</a>";
}
?>









