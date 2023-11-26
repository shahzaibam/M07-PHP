<?php

include_once ("Trabajador.php");
class Gerente extends Trabajador {

    private $salario;

    /**
     * @param $salario
     */
    public function __construct($salario)
    {
        $this->salario = $salario;
    }


    public function calcularSueldo(): int
    {
        $edad = $this->getEdad();

        echo $edad;

        $salarioTotal = $this->salario + ($this->salario*$edad/100);

        return $salarioTotal;

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

        $message .= "Salario --> " . $this->salario . "<br>";
        $message .= "Sueldo Calculado --> " . $this->calcularSueldo() . "<br>";

        return $message;
    }


}

$gerente = new Gerente(1000);

echo $gerente;

$sueldoTotal = $gerente->calcularSueldo();

$impuestos = $gerente->debePagarImpuestos();

if($impuestos) {
    echo "Pagas impuestos";
}else {
    echo "NO pagas impuestos";
}


?>