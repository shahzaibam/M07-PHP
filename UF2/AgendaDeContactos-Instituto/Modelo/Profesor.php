<?php

include_once("../Modelo/Contacto.php");

class Profesor extends Contacto
{
    private $salario;
    private $asignatura;


    public function __construct($nombre, $apellidos, $fNacimiento, $email, $salario, $asignatura)
    {
        parent::__construct($nombre, $apellidos, $fNacimiento, $email);
        $this->salario = $salario;
        $this->asignatura = $asignatura;
    }

    

    /**
     * Get the value of salario
     */ 
    public function getSalario()
    {
        return $this->salario;
    }

    /**
     * Set the value of salario
     *
     * @return  self
     */ 
    public function setSalario($salario)
    {
        $this->salario = $salario;

        return $this;
    }

    /**
     * Get the value of asignatura
     */ 
    public function getAsignatura()
    {
        return $this->asignatura;
    }

    /**
     * Set the value of asignatura
     *
     * @return  self
     */ 
    public function setAsignatura($asignatura)
    {
        $this->asignatura = $asignatura;

        return $this;
    }


    public function imparteAsignatura($asignatura) {
        return $this->asignatura === $asignatura;
    }

    public function ganaMasQue($otroProfesor) {
        return $this->salario > $otroProfesor->getSalario();
    }


    function __toString()
    {
        $message = "";

        $message .= "Nombre : {$this->getNombre()}  <br>";
        $message .= "Apellidos : {$this->getApellidos()}  <br>";
        $message .= "Fecha Nacimiento : {$this->getFNacimiento()}  <br>";
        $message .= "Email : {$this->getEmail()}  <br>";
        $message .= "Salario : $this->salario  <br>";
        $message .= "Asignatura : $this->asignatura  <br>";

        return "$message";
    }
}
