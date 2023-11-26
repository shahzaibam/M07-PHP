<?php

include_once ("Persona.php");

class Empleado extends Persona {

    public static $sueldoTope = 3333;

    private $sueldo;

    private $telefono = [];


    /**
     * @param $nombre
     * @param $apellidos
     * @param $sueldo
     */
    public function __construct($sueldo=1000)
    {
        parent::__construct("Shah Zaib", "Asghar", 22);
        $this->sueldo = $sueldo;
    }

    /**
     * @return int|mixed
     */
    public function getSueldo()
    {
        return $this->sueldo;
    }

    /**
     * @param int|mixed $sueldo
     */
    public function setSueldo($sueldo): void
    {
        $this->sueldo = $sueldo;
    }



    /** FUNCIONES IMPLEMENTADAS POR NOSOTROS **/

    public function debePagarImpuestos():bool {

        $edadPersona = $this->getEdad();



        if($edadPersona > 21) {
            if($this->sueldo > self::$sueldoTope) {
                return true;
            }else {
                return false;
            }
        }else {
            return false;

        }

    }


    public function anyadirTelefono(int $tel) {
        $this->telefono[] = $tel;
    }


    public function listarTelefonos():string {

        $telefonos = $this->telefono;
        $message = "";

        for ($index = 0; $index < count($telefonos); $index++) {
            $message .= " "  . $telefonos[$index] . ",";
        }

        return $message;
    }



    public function vaciarTelefonos() {
        $this->telefono = [];
    }


    public function toHtml():string {
        return "<p>Sueldo: {$this->sueldo}</p>";
    }



    public function __toString()
    {
        $message = "";

        $message .= "Sueldo --> " . $this->sueldo . "<br>";
        $message .= "Listar Telefonos --> " . $this->listarTelefonos();

        return $message;
    }


}

$empleado = new Empleado(3500);

$pagaImpuestos = $empleado->debePagarImpuestos();

if($pagaImpuestos) {
    $message = "Hay que pagar impuestos chaval";
}else {
    $message = "Te libras de los impuestos";
}

echo $message;




$persona = new Persona("Shah Zaib", "Asghar", 12);


$sueldo = $empleado->getSueldo();



$empleado->anyadirTelefono(662272781);
$empleado->anyadirTelefono(631314597);

$telefonosAll = $empleado->listarTelefonos();

$toHtml = $empleado->toHtml();
$toHtml_persona = $persona->toHtml();


echo $toHtml;
echo $toHtml_persona;



?>