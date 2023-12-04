<?php

class CintaVideo extends Soporte {
    // Atributo adicional
    public $duracion;

    // Constructor sobrescrito
    public function __construct($titulo, $numero, $precio, $duracion) {
        // Llamada al constructor de la clase padre
        parent::__construct($titulo, $numero, $precio);
        // Inicialización del atributo propio de la clase hija
        $this->duracion = $duracion;
    }

    // Método muestraResumen sobrescrito
    public function muestraResumen() {
        // Llamada al método muestraResumen de la clase padre
        parent::muestraResumen();
        // Mostrar la duración específica de la cinta de video
        echo "Duración: {$this->duracion}\n";
    }
}

?>