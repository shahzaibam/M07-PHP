<?php

class Personal extends Contacto{
    private $salario;

    public function __construct($nombre, $apellidos, $fNacimiento, $email, $salario)
    {
        parent::__construct($nombre, $apellidos, $fNacimiento, $email);
        $this-> $salario = $salario;
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



    function __toString()
    {
        $message = "";
        $message .= "Salario : $this->salario  <br>";

        return "$message";
    }
}


?>