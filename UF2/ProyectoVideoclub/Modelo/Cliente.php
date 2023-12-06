<?php

class Cliente
{
    public $nombre;

    private $numero;

    private $soportesAlquilados = [];

    private $numSoportesAlquilados;

    private $maxAlquilerConcurrente;

    /**
     * @param $nombre
     * @param $numero
     * @param $maxAlquilerConcurrente
     */
    public function __construct($nombre, $numero, $maxAlquilerConcurrente = 3)
    {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }


    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }



    /**
     * @return mixed
     */
    public function getNumSoportesAlquilados()
    {
        $this->numSoportesAlquilados = count($this->soportesAlquilados);
        return $this->numSoportesAlquilados;
    }


    //Metodos

    public function tieneAlquilados(Soporte $s): bool
    {
        foreach ($this->soportesAlquilados as $soporteAlquilado) {
            if ($soporteAlquilado->getTitulo() === $s->getTitulo()) {
                return true;
            }
        }

        return false;

    }


    public function alquilar(Soporte $s):bool {
        $alquilado = $this->tieneAlquilados($s);
        $numSoportesAlquilados = $this->getNumSoportesAlquilados();

        if(!$alquilado) {
            if(!($numSoportesAlquilados >= $this->maxAlquilerConcurrente)) {
                $this->numSoportesAlquilados++;
                $this->soportesAlquilados[] = $s;
                echo "<br>almacenado el soporte en el array <br><br><br>";

                return true;
            }
        }else {
            echo "Este soporte ya está alquilado <br>";
        }

        return false;
    }



    public function devolver(int $numSoporte): bool
    {

        foreach ($this->soportesAlquilados as $key => $soporteAlquilado) {
            if ($soporteAlquilado->obtenerNumero() === $numSoporte) {
                unset($this->soportesAlquilados[$key]);
                $this->numSoportesAlquilados--;

                echo "Soporte $numSoporte devuelto correctamente. <br>";

                return true;
            }
        }

        echo "El soporte $numSoporte no estaba alquilado. <br>";

        return false;
    }





    public function listarAlquileres(): void
    {
        $numAlquileres = count($this->soportesAlquilados);

        if ($numAlquileres > 0) {
            echo "El cliente {$this->nombre} tiene $numAlquileres alquiler: <br>";

            foreach ($this->soportesAlquilados as $soporteAlquilado) {
                echo "{$soporteAlquilado->getTitulo()} <br>";
            }
        } else {
            echo "El cliente {$this->nombre} no tiene ningún alquiler. <br>";
        }
    }


    public function muestraResumen()
    {
        $message = "";

        $message = " $this->nombre <br>";
        $message .= " $this->numSoportesAlquilados <br>";

        return $message;
    }

}

