<?php

class Juego extends Soporte {

    public $consola;
    private $minNumJugadores;
    private $maxNumJugadores;


    public function __construct($titulo, $numero, $precio, $consola, $minNumJugadores, $maxNumJugadores) {
        // Llamada al constructor de la clase padre
        parent::__construct($titulo, $numero, $precio);

        $this->consola = $consola;
        $this->minNumJugadores = $minNumJugadores;
        $this->maxNumJugadores = $maxNumJugadores;
    }


    public function muestraResumen() {
        // Llamada al método muestraResumen de la clase padre
        parent::muestraResumen();
        // Mostrar información específica del Juego
        echo "Consola: {$this->consola} <br>";
        $this->muestraJugadoresPosibles();
    }


    public function muestraJugadoresPosibles() {
        if ($this->minNumJugadores === $this->maxNumJugadores) {
            echo "Para {$this->minNumJugadores} jugador";
        } else {
            echo "De {$this->minNumJugadores} a {$this->maxNumJugadores} jugadores";
        }
    }



}

?>