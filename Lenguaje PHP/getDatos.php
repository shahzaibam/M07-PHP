<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los valores del formulario
    $nombre = $_POST["nombre"];
    $password = $_POST["password"];

    // Validación (puedes agregar tu propia lógica de validación aquí)

    // Abre el archivo para escritura al final (append)
    $filename = "datos.csv";
    $f = fopen($filename, 'a');

    if ($f == false) {
        die('Error opening the file ' . $filename);
    }

    // Escribe los valores en el archivo CSV
    fputcsv($f, array($nombre, $password));

    // Cierra el archivo
    fclose($f);

    echo "Los datos se han añadido correctamente al archivo.";

} else {
    echo "Acceso no autorizado.";
}
?>