<?php

class Libro {

    protected $titulo;   

    protected $autor;

    protected $genero;

    private $numPaginas;

    private $disponible;

    /**
     * @param $titulo
     * @param $autor
     * @param $genero
     */
    public function __construct($titulo, $autor, $genero)
    {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->genero = $genero;

        $this->disponible = true;
    }


    public function prestarLibro():string {

        if($this->disponible) {
            $this->disponible = false;
            return "El libro ha sido prestado";
        }

        return "El libro no está disponible";
    }


    public function devolverLibro():string {

        if(!$this->disponible) {
            $this->disponible = true;
        }

        return "El libro ha sido devuelto";

    }



}

?>