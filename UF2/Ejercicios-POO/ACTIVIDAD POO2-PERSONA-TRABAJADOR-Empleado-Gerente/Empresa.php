<?php

class Empresa {
    private $nombre;
    private $direccion;
    private $trabajadores = [];

    public function __construct($nombre, $direccion)
    {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getDireccion(): string
    {
        return $this->direccion;
    }

    public function setDireccion($direccion): void
    {
        $this->direccion = $direccion;
    }

    public function anyadirTrabajador($trabajador): void
    {
        $this->trabajadores[] = $trabajador;
    }

    public function listarTrabajadoresHtml(): string
    {
        $html = "";
        foreach ($this->trabajadores as $trabajador) {
            $html .= $trabajador->toHtml() . "<br>";
        }
        return $html;
    }

    public function getCosteNominas(): float
    {
        $costeTotal = 0;
        foreach ($this->trabajadores as $trabajador) {
            $costeTotal += $trabajador->calcularSueldo();
        }
        return $costeTotal;
    }
}

?>