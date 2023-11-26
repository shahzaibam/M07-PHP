<?php


class Persona {

    protected $nombre;

    protected $apellidos;

    /**
     * @param $nombre
     * @param $apellidos
     */
    public function __construct($nombre, $apellidos)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
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
     * @return string --> retorna el nombre completo
     */
    public function getNombreCompleto() {
        $nombreCompleto = "$this->nombre, $this->apellidos";
        return $nombreCompleto;
    }

}


?>