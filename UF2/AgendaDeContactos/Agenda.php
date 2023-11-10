<?php

class Agenda {
    private $nombre;
    private $apellidos;
    private $fNacimiento;
    private $email;



    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }


    /**
     * Set the value of apellidos
     *
     * @return  self
     */ 
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }


    /**
     * Set the value of fNacimiento
     *
     * @return  self
     */ 
    public function setFNacimiento($fNacimiento)
    {
        $this->fNacimiento = $fNacimiento;

        return $this;
    }


    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {   
        $this->email = $email;

        return $this;
    }


}


?>