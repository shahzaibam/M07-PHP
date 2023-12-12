<?php
include_once "../Modelo/Soporte.php";

class CintaVideo extends Soporte {

    public $duracion;


    public function __construct($titulo, $numero, $precio, $duracion) {
        // Llamada al constructor de la clase padre
        parent::__construct($titulo, $numero, $precio);

        $this->duracion = $duracion;
    }

    // método muestraResumen sobrescrito
    public function muestraResumen() {
        // Llamada al método muestraResumen de la clase padre
        parent::muestraResumen();
        // Mostrar la duración específica de la cinta de video
        echo "Duración: {$this->duracion} <br>";
    }
}

?>