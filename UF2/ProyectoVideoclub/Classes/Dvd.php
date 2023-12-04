<?php

class Dvd extends Soporte {
    // Atributos
    public $idiomas;
    private $formatoPantalla;

    // Constructor sobrescrito
    public function __construct($titulo, $numero, $precio, $idiomas, $formatoPantalla) {
        // Llamada al constructor de la clase padre
        parent::__construct($titulo, $numero, $precio);

        $this->idiomas = $idiomas;
        $this->formatoPantalla = $formatoPantalla;
    }

    // Método muestraResumen sobrescrito
    public function muestraResumen() {
        // Llamada al método muestraResumen de la clase padre
        parent::muestraResumen();
        // Mostrar información específica del DVD
        echo "Idiomas: {$this->idiomas}<br>";
        echo "Formato de Pantalla: {$this->formatoPantalla}\n";
    }


}

?>