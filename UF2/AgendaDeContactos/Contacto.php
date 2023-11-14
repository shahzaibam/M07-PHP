<?php

class Contacto {
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
    $contacto = new Contacto;
    $contacto->setNombre($nombre);
    $contacto->setApellidos($apellido);
    $contacto->setFNacimiento($fNacimiento);
    $contacto->setEmail($email);

    return $contacto;
}

$agenda = [];

$contacto1 = showContacto("shahzaib", "asghar", "2004-08-30", "shah5@gmail.com");
$contacto2 = showContacto("shahzaib", "asghar", "2010-08-30", "shah5@gmail.com");
$contacto3 = showContacto("shahzaib", "asghar", "2016-08-30", "shah5@gmail.com");
$contacto4 = showContacto("shahzaib", "asghar", "1999-08-30", "shah5@gmail.com");

$agenda[] = $contacto1;
$agenda[] = $contacto2;
$agenda[] = $contacto3;
$agenda[] = $contacto4;

function compararPorFechaNacimiento($a, $b) {
    return strtotime($a->getFNacimiento()) - strtotime($b->getFNacimiento());
}


// Ordenar el array de contactos por fecha de nacimiento pasando le una funcion declarada por nosotros
usort($agenda, 'compararPorFechaNacimiento');

// Mostrar los contactos ordenados
foreach ($agenda as $contacto) {
    echo "$contacto";
    echo "<br>";


}



?>