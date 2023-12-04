<?php

class Juego extends Soporte {
    // Atributos adicionales
    public $consola;
    private $minNumJugadores;
    private $maxNumJugadores;

    // Constructor sobrescrito
    public function __construct($titulo, $numero, $precio, $consola, $minNumJugadores, $maxNumJugadores) {
        // Llamada al constructor de la clase padre
        parent::__construct($titulo, $numero, $precio);
        // Inicialización de los atributos propios de la clase hija
        $this->consola = $consola;
        $this->minNumJugadores = $minNumJugadores;
        $this->maxNumJugadores = $maxNumJugadores;
    }

    // Método muestraResumen sobrescrito
    public function muestraResumen() {
        // Llamada al método muestraResumen de la clase padre
        parent::muestraResumen();
        // Mostrar información específica del Juego
        echo "Consola: {$this->consola} <br>";
        $this->muestraJugadoresPosibles();
    }

    // Método para mostrar la información de jugadores posibles
    public function muestraJugadoresPosibles() {
        if ($this->minNumJugadores === $this->maxNumJugadores) {
            echo "Para {$this->minNumJugadores} jugador";
        } else {
            echo "De {$this->minNumJugadores} a {$this->maxNumJugadores} jugadores";
        }
    }
}

?>