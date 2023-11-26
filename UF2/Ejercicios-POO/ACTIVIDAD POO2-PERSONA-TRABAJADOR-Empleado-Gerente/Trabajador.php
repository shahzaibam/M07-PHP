<?php

include_once ("Persona.php");

abstract class Trabajador extends Personaej {

    private $telefonos = [];

    abstract public function calcularSueldo():int;

    abstract public function debePagarImpuestos():bool;
}

?>