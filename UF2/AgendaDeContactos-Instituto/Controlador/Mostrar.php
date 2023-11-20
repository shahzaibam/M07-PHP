<?php

include_once("../Modelo/Contacto.php");

class Mostrar {
    public function mostrarContacto($contacto) {
        echo $contacto;
    }

    public function mostrarListaContactos($agenda) {
        foreach ($agenda as $contacto) {
            echo $contacto;
            echo "<br>";
        }
    }

}

?>