<?php
require_once './v1-functions-structure.php';
require_once './v1-functions-arrays.php';

// Print HTML my HEADER & my NAVBAR
myHeader();
myMenu();
?>

<body>

    <!-- WEB Code-->
    <br><h1><b>TESTING AND LEARNING ABOUT PHP ARRAYS:</b></h1><hr><br>

    <hr>
    <?php
    printArrayByPHPFunctions($matriculaDAW);

    //Print myFooter
    myFooter();
    ?>

</body>

</html>