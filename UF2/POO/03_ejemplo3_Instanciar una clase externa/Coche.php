
<?php

// Instanciar una clase externa
// A medida que vamos complicando nuestro desarrollo, se hace necesario separar en diferentes archivos 
//la lógica de nuestra programación, y de hecho esta será una de las bases para el patrón MVC que veremos más adelante.
// Así, el ejemplo anterior podría tener la clase Coche en un archivo diferente o archivo de clase, 
//la cual podríamos requerir y utilizar en cualquier otro archivo.

class Coche
{
    //Variables o atributos
    private $marca;
    private $modelo;
    private $color;
    private $propietario;

    function __construct($miMarca,$miModelo,$miColor,$miPropietario){
        $this->marca = $miMarca;
        $this->modelo = $miModelo;
        $this->color = $miColor;
        $this->propietario = $miPropietario;
    }

    //Funciones o métodos
    public function setMarca($miMarca){
        $this->marca = $miMarca;
    }

    public function getMarca(){
        return $this->marca;
    }

    public function setModelo($miModelo){
        $this->modelo = $miModelo;
    }

    public function getModelo(){
        return $this->modelo;
    }

    public function setColor($miColor){
        $this->color = $miColor;
    }

    public function getColor(){
        return $this->color;
    }

    public function setPropietario($miPropietario){
        $this->propietario = $miPropietario;
    }

    public function getPropietario(){
        return $this->propietario;
    }
}