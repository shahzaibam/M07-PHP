<?php


class Profesores extends Contacto
{
    private $salario;
    private $asignatura;


    public function __construct($nombre, $apellidos, $fNacimiento, $email, $curso, $asignatura)
    {
        parent::__construct($nombre, $apellidos, $fNacimiento, $email);
        $this-> $curso = $curso;
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




    function __toString()
    {
        $message = "";
        $message .= "Salario : $this->salario  <br>";
        $message .= "Asignatura : $this->asignatura  <br>";

        return "$message";
    }
}
