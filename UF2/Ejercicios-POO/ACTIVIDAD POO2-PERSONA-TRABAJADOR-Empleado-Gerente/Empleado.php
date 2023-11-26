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
        if($this->sueldo > self::$sueldoTope) {
            return true;
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


    public static function toHtml(Empleado $emp): string {
        $message = "";

        $message = "$emp";

        return $message;
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

$sueldo = $empleado->getSueldo();

$empleado->anyadirTelefono(662272781);
$empleado->anyadirTelefono(631314597);

$telefonosAll = $empleado->listarTelefonos();

$toHtml = $empleado->toHtml($empleado);

echo $toHtml;

?>