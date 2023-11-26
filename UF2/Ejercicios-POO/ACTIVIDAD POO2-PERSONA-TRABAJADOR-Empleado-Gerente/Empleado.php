<?php

include_once ("Trabajador.php");

class Empleado extends Trabajador {

    private $horasTrabajadas;

    private $precioPorHora;

    /**
     * @param $horasTrabajadas
     * @param $precioPorHora
     */
    public function __construct($nombre, $apellidos, $edad, $horasTrabajadas, $precioPorHora)
    {
        $this->horasTrabajadas = $horasTrabajadas;
        $this->precioPorHora = $precioPorHora;
    }


    public function calcularSueldo():int
    {
        $sueldo = "";
        $sueldo = $this->horasTrabajadas * $this->precioPorHora;

        return $sueldo;
    }

    public function debePagarImpuestos(): bool
    {
        if($this->calcularSueldo() > 3333) {
            return true;
        }else {
            return false;
        }
    }

    public function __toString()
    {
        $message = "";

        $message .= "Horas Trabajadas --> " . $this->horasTrabajadas . "<br>";
        $message .= "Precio por hora -->" . $this->precioPorHora . "<br>";
        $message .= "Calcular sueldo --> " . $this->calcularSueldo() . "<br>";

        return $message;
    }



}

$empleado = new Empleado(160, 25);

echo $empleado;

$sueldo = $empleado->calcularSueldo();

$impuestos = $empleado->debePagarImpuestos();

if($impuestos) {
    echo "Pagas impuetos";
}else{
    echo "No pagas impuestos";
}



?>