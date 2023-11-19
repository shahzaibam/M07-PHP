<?php

// session_start();

class Contacto {
    private $nombre;
    private $apellidos;
    private $fNacimiento;
    private $email;


    public function __construct($nombre, $apellidos, $fNacimiento, $email) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->fNacimiento = $fNacimiento;

        $fecha = new DateTime($fNacimiento);
        $actual = new DateTime();
        $diff = $actual->diff($fecha);
        $edad = $diff->y;

        if ($edad > 18) {
            $this->email = $email;
        } else {
            $this->email = "menor de edad";
        }

        
    }


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
     * Get the value of fNacimiento
     */ 
    public function getFNacimiento()
    {
        return $this->fNacimiento;
    }
    

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $fecha = new DateTime($this->fNacimiento);
        $actual = new DateTime();
    
        $diff = $actual->diff($fecha);
        $edad = $diff->y;

    
        if ($edad > 18) {
            $this->email = $email;
        } else {
            $this->email = "menor de edad";
        }
    
        return $this;
    }
    
    
    // public static $_SESSION["agenda"] = [];

    function __toString() {
        $message = "";
       $message .= "Nombre : $this->nombre  <br>";
       $message .= "Apellido : $this->apellidos  <br>";
       $message .= "Fecha Nacimiento : $this->fNacimiento  <br>";
       $message .= "Email : $this->email <br>";

        return "$message";
    }


}


function showContacto($nombre, $apellido, $fNacimiento, $email) {
    $contacto = new Contacto($nombre, $apellido, $fNacimiento, $email);

    // $_SESSION["agenda"] = $contacto;


    return $contacto;
}


function compararPorFechaNacimiento($a, $b) {
    return strtotime($a->getFNacimiento()) - strtotime($b->getFNacimiento());
}


?>