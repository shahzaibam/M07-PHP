<?php

class Dvd extends Soporte {

    public $idiomas;
    private $formatoPantalla;

    public function __construct($titulo, $numero, $precio, $idiomas, $formatoPantalla) {
        // Llamada al constructor de la clase padre
        parent::__construct($titulo, $numero, $precio);

        $this->idiomas = $idiomas;
        $this->formatoPantalla = $formatoPantalla;
    }


    public function muestraResumen() {
        // Llamada al método muestraResumen de la clase padre
        parent::muestraResumen();
        // Mostrar información específica del DVD
        echo "Idiomas: {$this->idiomas}<br>";
        echo "Formato de Pantalla: {$this->formatoPantalla}\n";
    }


}

?>