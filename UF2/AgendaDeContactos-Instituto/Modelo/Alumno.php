<?php

include_once("../Modelo/Contacto.php");

class Alumno extends Contacto
{

    private $curso;
    private $asignaturas = [];


    public function __construct($nombre, $apellidos, $fNacimiento, $email, $curso, $asignaturas)
    {
        parent::__construct($nombre, $apellidos, $fNacimiento, $email);
        $this->curso = $curso;
        $this->asignaturas = $asignaturas;
    }



    /**
     * Get the value of curso
     */
    public function getCurso()
    {
        return $this->curso;
    }

    /**
     * Set the value of curso
     *
     * @return  self
     */
    public function setCurso($curso)
    {
        $this->curso = $curso;

        return $this;
    }

    /**
     * Get the value of asignaturas
     */
    public function getAsignaturas()
    {
        return $this->asignaturas;
    }

    /**
     * Set the value of asignaturas
     *
     * @return  self
     */
    public function setAsignaturas($asignaturas)
    {
        $this->asignaturas[] = $asignaturas;

        return $this;
    }



    /** FUNCIONES DEFINIDAS POR MÍ */

    public function hasAsignatura($asignatura)
    {
        return in_array($asignatura, $this->asignaturas);
    }




    function __toString()
    {
        $message = "";

        $message .= "Nombre : {$this->getNombre()}  <br>";
        $message .= "Apellidos : {$this->getApellidos()}  <br>";
        $message .= "Fecha Nacimiento : {$this->getFNacimiento()}  <br>";
        $message .= "Email : {$this->getEmail()}  <br>";
        $message .= "Curso : $this->curso  <br>";
        foreach ($this->asignaturas as $asignatura) {
            $message .= "Asignatura : $asignatura  <br>";
        }

        return "$message";
    }
}
