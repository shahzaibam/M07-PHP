<?php

// include("../Modelo/Alumno.php");
// include("../Modelo/Profesor.php");
// include("../Modelo/Personal.php");

// //ALUMNO
// $alumno1 = new Alumno("Juan", "Pérez", "2000-01-01", "juan@gmail.com", "1A", ["Matemáticas", "Historia"]);
// $alumno2 = new Alumno("Ana", "García", "2002-05-15", "ana@gmail.com", "2B", ["Inglés", "Ciencias"]);


// echo "Alumno 1:<br>";
// echo "------------------ <br>"; 
// echo "$alumno1\n";
// echo "------------------ <br>"; 
// echo "Alumno 2:<br>";
// echo "------------------ <br>"; 
// echo "$alumno2\n";
// echo "------------------ <br>"; 

// $asignatura_a_mirar = "Historia";

// echo "¿Alumno 1 tiene la asignatura '$asignatura_a_mirar'? " . ($alumno1->hasAsignatura($asignatura_a_mirar) ? "Sí" : "No") . "\n <br>";
// echo "------------------ <br>"; 
// echo "<br>"; 
// echo "<br>"; 
// echo "<br>"; 
// echo "<br>"; 



// //PROFESOR
// $profesor1 = new Profesor("Profesor1", "Apellido1", "1970-02-28", "prof1@gmail.com", 3000, "Matemáticas");
// $profesor2 = new Profesor("Profesor2", "Apellido2", "1985-10-10", "prof2@gmail.com", 3500, "Inglés");

// echo "$profesor1\n";
// echo "------------------ <br>"; 
// echo "$profesor2\n";
// echo "------------------ <br>"; 

// echo "Profesor2 gana mas que profesor1? " . ($profesor2->ganaMasQue($profesor1) ? "Sí" : "No") . "\n";
// echo " <br>"; 
// echo "profesor1 gana mas que profesor2? " . ($profesor1->ganaMasQue($profesor2) ? "Sí" : "No") . "\n";
// echo "<br>"; 
// echo "<br>"; 
// echo "<br>"; 
// echo "<br>"; 



// //PERSONAL
// $personal1= new Personal("Ivan", "Sanchez", "2004-08-30", "ivan@gmail.com", 1200);
// $personal2= new Personal("Miguel", "Sanchez", "2004-08-30", "migg@gmail.com", 1700);


// echo "$personal1\n";
// echo "------------------ <br>"; 
// echo "$personal2\n";
// echo "personal1 gana mas que profesor1? " . ($personal1->ganaMasQue($profesor1) ? "Sí" : "No") . "\n";
// echo "<br>";
// echo "personal2 gana mas que personal1? " . ($personal2->ganaMasQue($personal1) ? "Sí" : "No") . "\n";



?>


<body>

    <div>

        <div>
            <h2>Gestion de Agenda</h2>
        </div>

        <div>
            <a href="./ver.php">Ver Contactos</a>
            <br>
            <a href="./editar-form.php">Editar</a>
        </div>

    </div>

</body>