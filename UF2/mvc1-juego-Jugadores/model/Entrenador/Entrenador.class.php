<?php
class Entrenador {
    
    private $nombre;
    private $equipo;
    private $fNacimiento;
    private $anyDeEntrenador;
    private $nivelDeLiderazgo;
    private $foto;

    /**
     * @param $id
     * @param $nombre
     * @param $pais
     * @param $numCamiseta
     * @param $fNacimiento
     * @param $rolJugador
     * @param $numGoles
     * @param $numPartidos
     */
    public function __construct( $nombre = NULL, $equipo = NULL, $fNacimiento = NULL, $anyDeEntrenador = NULL, $nivelDeLiderazgo = NULL)
    {
        $this->nombre = $nombre;
        $this->equipo = $equipo;
        $this->fNacimiento = $fNacimiento;
        $this->anyDeEntrenador = $anyDeEntrenador;
        $this->nivelDeLiderazgo = $nivelDeLiderazgo;
        $this->foto = $this->nombre.'.png';

    }

   // Getters
   public function getNombre() {
    return $this->nombre;
}

public function getEquipo() {
    return $this->equipo;
}

public function getFNacimiento() {
    return $this->fNacimiento;
}

public function getAnyDeEntrenador() {
    return $this->anyDeEntrenador;
}

public function getNivelDeLiderazgo() {
    return $this->nivelDeLiderazgo;
}

public function getFoto() {
    return $this->foto;
}
// Setters

public function setNombre($nombre) {
    $this->nombre = $nombre;
}

public function setEquipo($equipo) {
    $this->equipo = $equipo;
}

public function setFNacimiento($fNacimiento) {
    $this->fNacimiento = $fNacimiento;
}

public function setAnyDeEntrenador($anyDeEntrenador) {
    $this->anyDeEntrenador = $anyDeEntrenador;
}

public function setNivelDeLiderazgo($nivelDeLiderazgo) {
    $this->nivelDeLiderazgo = $nivelDeLiderazgo;
}

public function setFoto($foto) {
    $this->foto = $foto;
}


    public function calculate_age():string {
        // Formateamos la cadena a tipo Date con el formato día/mes/año
        $fechaNacimiento = DateTime::createFromFormat('d/m/Y', $this->fNacimiento);

        // Creamos una variable que almacena la fecha actual
        $hoy = new DateTime();

        // Calculamos la edad usando el método diff de DateTime || diff -> Devuelve la diferencia entre dos objetos DateTime
        $edad = $hoy->diff($fechaNacimiento);

        // Devolvemos solo el componente de años de la diferencia (y) || y -> year, m -> month, d -> day
        return $edad->y;
    }



}
