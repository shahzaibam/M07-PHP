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


    
    // function calcularEdad($fNacimiento) {



    //     return $edad;
        
    // }

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
    
    



    function toString() {

        echo "Nombre : $this->nombre  <br>";
        echo "Apellido : $this->apellidos  <br>";
        echo "Fecha Nacimiento : $this->fNacimiento  <br>";
        echo "Email : $this->email <br>";

        
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

$contacto1 = showContacto("shahzaib", "asghar", "30-08-2004", "shah5@gmail.com");
$contacto2 = showContacto("shahzaib", "asghar", "30-08-2010", "shah5@gmail.com");
$contacto3 = showContacto("shahzaib", "asghar", "30-08-2016", "shah5@gmail.com");


$contacto1->toString();
echo "<br>";
$contacto2->toString();
echo "<br>";
$contacto3->toString();





?>