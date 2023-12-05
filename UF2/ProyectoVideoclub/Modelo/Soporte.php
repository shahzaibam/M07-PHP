<?php

class Soporte {
    // Atributos
    public $titulo;

    protected $numero;
    private $precio;

    // Constructor
    public function __construct($titulo, $numero, $precio) {
        $this->titulo = $titulo;
        $this->numero = $numero;
        $this->precio = $precio;
    }



    // Métodos
    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo): void
    {
        $this->titulo = $titulo;
    }




    // Obtener precio
    public function getPrecio() {
        return $this->precio;
    }

    // Obtener precio con IVA
    public function getPrecioConIva() {
        $iva = 0.21; // Puedes ajustar el valor del IVA según tu país
        return $this->precio * (1 + $iva);
    }

    // Obtener número
    protected function getNumero() {
        return $this->numero;
    }


    // Public method para hacer un get del number porque es protected
    public function obtenerNumero() {
        return $this->getNumero();
    }

    // Mostrar resumen
    public function muestraResumen() {
        echo "Título: {$this->titulo} <br>";
        echo "Número: {$this->getNumero()} <br>";
        echo "Precio: {$this->precio} <br>";
        echo "Precio con IVA: {$this->getPrecioConIva()} <br>";
    }
}


?>