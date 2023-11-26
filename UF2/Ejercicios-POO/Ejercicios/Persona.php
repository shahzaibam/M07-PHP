<?php

include_once ("PersonaA.php");

class Persona extends PersonaA {

    protected $nombre;

    protected $apellidos;

    protected $edad;

    /**
     * @param $nombre
     * @param $apellidos
     * @param $edad
     */
    public function __construct($nombre, $apellidos, $edad)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @return mixed
     */
    public function getEdad()
    {
        return $this->edad;
    }




    /*

    /**
     * @return string --> retorna el nombre completo

        public function getNombreCompleto() {
            $nombreCompleto = "$this->nombre, $this->apellidos";
            return $nombreCompleto;
        }


        public function toHtml():string {
            return "<p> Nombre : $this->nombre </p>"
            . "<p>Apellidos : $this->apellidos</p>"
            . "<p>Edad : $this->edad</p>";
        }

    */


}


?>